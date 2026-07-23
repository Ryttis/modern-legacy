# Production Server Requirements & Operations

This documents the expected production environment for `modern-legacy`
(`modernist.kaunas.lt`) and the operational steps around deployment. It
describes expectations for whoever administers the server — it does not
change any server configuration itself.

## Expected web root / deployment path

- `PRODUCTION_PATH` (GitHub secret, see [`github-secrets.md`](github-secrets.md))
  must point at the actual web-served docroot, e.g.
  `/var/www/modernist.kaunas.lt/public_html`.
- The deploy (`deploy/legacy-rsync-deploy.sh`) rsyncs the repository contents
  directly into `PRODUCTION_PATH`, honoring
  [`deploy/exclude-from-deploy.txt`](../../deploy/exclude-from-deploy.txt).
  `index.php` must end up at the docroot's top level (not nested a directory
  deeper) for the site to serve correctly.

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
web server process) needs write access to them, and the deploy script
deliberately never deletes their contents (`rsync` without `--delete`):

- `ehl-pastatai/` — building images uploaded via `kmsaadmin/actions/save-building.php`
  and `update-building.php`.
- `ehl-upload/` — secondary upload target (purpose unconfirmed — see
  `fix-roadmap.md` question 6).
- `news-img/` — news article images.

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

Since the deploy script does not delete files (no `--delete`), a routine
deploy cannot destroy content by itself. Still, before the **first**
production deploy through this pipeline (and periodically thereafter), take a
full backup:

```bash
# on the production server
tar -czf ~/modern-legacy-backup-$(date +%Y%m%d-%H%M%S).tar.gz -C /path/to PRODUCTION_PATH_basename
```

Also back up the database separately (`mysqldump`) — this deploy pipeline
never touches the database, so DB backups must be handled through your
existing DB backup process.

## Rollback

There is no automated rollback workflow in this initial setup (out of scope
for this task). If a bad deploy needs reverting:

1. Revert the offending commit(s) on `main` via a normal PR (`git revert`),
   which triggers a new deploy of the reverted state — this is the
   preferred path, since it keeps Git as the source of truth.
2. If GitHub Actions itself is unavailable, restore from the most recent
   `tar.gz` backup taken per the step above, or re-run
   `deploy/legacy-rsync-deploy.sh` manually from a known-good local checkout
   of an earlier commit.

## Verifying a deployment

- `.github/workflows/deploy-production.yml` prints the deployed commit SHA in
  the job log and the workflow run summary.
- Compare that SHA to `git log -1 --format=%H` on `main` to confirm the
  expected commit shipped.
- If `PRODUCTION_REMOTE_PHP_LINT_COMMAND` is configured (see
  [`github-secrets.md`](github-secrets.md)), the workflow runs it over SSH
  after deploy as a basic sanity check.
- Manually spot-check the live site (homepage, map page, admin login) after
  each deploy until the pipeline has a track record.
