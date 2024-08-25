## Project setup

### database setup
- login to mySQL server and create a database named `autobio`, or with any other name
- change .env variables for DB connection as required, follwoing variables needs to be modified
> ```
>DB_CONNECTION=mysql
>DB_HOST=localhost
>DB_PORT=3306
>DB_DATABASE=autobio
>DB_USERNAME=
>DB_PASSWORD=

## RUN migrations
- execute follwoing artisan command to run all migrations
>`php artisan migrate`


## Seed database with dummy data
run below artisan command
>`php artisan app:seed-data`


## Run the development server
>`php artisan serve`


