#!/bin/dash

php artisan config:clear;
php artisan cache:clear;
php artisan config:cache;
php artisan migrate:fresh --seed;
php artisan serve;
