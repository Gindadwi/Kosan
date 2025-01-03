## cara meng install project laravel 

ada dua cara coba salah satu
- composer create-project --prefer-dist laravel/laravel boking-hotel
- composer create-project laravel/laravel boking-hotel

## membuat model 
- php artisan make:model Room -m 
- php artisan make:model BoardingHouse -m

## migrasi tabel ke sql 
- php artisan migrate 
- php artisan migrate:fresh --seed (gunakan jika ada pembaruan tabel database)

## menginstall fillament 
- composer require filament/filament -W

## membuat akun admin
- php artisan make:filament-user

## untuk menjalankan filament
- php artisan serve

## membuat CRUD meenggunakan fillament
- php artisan make:filament-resource City (bagian belakang ubah sesuai tabel)

## menjalankan link di database
-  php artisan storage:link

## optimize ulang ketika mengganti link local host di ENV
-  php artisan optimize  

## membuat repositori untuk interfaces
- php artisan make:provider RepositoryServiceProvider


## membuat fungsi controler 
-  php artisan make:controller HomeController