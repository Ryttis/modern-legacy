#!/usr/bin/env bash
set -euo pipefail

cd "$HOME/code/modern-legacy"

if [ -f ".env" ]; then
  set -a
  source .env
  set +a
else
  echo "ERROR: .env file not found."
  exit 1
fi

: "${FTP_HOST:?FTP_HOST missing in .env}"
: "${FTP_PORT:?FTP_PORT missing in .env}"
: "${FTP_USERNAME:?FTP_USERNAME missing in .env}"
: "${FTP_PASSWORD:?FTP_PASSWORD missing in .env}"

echo "Deploying modern-legacy to production via FTP"
echo "Branch: $(git branch --show-current)"
echo "Commit: $(git rev-parse --short HEAD)"
echo "FTP host: $FTP_HOST"
echo

if [ "$(git branch --show-current)" != "main" ]; then
  echo "ERROR: You are not on main branch."
  exit 1
fi

if [ -n "$(git status --porcelain)" ]; then
  echo "ERROR: Working tree is not clean."
  git status --short
  exit 1
fi

read -r -p "Type DEPLOY to continue: " confirm
if [ "$confirm" != "DEPLOY" ]; then
  echo "Cancelled."
  exit 1
fi

lftp -u "$FTP_USERNAME","$FTP_PASSWORD" -p "$FTP_PORT" "$FTP_HOST" <<EOF
set ftp:ssl-allow no
mirror -R --verbose \
  --exclude-glob ".git/**" \
  --exclude-glob ".github/**" \
  --exclude-glob ".idea/**" \
  --exclude-glob "docs/**" \
  --exclude-glob "deploy/**" \
  --exclude-glob "MODERNIS_BACKUP/**" \
  --exclude-glob "*.sql" \
  --exclude-glob ".env" \
  --exclude-glob ".env*" \
  --exclude-glob "test.php" \
  --exclude-glob "en/test.php" \
  --exclude-glob "reverse.php" \
  --exclude-glob "en/reverse.php" \
  --exclude-glob "kmsaadmin/db.php" \
  --exclude-glob "ehl-pastatai/**" \
  --exclude-glob "ehl-upload/**" \
  --exclude-glob "news-img/**" \
  ./ ./
bye
EOF

echo "Deploy finished."