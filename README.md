# Beitostølen Live - Festival API

...

## Developer

Developer documentations for the festival-api for Beitostølen Live.

### Database

Setting up a database for development is easiest done using the MySql (or MariaDB) docker image. Then clone the `.env.example`file and just call the file `.env`. In this file, update the database settings.

### Database migration

Creating a new database migration is done with the command `php artisan make:migration nameoftable`. Then edit the migration file that is created and it is time to run the migration.

Running the migration is done with this command `php artisan migrate`.

### Running for development

Running the application for development is easy. Running one command in the root of the application is all that is needed as long as PHP and composer is installed.

```
$ php -S localhost:8000 -t public
```