# instagram Clone made with laravel

## installing guide

## cloning

```text
git clone https://github.com/Rjviviers/instaClone-laravel.git
```

## enviroment setup

check .env.example and change the lines as needed
for mysql

```text
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

for sqllite

```text
DB_CONNECTION=sqlite
```

## composer

run composer install to get all packages

```text
composer install
```

## database setup

you will need to run a fresh migrate
make sure you are in the directory with your cmd

```text
php artisan migrate:fresh
```
