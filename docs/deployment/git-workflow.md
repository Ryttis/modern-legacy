# Git Workflow & Branch Strategy

This document defines the required Git workflow for `modern-legacy`, the production
plain-PHP site behind `modernist.kaunas.lt`. It exists so that changes — including
emergency fixes from the [critical audit](../legacy-critical-audit/summary.md) — go
through review and automated checks before they reach production, instead of being
edited directly on the live server.

This is a **process document**. It does not change any application code, database
schema, or server configuration by itself.

## Branches

### `main`

- Protected branch.
- Represents the current production source of truth.
- No direct commits or pushes — all changes arrive via reviewed Pull Requests.
- Every merge into `main` triggers an automatic deployment to production
  (see [`deploy-production.yml`](../../.github/workflows/deploy-production.yml)).

### `feature/*`

- All development happens on short-lived feature branches, e.g.:
  - `feature/fix-critical-admin-actions`
  - `feature/block-dangerous-files`
  - `feature/rotate-secrets`
- Branch names should describe the change, not the person making it.
- Pushed to GitHub, then opened as a Pull Request into `main`.
- Deleted after merge (branch protection should *not* protect feature branches).

## Pull Requests

- Every change to `main` goes through a Pull Request.
- CI ([`ci.yml`](../../.github/workflows/ci.yml)) must run and pass:
  - PHP syntax check
  - deployment-exclusion check
  - runtime secret scan (`secret-scan-runtime`, blocking — fails on real
    hard-coded secret values, not on variable names; see
    [`legacy-env.md`](legacy-env.md))
  - broad secret-scan hygiene reminder (`secret-scan-hygiene`, non-blocking)
  - admin action auth-guard check (currently non-blocking — see below)
- A human review is required whenever more than one person is available to review.
  For a single-maintainer period, self-merge after CI passes is acceptable, but the
  PR must still exist so the diff and CI result are recorded.
- Merge only after all required status checks pass.

## Production

- Deployed **only** from `main`, only via the
  [`deploy-production.yml`](../../.github/workflows/deploy-production.yml) workflow.
- **Deployment method: FTP.** The production server has no SSH access, so
  deployment uses FTP/FTPS (the `SamKirkland/FTP-Deploy-Action` GitHub Action),
  not rsync/SSH. See [`github-secrets.md`](github-secrets.md) and
  [`production-server.md`](production-server.md) for details and the
  limitations that come with FTP-only access (no remote commands, no
  automatic DB backup, no server-side PHP lint, harder rollback).
- No manual FTP/SFTP edits directly on the server outside this pipeline. Any
  manual out-of-band change is effectively undocumented and will be silently
  overwritten (or diverge from) the next deploy — treat direct server edits
  as an incident, not a shortcut.
- Deployment excludes dangerous/non-production files — see
  [`deploy/exclude-from-deploy.txt`](../../deploy/exclude-from-deploy.txt) and the
  [audit findings](../legacy-critical-audit/security-findings.md). Because the
  FTP action can't read exclusions from a file, the same pattern list is
  hand-duplicated inside `deploy-production.yml`'s `exclude:` block — keep
  both in sync when either changes.
- Emergency hotfixes still go through a PR (it can be fast — a PR can be opened and
  merged in minutes). Bypassing PR review is only acceptable if GitHub itself is
  unreachable; in that case, the change must be re-created as a proper PR
  retroactively as soon as possible so history and CI stay accurate.

## Recommended GitHub branch protection rules (`main`)

Configure these in **Settings → Branches → Branch protection rules** for `main`:

- Require a pull request before merging.
- Require status checks to pass before merging (select the CI jobs from `ci.yml`).
- Require branches to be up to date before merging (if offered on your GitHub plan).
- Require conversation resolution before merging (recommended).
- Do not allow bypassing the above settings, including for administrators, once the
  team is more than one person.
- Disallow force pushes to `main`.
- Disallow branch deletion for `main`.
- Restrict who can push directly to `main` — ideally nobody; all changes via PR.

## Recommended GitHub environment protection (`production`)

The [`deploy-production.yml`](../../.github/workflows/deploy-production.yml) workflow
targets a GitHub **environment** named `production`. Configure it in
**Settings → Environments → production**:

- Required reviewers: restrict who can approve a deployment run before it executes.
- Deployment branches: restrict to `main` only.
- Store the FTP secrets (`FTP_HOST`, `FTP_USERNAME`, `FTP_PASSWORD`, `FTP_PORT`,
  `FTP_REMOTE_PATH`, `PRODUCTION_URL`) as environment secrets on `production`
  rather than repository-wide secrets, so they are only exposed to approved
  deployment runs. If they currently exist as repository-wide secrets, move
  them to the `production` environment (Settings → Environments → production
  → Environment secrets) and remove the repository-wide copies.

See [`github-secrets.md`](github-secrets.md) for the full secrets list and how to
create them.

## Typical developer flow

```bash
git checkout main
git pull
git checkout -b feature/fix-critical-admin-actions

# ...make changes...

git add .
git commit -m "Fix critical admin action guards"
git push -u origin feature/fix-critical-admin-actions
```

Then on GitHub:

1. Open a Pull Request into `main`.
2. Wait for CI to pass.
3. Merge (after review, if a reviewer is available).
4. The `deploy-production.yml` workflow runs automatically against `main`.
5. If the `production` environment requires approval, approve the deployment run.
