# modern-legacy

Production site for **modernist.kaunas.lt**, a Kaunas municipality
cultural-heritage site covering Kaunas modernist architecture, UNESCO World
Heritage / European Heritage Label (EHL) content, resident info, news, and a
building catalog managed through a small admin panel (`kmsaadmin/`).

This is a legacy plain-PHP application. It is planned to eventually be
replaced by a Symfony + Sulu project (`modernistai-web`), but it remains the
live production source until that migration happens.

**Before making changes**, read the critical audit in
[`docs/legacy-critical-audit/`](docs/legacy-critical-audit/summary.md) — it
documents known critical/high security issues (unauthenticated admin write
endpoints, committed secrets, etc.) and what must not be deployed as-is.

## CI/CD workflow

All changes go through a branch → Pull Request → CI → merge → production
deploy pipeline. Direct commits to `main` and manual server edits are not
part of the normal workflow. Full details: [`docs/deployment/git-workflow.md`](docs/deployment/git-workflow.md).

```text
feature branch → PR → CI → merge to main → production deploy
```

Typical flow:

```bash
git checkout -b feature/fix-critical-admin-actions
git add .
git commit -m "Fix critical admin action guards"
git push -u origin feature/fix-critical-admin-actions
```

Then:

1. Open a Pull Request into `main` on GitHub.
2. Wait for CI (`.github/workflows/ci.yml`) to pass — PHP syntax check,
   deployment-exclusion guardrail, secret scan, admin action auth-guard check.
3. Merge once required checks pass (and review, if a reviewer is available).
4. `.github/workflows/deploy-production.yml` runs automatically against
   `main` and deploys via **FTP** (production has no SSH access), excluding
   dangerous/non-production files per
   [`deploy/exclude-from-deploy.txt`](deploy/exclude-from-deploy.txt) (the
   same patterns, hand-duplicated in the workflow since the FTP action can't
   read an exclude file directly).
5. If the `production` GitHub Environment requires reviewer approval, approve
   the deployment run in the Actions tab.

FTP deployment has real limitations vs. an SSH-based setup: no remote
commands, no automatic database backup, no server-side PHP lint, and harder
rollback. See [`docs/deployment/production-server.md`](docs/deployment/production-server.md)
for details and the plan to switch to SSH/rsync if server access ever allows
it.

See also:

- [`docs/deployment/git-workflow.md`](docs/deployment/git-workflow.md) — branch strategy and required branch protection rules.
- [`docs/deployment/github-secrets.md`](docs/deployment/github-secrets.md) — FTP secrets required for deployment.
- [`docs/deployment/production-server.md`](docs/deployment/production-server.md) — server requirements, backup, and rollback.
