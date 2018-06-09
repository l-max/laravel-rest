#Todo REST API

## About

Rest api includes:
- work with todo entity
- authorization, registration
- Cross-Origin Resource Sharing [CORS](https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS)

## Requirements

- PHP >= 7.1.3
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- Ctype PHP Extension
- JSON PHP Extension
- MYSQL database


## Getting started

- Clone this repo and install the dependencies with [composer](https://getcomposer.org/) by running: `composer update`.
- create `todo` database.
- Rename `.env.example` to `.env` and fill mysql configuration.
- go to project root and run `php artisan migrate` to migrate database
- run `php artisan passport:install`
- run `php artisan serve` for running on the `127.0.0.1:8000`
