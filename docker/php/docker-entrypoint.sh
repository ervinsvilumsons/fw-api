#!/bin/sh

echo "Using SQLite..."

# Ensure database file exists
touch /var/www/html/database/database.sqlite
chown -R www-data:www-data /var/www/html/database/database.sqlite

echo "Running migrations..."

php artisan migrate --force

echo "Starting application..."

exec "$@"