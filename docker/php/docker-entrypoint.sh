#!/bin/sh

echo "Using SQLite..."

# Ensure storage and cache permissions are set correctly
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database
chmod 1777 /tmp

# Ensure database file exists
touch /var/www/html/database/database.sqlite
chown www-data:www-data /var/www/html/database/database.sqlite
chmod 664 /var/www/html/database/database.sqlite

echo "Running migrations..."

php artisan migrate --force

echo "Starting application..."

exec "$@"