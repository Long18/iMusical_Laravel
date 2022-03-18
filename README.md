## Install Laravel

Install Laravel with Composer.
Install Git.

Open direct folder of Laravel: 
 - Right click and choose "Git Bash Here"
    - Run: composer install 
    - Change file .env.example to .env 
    - Run: php artisan key:generate
    - Run: php artisan serve

Open file .env and change:

    DB_CONNECTION=mysql
    DB_HOST=27.74.219.184
    DB_PORT=3306
    DB_DATABASE=elaravel
    DB_USERNAME=remote
    DB_PASSWORD=remote@123

    to connect to remote database ( MySQL Workbench ) 
