#!/bin/bash

set -e
set -x

cp ../.env .env

php artistan config:cache
php artisan migrate

php artisan cache:clear

php artisan export
