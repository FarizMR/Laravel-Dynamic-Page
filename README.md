<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Project

This Laravel 8.x project is containing with basic library, role management and auth library. We use [Spatie Laravel-Permission](https://spatie.be/docs/laravel-permission/v5/introduction) for the role management and [JWT Authentification for the authentification](https://jwt-auth.readthedocs.io/en/develop/).

## Installation

1. terminal run "cp .env.example .env"
2. set your .env settings
    DB_CONNECTION = pgsql
    DB_PORT = 5432
3. composer install
4. php artisan jwt:secret
5. php artisan migrate:fresh --seed
6. php artisan serve
