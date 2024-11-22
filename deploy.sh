#!/bin/bash

set -e
set -x

cp ../.env .env

php artisan config:cache
php artisan migrate

php artisan cache:clear
php artisan export
