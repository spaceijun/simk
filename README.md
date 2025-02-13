## Sistem Informasi Manajemen Keuangan

### Installation Demo (Local)

-   clone this repository
-   cp.env.example .env (copy environtment variable)
-   config the DB Connection
-   `composer install`
-   `php artisan key:generate`
-   `php artisan migrate:fresh --seed`
-   serve the application `php artisan serve`

### Installation Live (Production)

-   clone this repository
-   set pointer domain to public/index.php
-   go to terminal and doing this instructions
-   cp.env.example .env (copy environtment variable)
-   config the DB Connection
-   `composer install`
-   `php artisan key:generate`
-   `php artisan migrate:fresh`
-   `php artisan db:seed --class=settingwebSeeder`
-   serve the application `php artisan serve`

#### User Account

-   admin@mail.com (pass=password)
