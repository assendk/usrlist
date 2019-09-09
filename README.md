# Simple usrlist app
used Laravel 5.6

1. git clone
2. composer install
3. php artisan key:generate
3. set .env connection to DB (CREATE DATABASE `usrlist` /*!40100 COLLATE 'utf8mb4_unicode_ci' */) + username + pass
4. php artisan migrate
5. set permissions to www-data
6. php artisan tinker
7. factory(App\User::class, 100)->create(); // or 5000

#TODO
- validation with old password on change
- upload profile pics via ajax/vue 
- repair logout
