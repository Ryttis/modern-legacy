# GitHub Secrets for Production Deployment

`.github/workflows/deploy-production.yml` deploys `main` to production using an
SSH key and connection details stored as GitHub secrets. **No real values are
stored in this repository** — this document only explains what to create and
where.

Prefer creating these as **environment secrets** on the `production`
[GitHub Environment](https://docs.github.com/en/actions/deployment/targeting-different-environments/using-environments-for-deployment)
(Settings → Environments → production → Environment secrets) rather than
repository-wide secrets, so they are only exposed to deployment runs and can be
gated behind required reviewers. Repository-wide secrets also work if
environments aren't available on your plan.

## Required secrets

| Secret | Purpose |
|---|---|
| `PRODUCTION_HOST` | Hostname or IP of the production server. |
| `PRODUCTION_USER` | SSH user the deploy connects as. Should be a dedicated deploy user, not a shared/admin account. |
| `PRODUCTION_PORT` | SSH port (commonly `22`, but many hosts use a custom port). |
| `PRODUCTION_SSH_KEY` | Private half of a dedicated SSH deploy key (see below). |
| `PRODUCTION_PATH` | Absolute path to the docroot on the server that `rsync` deploys into, e.g. `/var/www/modernist.kaunas.lt/public_html`. |

## Optional secrets

| Secret | Purpose |
|---|---|
| `PRODUCTION_BEFORE_DEPLOY_COMMAND` | Shell command run over SSH on the server before rsync (e.g. put the app in maintenance mode). |
| `PRODUCTION_AFTER_DEPLOY_COMMAND` | Shell command run over SSH on the server after rsync (e.g. clear an opcode cache). |

## Optional repository/environment variable

| Variable (not secret) | Purpose |
|---|---|
| `PRODUCTION_REMOTE_PHP_LINT_COMMAND` | If set, run after deploy over SSH to sanity-check the deployed code, e.g. `cd /var/www/modernist.kaunas.lt/public_html && find . -name '*.php' -exec php -l {} \;`. Not a secret, so it's stored as a [repository/environment variable](https://docs.github.com/en/actions/learn-github-actions/variables), not a secret. |

## Creating a dedicated SSH deploy key

Do not reuse a personal SSH key. Generate a key used only by GitHub Actions for
this repository:

```bash
ssh-keygen -t ed25519 -C "github-actions-modern-legacy-production" -f ./modern-legacy-deploy-key -N ""
```

This produces two files:

- `modern-legacy-deploy-key` — the **private** key.
- `modern-legacy-deploy-key.pub` — the **public** key.

### Private key → GitHub secret

Copy the full contents of `modern-legacy-deploy-key` (including the
`-----BEGIN OPENSSH PRIVATE KEY-----` / `-----END OPENSSH PRIVATE KEY-----`
lines) into the `PRODUCTION_SSH_KEY` secret.

### Public key → production server

Append the contents of `modern-legacy-deploy-key.pub` to the deploy user's
`~/.ssh/authorized_keys` on the production server:

```bash
# on the production server, as the deploy user
mkdir -p ~/.ssh && chmod 700 ~/.ssh
cat modern-legacy-deploy-key.pub >> ~/.ssh/authorized_keys
chmod 600 ~/.ssh/authorized_keys
```

### Restrict the deploy user

Where possible:

- Create a dedicated system user for deployments (not `root`, not a shared
  admin login).
- Restrict its filesystem access to the deployment path (`PRODUCTION_PATH`)
  and, if the server supports it, use `chroot`/`rssh`/`scponly`/an
  `authorized_keys` `command=` restriction so the key can only be used for
  rsync-style transfers, not an interactive shell.
- Do not give the deploy user database credentials or sudo access — this
  deployment method only copies files, it never runs schema changes.

### Delete local copies

Once both halves are stored (GitHub secret + server `authorized_keys`), delete
the local key files:

```bash
rm ./modern-legacy-deploy-key ./modern-legacy-deploy-key.pub
```

## Rotation note

This deploy key is separate from — and does not replace — the credential
rotation already required by the [security audit](../legacy-critical-audit/security-findings.md):
the MySQL password and reCAPTCHA secret currently committed in `config.php` /
`en/config.php` / `kmsaadmin/config.php` / `form_action.php` must still be
rotated and moved out of the repository, regardless of this CI/CD setup.
