# Production Server Requirements & Operations

This documents the expected production environment for `modern-legacy`
(`modernist.kaunas.lt`) and the operational steps around deployment. It
describes expectations for whoever administers the server — it does not
change any server configuration itself.

## Deployment method: FTP (no SSH access)

The production server has **no SSH access**, so deployment uses FTP/FTPS via
the `SamKirkland/FTP-Deploy-Action` GitHub Action
(`.github/workflows/deploy-production.yml`), not rsync/SSH.
`deploy/legacy-rsync-deploy.sh` and the SSH-based approach it implements are
kept in the repo only as **future reference**, for if/when SSH access becomes
available — they are not part of the active pipeline.

FTP-only deployment has real limitations compared to SSH/rsync:

- **No remote commands.** There is no way to run a command on the server
  before/after deploy (e.g. cache clearing, maintenance mode). If that's ever
  needed, it must be done manually or via whatever control panel the host
  provides.
- **No automatic database backup.** This pipeline never touches the database
  in either transport, but an SSH-based setup could at least trigger a remote
  `mysqldump` before deploy; FTP cannot. DB backups must be handled entirely
  through your existing/out-of-band process.
- **No server-side PHP lint after deploy.** CI lints PHP before upload, but
  there's no way to re-verify syntax by executing anything on the server
  itself (as `PRODUCTION_REMOTE_PHP_LINT_COMMAND` did for the SSH design).
  The optional post-deploy check available now is a plain HTTP request to
  `PRODUCTION_URL`, which is a much weaker signal.
- **Harder rollback.** Rollback still works by reverting the offending commit
  on `main` (see Rollback below), which re-triggers a fresh FTP deploy of the
  reverted state — but there's no remote snapshot/backup command available to
  restore from directly, only whatever backup process runs independently of
  this pipeline.

**Future improvement:** if the production host ever adds SSH access, prefer
switching back to the SSH/rsync deployment path (re-enable
`deploy/legacy-rsync-deploy.sh` in `deploy-production.yml`) — it supports
`--delete`-free mirroring more precisely, remote commands, and is generally
more capable than FTP for this use case.

## Expected web root / deployment path

- `FTP_REMOTE_PATH` (GitHub secret, see [`github-secrets.md`](github-secrets.md))
  must point at the actual web-served docroot on the FTP server, e.g.
  `/public_html` or `/httpdocs` (exact form depends on the hosting provider's
  FTP layout).
- The deploy workflow uploads the repository contents directly into
  `FTP_REMOTE_PATH`, honoring the exclusion patterns duplicated from
  [`deploy/exclude-from-deploy.txt`](../../deploy/exclude-from-deploy.txt)
  inside `deploy-production.yml`. `index.php` must end up at the docroot's
  top level (not nested a directory deeper) for the site to serve correctly.

## PHP version

- The repo does not pin a PHP version anywhere (open question in
  [`fix-roadmap.md`](../legacy-critical-audit/fix-roadmap.md)).
- At least one code path (`mail()`'s array-form headers parameter, used in
  `form_action.php`) requires **PHP 8.0+**.
- CI (`ci.yml`) lints against PHP 8.1. Confirm the actual production PHP
  version matches or is newer, and update `ci.yml`'s `php-version` if not.

## Web server configuration

No `.htaccess` or web-server config exists anywhere in this repository (see
security-findings.md, "Info" row). Deployment-time `rsync --exclude-from`
keeps dangerous files off the server filesystem entirely, which is the
primary control — but as defense in depth, whoever administers the web server
should also confirm/add rules to:

- Deny access to `*.sql` files.
- Deny execution of PHP files under upload/media directories
  (`ehl-pastatai/`, `ehl-upload/`, `news-img/`) if the web server config
  allows it — uploaded files should never be executable as PHP.
- Deny directory listing.

These are server-config concerns outside this repository; track them with
whoever manages the production web server (Apache/Nginx).

## Files/folders that must remain writable

The application writes to these paths at runtime; the deploy user (or the
web server process) needs write access to them. The FTP deploy job
explicitly excludes them from its sync (see `exclude:` in
`deploy-production.yml`) so it never uploads to or deletes from them —
otherwise the mirroring FTP action would delete any image uploaded directly
on the server since the last deploy but never committed to Git:

- `ehl-pastatai/` — building images uploaded via `kmsaadmin/actions/save-building.php`
  and `update-building.php`.
- `ehl-upload/` — secondary upload target (purpose unconfirmed — see
  `fix-roadmap.md` question 6).
- `news-img/` — news article images.

Because these directories are excluded from sync entirely, a brand-new
server (one that doesn't already have these images) needs them populated
once, out of band, before this pipeline is relied on.

## Where production-only config should live

Currently `config.php`, `en/config.php`, and `kmsaadmin/config.php` hard-code
the database password and other secrets directly in the deployed files (see
[`security-findings.md`](../legacy-critical-audit/security-findings.md)). This
CI/CD setup does not fix that by itself. Once credentials are rotated and
externalized (per `fix-roadmap.md` immediate fix #4), production-only config
should live in one of:

- A git-ignored `config.local.php` on the server, loaded by the committed
  `config.php` (which itself contains no real values), or
- Environment variables set on the server/PHP-FPM pool and read via `getenv()`.

Either way, real credentials must never re-enter the Git history — add them
to `.gitignore` once the config split happens.

## Backup before deploy

FTP gives no way to trigger a remote backup command as part of the pipeline
(see "No automatic database backup" above). Because the FTP deploy is a
mirror (uploads changed/new files, and deletes files removed from the repo,
outside the excluded upload directories), take a full manual backup before
the **first** production deploy through this pipeline, and periodically
thereafter, via whatever access your hosting control panel provides (backup
tool, file manager download, or a one-off FTP mirror to a local machine).

Also back up the database separately (via your hosting control panel or
`mysqldump` if any access allows it) — this deploy pipeline never touches the
database, so DB backups must be handled entirely through your existing
process.

## Rollback

There is no automated rollback workflow in this setup, and FTP makes
rollback harder than SSH/rsync would (no remote snapshot/restore command).
If a bad deploy needs reverting:

1. Revert the offending commit(s) on `main` via a normal PR (`git revert`),
   which triggers a new FTP deploy of the reverted state — this is the
   preferred path, since it keeps Git as the source of truth.
2. If GitHub Actions itself is unavailable, restore from the most recent
   manual backup taken per the step above via your hosting control panel's
   FTP/file manager access, or manually re-upload a known-good local
   checkout of an earlier commit over FTP.

## Verifying a deployment

- `.github/workflows/deploy-production.yml` prints the deployed commit SHA in
  the job log and the workflow run summary.
- Compare that SHA to `git log -1 --format=%H` on `main` to confirm the
  expected commit shipped.
- If `PRODUCTION_URL` is configured (see [`github-secrets.md`](github-secrets.md)),
  the workflow makes a plain HTTP request to it after deploy and warns (does
  not fail the run) if the response looks unhealthy. This is a weak signal —
  FTP gives no way to run a real server-side PHP lint like an SSH-based setup
  could.
- Manually spot-check the live site (homepage, map page, admin login) after
  each deploy until the pipeline has a track record.
