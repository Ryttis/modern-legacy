# GitHub Secrets for Production Deployment

`.github/workflows/deploy-production.yml` deploys `main` to production over
**FTP**, because the production server has no SSH access. **No real values
are stored in this repository** — this document only explains what to create
and where. Never paste real secret values into a PR, issue, or commit.

Prefer creating these as **environment secrets** on the `production`
[GitHub Environment](https://docs.github.com/en/actions/deployment/targeting-different-environments/using-environments-for-deployment)
(Settings → Environments → production → Environment secrets) rather than
repository-wide secrets, so they are only exposed to deployment runs and can
be gated behind required reviewers. If they currently exist as
repository-wide secrets, move them to the `production` environment and
remove the repository-wide copies.

## Required secrets

These already exist in this repository per the current production setup:

| Secret | Purpose |
|---|---|
| `FTP_HOST` | Hostname or IP of the production FTP/FTPS server. |
| `FTP_USERNAME` | FTP account used for deployment. Should be a dedicated deploy account with access scoped to the web root only, not a full hosting-control-panel login, if the host allows creating one. |
| `FTP_PASSWORD` | Password for `FTP_USERNAME`. **Never printed in workflow logs** — GitHub Actions automatically masks secret values in logs, and no workflow step in this repo echoes it. |
| `FTP_PORT` | FTP/FTPS port (commonly `21`). |
| `FTP_REMOTE_PATH` | Absolute or relative path on the server that deployment uploads into (the web-served docroot), e.g. `/public_html` or `/httpdocs`. |
| `PRODUCTION_URL` | Public URL of the live site (e.g. `https://modernist.kaunas.lt`), used only for an optional post-deploy HTTP health check. Not sensitive, but stored as a secret per the existing repository convention. |

## FTP protocol note

`deploy-production.yml` requests `protocol: ftps` (explicit FTP over TLS) by
default, since it's more secure than plain FTP for credentials in transit. If
the production host only supports plain FTP, change `protocol: ftps` to
`protocol: ftp` in the workflow — check with whoever manages hosting before
assuming either way.

## Why FTP instead of SSH/rsync

The production server does not expose SSH, so the SSH/rsync-based deployment
approach (`deploy/legacy-rsync-deploy.sh`) cannot be used today. That script
is kept in the repository only as future reference — it is not called by any
workflow. See [`production-server.md`](production-server.md) for the
limitations this implies (no remote commands, no automatic DB backup, no
server-side PHP lint, harder rollback) and what to do if SSH access becomes
available later.

## Rotation note

These FTP credentials are separate from — and do not replace — the
credential rotation already required by the
[security audit](../legacy-critical-audit/security-findings.md): the MySQL
password and reCAPTCHA secret currently committed in `config.php` /
`en/config.php` / `kmsaadmin/config.php` / `form_action.php` must still be
rotated and moved out of the repository, regardless of this CI/CD setup.
