## Sistem Informasi Manajemen Keuangan

### Installation Demo (Local)

-   clone this repository
-   env.example .env (copy environtment variable)
-   config the DB Connection
-   `composer install`
-   `php artisan key:generate`
-   `php artisan migrate:fresh --seed`
-   `php artisan db:seed --class=userSeeder`
-   serve the application `php artisan serve`

### Data Factory

-   `php artisan db:seed --class=akunSeeder`
-   `php artisan db:seed --class=hutangpiutangSeeder`
-   `php artisan db:Seed --class=kategoriSeeder`
-   `php artisan db:seed --class=transaksiSeeder`

### Installation Live (Production)

-   clone this repository
-   set pointer domain to public/index.php
-   go to terminal and doing this instructions
-   env.example .env (copy environtment variable)
-   config the DB Connection
-   `composer install`
-   `php artisan key:generate`
-   `php artisan migrate:fresh`
-   `php artisan db:seed --class=settingwebSeeder`
-   `php artisan db:seed --class=userSeeder`
-   serve the application `php artisan serve`

#### User Account

-   admin@mail.com (pass=password)
