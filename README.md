# LMS - Library Management System
This project is developed using Laravel

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# `Cloning this repository and running locally:`
## `Prerequisites:`

1. Install `PHP`:
- Ensure `PHP` is installed on your machine. Laravel typically requires `PHP 7.x` or higher.

2. Install `Composer`:
- Composer is a dependency manager for `PHP`. You need Composer to install `Laravel` and manage its dependencies.
- Install Composer from getcomposer.org.

3. Install `MySQL` or `MariaDB`:
- Laravel uses a database to store data. Install `MySQL` or `MariaDB` server locally.

4. Install a Web Server:
You can use `Apache` or `Nginx`. Alternatively, `PHP's` built-in server can be used for development purposes.

## Step one: `Clone the Repository`:
```go
git clone https://github.com/HudaOmer/lms_vujade
cd lms_vujade
```

## Step two: `Install Dependencies`:
Navigate into the project directory and run Composer to install PHP dependencies defined in `composer.json`
get `vendor` directory by running the followiong command:
```go
composer install
```
This part takes time so be patient!

## Step three: `Copy Environment File`:
Laravel uses a `.env` file to manage environment-specific configurations. Copy the `.env.example` file to create your `.env` file:
```go
cp .env.example .env
```

## Step four: `Generate Application Key`:
Run the following command to generate a unique application key for your Laravel application:
```go
php artisan key:generate
```

## Step five: `Configure Database`:
Open `.env` file and configure database connection settings (database name, username, password).

## Step six: `Run Migrations`:
Laravel migrations create database tables. Run migrations to set up the database schema:
```go
php artisan migrate
```

## Step seven: `Start Development Server`:
You can use Laravel's built-in server for development. Run the following command:
```go
php artisan serve
```
By default, this will start a development server at http://localhost:8000.

## Step eight: `Access Your Application`:
Open a web browser and go to http://localhost:8000 (or the URL shown in your terminal after running php artisan serve).
(open `XAMPP`, start `Apache` and `MySQL`)

# `Congrats, You are done now.`

## Additional Steps:
- Clear Cache: If you face issues, run `php artisan cache:clear` and `php artisan config:clear`.
- Install `Node.js` and `NPM`: For frontend assets (optional, if the project uses `Vue.js` or `React`).
By following these steps, you should be able to clone and run a Laravel project locally on your machine. Adjust configurations as per your project's specific requirements (e.g., configuring `mail`, queue services in `.env`).

### `Dont bother reading the rest, its mine!`

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

## `Auth`
used ui package:
```go
$ composer require laravel/ui

$ php artisan ui vue --auth

  The [Controller.php] file already exists. Do you want to replace it? (yes/no) [yes]
❯ 

   INFO  Authentication scaffolding generated successfully.

   INFO  Vue scaffolding installed successfully.

   WARN  Please run [npm install && npm run dev] to compile your fresh scaffolding.


$ npm install && npm run dev
```
you can `build` to make a manifest file

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