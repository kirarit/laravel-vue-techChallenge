## Application Setup Guide

Kindly follow the procedure below to set up and run the application.

- Clone the repository
- Set up and configure your database
- Install Composer Dependencies -> `composer install`
- Run your migrations and seed data -> `php artisan migrate --seed`
- Set up Passport -> `php artisan passport:install`
- Install NPM Dependencies -> `npm install`
- Build your assets -> `npm run dev`

## Testing the Application

Once your application is up and running, you can login to the dashboard by using the credentials below, to test its workings;

- *Login* `http://127.0.0.1:8000/login`
- *Username* -> `nairobi@depot.com`
- *Password* -> `password`

- *Login* `http://127.0.0.1:8000/login`
- *Username* -> `mombasa@depot.com`
- *Password* -> `password`

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
