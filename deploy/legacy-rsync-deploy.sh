#!/usr/bin/env bash
#
# Deploys the current working tree (as checked out by CI, from `main`) to the
# production server over rsync/SSH, honoring deploy/exclude-from-deploy.txt.
#
# Required environment variables:
#   PRODUCTION_HOST  - production server hostname or IP
#   PRODUCTION_USER  - SSH user to deploy as
#   PRODUCTION_PORT  - SSH port
#   PRODUCTION_PATH  - absolute path to the docroot on the server
#
# An SSH key with access to PRODUCTION_USER@PRODUCTION_HOST must already be
# loaded in the running ssh-agent (see .github/workflows/deploy-production.yml,
# which uses webfactory/ssh-agent to load PRODUCTION_SSH_KEY before calling
# this script). This script does not read or write the private key itself.
#
# Usage:
#   PRODUCTION_HOST=... PRODUCTION_USER=... PRODUCTION_PORT=... PRODUCTION_PATH=... \
#     bash deploy/legacy-rsync-deploy.sh

set -euo pipefail

SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
REPO_ROOT="$(cd "${SCRIPT_DIR}/.." && pwd)"
EXCLUDE_FILE="${SCRIPT_DIR}/exclude-from-deploy.txt"

required_vars=(PRODUCTION_HOST PRODUCTION_USER PRODUCTION_PORT PRODUCTION_PATH)
missing=0
for var in "${required_vars[@]}"; do
  if [ -z "${!var:-}" ]; then
    echo "ERROR: required environment variable $var is not set." >&2
    missing=1
  fi
done
if [ "$missing" -eq 1 ]; then
  exit 1
fi

if [ ! -f "$EXCLUDE_FILE" ]; then
  echo "ERROR: exclusion file not found at $EXCLUDE_FILE — refusing to deploy without it." >&2
  echo "This file is the safety layer that keeps dangerous legacy files out of production." >&2
  exit 1
fi

if ! command -v rsync >/dev/null 2>&1; then
  echo "ERROR: rsync is not installed." >&2
  exit 1
fi

# Trailing slash on the source copies directory *contents* into
# PRODUCTION_PATH rather than nesting the repo folder itself.
SOURCE="${REPO_ROOT}/"
DESTINATION="${PRODUCTION_USER}@${PRODUCTION_HOST}:${PRODUCTION_PATH}"

echo "Deploying ${SOURCE} -> ${DESTINATION} (port ${PRODUCTION_PORT})"
echo "Using exclusion list: ${EXCLUDE_FILE}"

# Notes on flags:
#   -a               archive mode (recursive, preserves perms/times/links)
#   -z               compress during transfer
#   --exclude-from   apply deploy/exclude-from-deploy.txt
#   NO --delete      deliberately omitted: this script never deletes files on
#                     the server that aren't in the source tree, so runtime
#                     uploads/media (e.g. ehl-pastatai/, ehl-upload/,
#                     news-img/) created directly on production are preserved.
#                     If pruning old files is ever needed, do it deliberately
#                     and separately from a routine deploy, not by default here.
rsync -az \
  --exclude-from="${EXCLUDE_FILE}" \
  -e "ssh -p ${PRODUCTION_PORT} -o StrictHostKeyChecking=accept-new" \
  "${SOURCE}" \
  "${DESTINATION}"

echo "Deploy complete. Deployed commit: $(git -C "${REPO_ROOT}" rev-parse HEAD)"
