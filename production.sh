#!/bin/bash

php artisan env
php artisan cache:clear
php artisan view:clear
php artisan config:cache
php artisan route:cache
sudo chmod 777 -R ./storage
npm run production
composer dump