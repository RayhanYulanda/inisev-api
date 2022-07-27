Postman : https://www.getpostman.com/collections/efd33e82ff35d8994d6a

## Prerequisites
- [php](https://www.php.net/downloads.php)
- [laravel](http://laravel.com/)
- [composer](https://getcomposer.org/download/)

## Installation
- Database for the project `Example : example_db`
- Clone [repo](https://github.com/RayhanYulanda/inisev-api).
- `cd name-folder`.
- Run the command.
```bash
composer install
```
- Copy file `.env.example` and paste it to `.env`
- Adjust the information in `.env` file
```env
APP_NAME="Laravel"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=https://example.com
```
- Generate app key
```bash
php artisan key:generate
```
- Make the table and fill it with seed
```bash
php artisan migrate:fresh --seed
```
