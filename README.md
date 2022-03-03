<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## MyTienda-Evertec

Environment:

- PHP 7.4.19
- MySQL 5.7.33

- Project (.env)
    - P2P_LOGIN
    - P2P_TRANKEY
    - P2P_URL
    - APP_URL
    - IP_ADDRESS

Pattern:

* Base Repository
* SOLID
    * Single Responsibility Principle
    * Open/closed principle

Deployment:

* php artisan migrate:refresh --seed
* php artisan test
* php artisan serve

Coverage and php-cs-fixer

* vendor/bin/phpunit --coverage-html reports
* tools/php-cs-fixer/vendor/bin/php-cs-fixer fix src

## License

[MIT license](https://opensource.org/licenses/MIT).
