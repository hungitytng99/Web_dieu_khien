<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Introduction to Web Controller
Web_controller is a web site built on the framework of laravel. Web_controller is used to manage turning on and off devices.

## Guide web deployment on computers
** Clone source code from github:
- git clone https://github.com/HuongDoll/Web_dieu_khien.git
** Run composer and npm to install the necessary packages in the project
- composer install
- npm install
** Go to mysql, create a new database named: web_dieu_khien
** Then we issue the following command to copy the env file:
- cp .env.example .env
** Update your env file as follows:
- DB_CONNECTION=mysql
- DB_HOST=localhost
- DB_PORT=3306
- DB_DATABASE=web_dieu_khien
- DB_USERNAME=root
- DB_PASSWORD= <"your password">
** Generate key for the project
- php artisan key:generate
** Create sample tables and data for the database
- php artisan migrate
- php artisan db:seed
** Create serve start:
- php artisan serve
** Log in as admin
- user: Admin
- Password: 11091999