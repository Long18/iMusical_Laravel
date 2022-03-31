## Install Laravel

Install Laravel with Composer.
Install Git.

Open direct folder of Laravel: 
 - Right click and choose "Git Bash Here"
    - Run: **composer install**
    - Change file .env.example to .env 
    - Run: **php artisan key:generate**

Open file .env and change:

    DB_CONNECTION=mysql
    DB_HOST=27.74.219.184
    DB_PORT=3306
    DB_DATABASE=imusical
    DB_USERNAME=remote
    DB_PASSWORD=remote@123

to connect to remote database ( MySQL Workbench ) 


## Using Laravel Project

Change project name from "iMusical_Laravel" to "iMusical"
