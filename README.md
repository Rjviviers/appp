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

when done remove the .example from the file name

## composer

run composer install to get all packages 

get composer [here](https://getcomposer.org/download/)

```text
composer install
```

## database setup

you will need to run a fresh migrate
make sure you are in the directory with your cmd

```text
php artisan migrate:fresh
```

## mailer set up

you need a mailtrap account you can get one [here](https://mailtrap.io/) (its free)

in inboxes you can go to intergration select laravel and copy that paste that in your env file

```test
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=******
MAIL_PASSWORD=******
MAIL_ENCRYPTION=tls
```

should look somthing like this


### credit

[freecodecamp.com](freecodecamp.com)

codetape on youtube
