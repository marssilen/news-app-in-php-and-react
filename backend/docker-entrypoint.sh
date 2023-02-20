#!/bin/sh


echo "Starting the server..."

php artisan key:generate --force
php artisan serve --host 0.0.0.0 --port=80