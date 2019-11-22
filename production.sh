#!/bin/bash

php artisan env
php artisan config:cache
php artisan route:cache
php artisan view:clear
sudo chmod 777 -R ./storage
composer dump