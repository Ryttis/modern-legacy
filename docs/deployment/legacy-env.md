# Environment Variables (`.env`)

This legacy plain-PHP app previously had database credentials, the reCAPTCHA
secret, and the MapTiler API key hard-coded directly in committed PHP files
(see [`docs/legacy-critical-audit/security-findings.md`](../legacy-critical-audit/security-findings.md),
finding #4). They are now read from environment variables at runtime via a
small dependency-free loader, `includes/env.php`, instead.

This app doesn't use Composer, so there is no `vlucas/phpdotenv` dependency —
`includes/env.php` is a small hand-written loader kept intentionally simple.

## How it works

- `includes/env.php` exposes three functions:
  - `env_value(string $key, ?string $default = null): ?string` — returns the
    value, or `$default` (or `null`) if not set.
  - `env_required(string $key): string` — returns the value, or fails the
    request with a generic 500 error if missing. The missing key's *name* is
    logged server-side (`error_log`); the value is never logged or echoed.
  - `env_load()` — internal; called automatically by the two functions above.
- Resolution order: a real process/webserver environment variable (`getenv()`)
  always wins if set; otherwise the loader falls back to `.env` in the
  project root.
- `.env` is parsed as simple `KEY=value` lines. Blank lines and lines
  starting with `#` are ignored. Values may optionally be wrapped in matching
  single or double quotes (useful for values containing spaces, e.g.
  `CONTACT_MAIL_FROM="MODERNIST KAUNAS <helpdesk@kaunas.lt>"`).

## Required variables

See [`.env.example`](../../.env.example) for the full template. Summary:

| Variable | Used by | Notes |
|---|---|---|
| `DB_HOST` | `config.php`, `en/config.php`, `kmsaadmin/config.php` | Maps to the `DB_SERVER` PHP constant. |
| `DB_NAME` | same | Maps to `DB_NAME`. |
| `DB_USER` | same | Maps to `DB_USERNAME`. |
| `DB_PASSWORD` | same | Maps to `DB_PASSWORD`. |
| `RECAPTCHA_SITE_KEY` | `kontaktai.php`, `en/kontaktai.php`, `form_action.php`, `en/form_action.php` | Public reCAPTCHA site key (safe to appear in rendered HTML, but no longer hard-coded in source). |
| `RECAPTCHA_SECRET_KEY` | `form_action.php`, `en/form_action.php` | Private reCAPTCHA secret used server-side to verify submissions. |
| `MAPTILER_KEY` | `ehl.php`, `makingbuild.php`, `makingbuild-en.php`, `ehl-pastatai.php`, `en/ehl-pastatai.php` | MapTiler API key, interpolated server-side into the page's inline JS. |
| `CONTACT_MAIL_TO` | `form_action.php`, `en/form_action.php` | Optional — falls back to the previous hard-coded address if unset. |
| `CONTACT_MAIL_FROM` | `form_action.php`, `en/form_action.php` | Optional — falls back to the previous hard-coded `From` header if unset. |

The PHP constant names used elsewhere in the app (`DB_SERVER`, `DB_USERNAME`,
`DB_PASSWORD`, `DB_NAME`) were kept unchanged — only where the *values* come
from changed. `DB_PASSWORD` happens to be both the env var name and the PHP
constant name; the other three constants use conventional env var names
(`DB_HOST`/`DB_USER`) that don't match their PHP constant names 1:1 — see the
table above.

## Local development

1. Copy the template: `cp .env.example .env`
2. Fill in real (or test) values in `.env`. **Never commit this file** — it's
   listed in `.gitignore`.
3. Run PHP normally; `includes/env.php` picks up `.env` automatically.

## Production

- `.env` must be **created manually on the production server**, or the same
  variables must be set as real environment variables at the hosting/PHP-FPM
  level (real env vars always take priority over `.env` if both exist).
- `.env` must **never be committed** to this repository.
- **FTP deployment will not upload `.env`.** Production deployment is FTP
  (see [`production-server.md`](production-server.md) and
  [`github-secrets.md`](github-secrets.md) — SSH is unavailable). The FTP
  deploy workflow (`.github/workflows/deploy-production.yml`) only uploads
  what's checked into `main`; since `.env` is git-ignored, it is never part
  of the deployed artifact, and the deploy job cannot overwrite or delete
  whatever `.env` already exists on the server. This is intentional: server
  secrets must survive deploys untouched.
- Because the deploy never touches `.env`, if production doesn't have one
  yet, it must be created there once, out of band (e.g. via whatever file
  manager or SFTP-over-control-panel access the host provides), before the
  app will function — `env_required()` calls will otherwise fail closed with
  a generic 500 rather than silently using an empty/wrong value.

## Rotating credentials

The audit ([`security-findings.md`](../legacy-critical-audit/security-findings.md))
flagged the MySQL password and reCAPTCHA secret as already compromised by
virtue of having been committed to a repo with a GitHub remote — moving them
into `.env` does not undo that; rotation is still required.

1. **MySQL password**: rotate via your database host/control panel, update
   `DB_PASSWORD` in the server's `.env`, then verify the site can still
   connect (e.g. load a page that calls `Database()`).
2. **reCAPTCHA site/secret keys**: rotate in the
   [Google reCAPTCHA admin console](https://www.google.com/recaptcha/admin),
   update `RECAPTCHA_SITE_KEY` and `RECAPTCHA_SECRET_KEY` in the server's
   `.env`, then verify the contact form (`kontaktai.php`) still submits
   successfully.
3. **MapTiler key**: rotate in the MapTiler account dashboard, update
   `MAPTILER_KEY` in the server's `.env`, then verify a map page (e.g.
   `ehl-pastatai.php`) still renders the map.

After rotating, also update your local `.env` (and anyone else's) — old
values will simply stop working, which is the point.

## CI

`.github/workflows/ci.yml` includes `secret-scan-runtime` (blocking) and
`secret-scan-hygiene` (non-blocking, broad reminder). Both exclude
`.env.example` and documentation (`docs/`, `*.md`) — mentioning "secret" or
"password" in prose or in a placeholder template never fails CI. The
blocking job looks for the *shape* of a real secret value (a hard-coded
`define('DB_PASSWORD', '...')`, a Google reCAPTCHA-shaped key literal, or PEM
key material) in runtime files, not for variable/constant names — calls like
`env_required('DB_PASSWORD')` are expected and do not trigger it.
