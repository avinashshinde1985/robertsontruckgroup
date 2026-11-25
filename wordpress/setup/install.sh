#!/usr/bin/env bash
# One-shot local install of the Robertson WordPress Multisite (subdirectory network).
#   Site 1 (main): Ote -> http://localhost/robertsontruckgroup/wordpress/
#   Site 2:        Rts -> http://localhost/robertsontruckgroup/wordpress/rts/
#
# Run from Git Bash with XAMPP's Apache + MySQL started:
#   bash wordpress/setup/install.sh
# Settings can be overridden with environment variables (see below). Safe to re-run: existing
# core, config, database and sites are kept and the content step updates pages/menus/posts in place.
set -euo pipefail
# Git Bash rewrites arguments that look like Unix paths (e.g. --base=/robertsontruckgroup/wordpress/
# becomes C:/Program Files/Git/robertsontruckgroup/wordpress/). Turn that off for this script.
export MSYS_NO_PATHCONV=1 MSYS2_ARG_CONV_EXCL='*'

# Windows-style paths (D:/...) under Git Bash so the Windows php.exe can open them.
winpwd() { pwd -W 2>/dev/null || pwd; }
HERE="$(cd "$(dirname "${BASH_SOURCE[0]}")" && winpwd)"
WP_DIR="$(cd "$HERE/.." && winpwd)"

PHP="${PHP:-php}"
URL="${WP_URL:-http://localhost/robertsontruckgroup/wordpress}"
BASE="${WP_BASE:-/robertsontruckgroup/wordpress/}"
DB_NAME="${DB_NAME:-robertsontruckgroup}"
DB_USER="${DB_USER:-root}"
DB_PASS="${DB_PASS:-}"
DB_HOST="${DB_HOST:-127.0.0.1}"
ADMIN_USER="${ADMIN_USER:-admin}"
ADMIN_EMAIL="${ADMIN_EMAIL:-admin@example.com}"
ADMIN_PASS="${ADMIN_PASS:-$("$PHP" -r 'echo bin2hex(random_bytes(8));')}"

WPCLI="$HERE/wp-cli.phar"
if [ ! -f "$WPCLI" ]; then
  echo "Downloading WP-CLI..."
  curl -fsSL -o "$WPCLI" https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
fi
wp() { "$PHP" "$WPCLI" --path="$WP_DIR" "$@"; }

# 1. WordPress core (wp-content/themes already holds the converted themes, so skip bundled content)
if [ ! -f "$WP_DIR/wp-load.php" ]; then
  wp core download --skip-content
fi

# 2. Database + wp-config.php
DB_NAME="$DB_NAME" DB_USER="$DB_USER" DB_PASS="$DB_PASS" DB_HOST="$DB_HOST" "$PHP" -r '
  $m = @new mysqli(getenv("DB_HOST"), getenv("DB_USER"), getenv("DB_PASS"));
  if ($m->connect_errno) { fwrite(STDERR, "MySQL connection failed: " . $m->connect_error . " (is MySQL running in XAMPP?)\n"); exit(1); }
  $m->query("CREATE DATABASE IF NOT EXISTS `" . $m->real_escape_string(getenv("DB_NAME")) . "` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");'
if [ ! -f "$WP_DIR/wp-config.php" ]; then
  wp config create --dbname="$DB_NAME" --dbuser="$DB_USER" --dbpass="$DB_PASS" --dbhost="$DB_HOST" --skip-check
fi

# 3. Network install: the main site is Ote
if ! wp core is-installed --network 2>/dev/null; then
  wp core multisite-install --url="$URL" --base="$BASE" --title="Ote" \
    --admin_user="$ADMIN_USER" --admin_password="$ADMIN_PASS" --admin_email="$ADMIN_EMAIL" --skip-email
  CREATED_ADMIN=1
fi

# Subdirectory multisite rewrite rules
cat > "$WP_DIR/.htaccess" <<HT
# BEGIN WordPress Multisite
RewriteEngine On
RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]
RewriteBase $BASE
RewriteRule ^index\.php$ - [L]

# add a trailing slash to /wp-admin
RewriteRule ^([_0-9a-zA-Z-]+/)?wp-admin$ \$1wp-admin/ [R=301,L]

RewriteCond %{REQUEST_FILENAME} -f [OR]
RewriteCond %{REQUEST_FILENAME} -d
RewriteRule ^ - [L]
RewriteRule ^([_0-9a-zA-Z-]+/)?(wp-(content|admin|includes).*) \$2 [L]
RewriteRule ^([_0-9a-zA-Z-]+/)?(.*\.php)$ \$2 [L]
RewriteRule . index.php [L]
# END WordPress Multisite
HT

# 4. Second site: Rts
if ! wp site list --field=url | grep -q "/rts/$"; then
  wp site create --slug=rts --title="Rts" --email="$ADMIN_EMAIL"
fi
RTS_URL="${URL%/}/rts/"

# 5. Advanced Custom Fields (free) provides the page content editing screens (fields defined in the themes' fields/ folders)
if ! wp plugin is-installed advanced-custom-fields; then
  wp plugin install advanced-custom-fields
fi
wp plugin activate advanced-custom-fields --network

# 5b. Themes: rts is the parent (shared assets), ote is its child theme
wp theme enable rts --network
wp theme enable ote --network
wp theme activate ote --url="${URL%/}/"
wp theme activate rts --url="$RTS_URL"

# 6. Pages, menus, blog posts and reading settings for both sites
wp eval-file "$HERE/setup-content.php" --url="${URL%/}/"

wp rewrite flush --url="${URL%/}/"
wp rewrite flush --url="$RTS_URL"

echo
echo "Done."
echo "  Ote (site 1): $URL/"
echo "  Rts (site 2): $RTS_URL"
echo "  Network admin: $URL/wp-admin/network/"
if [ "${CREATED_ADMIN:-0}" = 1 ]; then
  echo "  Login: $ADMIN_USER / $ADMIN_PASS   (change it under Users → Profile)"
fi
