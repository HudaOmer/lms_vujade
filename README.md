# LMS - Library Management System
This project is developed using Laravel

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


# SetUp

## `Database` 
make sure to create lms database using myphpadmin directly or in cmd
```go
$ mysql -u root
Welcome to the MariaDB monitor.  Commands end with ; or \g.
Your MariaDB connection id is 484
Server version: 10.4.32-MariaDB mariadb.org binary distribution

Copyright (c) 2000, 2018, Oracle, MariaDB Corporation Ab and others.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

MariaDB [(none)]> create database lms;
Query OK, 1 row affected (0.002 sec)

MariaDB [(none)]> exit
Bye
$
```
now if not, in `.env` Folder set `DB_CONNECTION=mysql` & `DB_DATABASE=lms`

## `Migration`
to create books table first make a new migration
```go
$ php artisan make:migration create_books_table

   INFO  Migration [path\lms_vujade\database\migrations/2024_06_26_020143_create_books_table.php] created successfully.

$
```
then use migrate command to run all tables (without ':status')
```go
$ php artisan migrate:status

  Migration name .................................................................................................................... Batch / Status       
  0001_01_01_000000_create_users_table ..................................................................................................... [1] Ran       
  0001_01_01_000001_create_cache_table ..................................................................................................... [1] Ran       
  0001_01_01_000002_create_jobs_table ...................................................................................................... [1] Ran       
  2024_06_26_020143_create_books_table ..................................................................................................... Pending       

$
```
## `Seeders`
Populate books table with data
```go
$ php artisan make:seeder BooksTableSeeder

   INFO  Seeder [path\lms_vujade\database\seeders\BooksTableSeeder.php] created successfully.


$ php artisan db:seed --class=BooksTableSeeder

   INFO  Seeding database.


```

# MVC Architecture check

## `Model`
Added Book Model Using the command:
```go
$ php artisan make:model Book

   INFO  Model [path\lms_vujade\app\Models\Book.php] created successfully.


$
```

## `Controller`
Added BookController Using the command:
```go
$ php artisan make:controller BookController

   INFO  Controller [path\lms_vujade\app\Http\Controllers\BookController.php] created successfully.


$
```