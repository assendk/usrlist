# Simple usrlist app
used Laravel 5.6

1. git clone
2. composer install
3. php artisan make:auth
4. php artisan migrate
5. set permissions to www-data
6. php artisan tinker
7. factory(App\User::class, 100)->create(); // or 5000

#TODO
- validation with old password on change
- upload profile pics via ajax/vue 
- repair logout
