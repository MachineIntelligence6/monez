# About Project

Web based Laravel project.

# Installation

follow steps after clone.

-   run `composer install` //install dependencies
-   create env file from .env.example by copy pasting
-   create database and update in .env file
-   update other values in .env
-   run `php artisan key:generate`
-   run `php artisan migrate` // create tables in DB
-   run `php artisan storage:link`
-   run `php artisan db:seed` // populate neccessary data in DB
-   run `php artisan queue:start` // start queue to send mails which are in queue (this could not work propper in cpanel as of limited access)
-   add a cron job to the root folder of this app to run command `php artisan schedule:run` //this is for channels to make thier status pause if no channel searched in one day.
-   give read and write permission to these folders /storage & /bootstrap/cache (this will vary acording to Operting System)

## Helping Commands

-   `php artisan serve`
-   `php artisan db:seed --class=UserSeeder` // to create fake proeject in DB
-   `php artisan cache:clear`
-   `php artisan optimize`
