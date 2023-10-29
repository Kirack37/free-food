# Installation

## Clone the repository

## Clone the .env.example into your .env with the name of the DB you need

## Run: docker run --rm --interactive --tty   --volume $PWD:/app   --volume ${COMPOSER_HOME:-$HOME/.composer}:/tmp   composer install

## Run sail artisan migrate

## Run sail artisan db:seed

## TODO: In the near future, we should make the API petition with a job in Laravel in order to run in background. For that, we also need to configure the supervisor in the server and we should install Horizon package to control all the jobs with the dashboard

## TODO: We could also create a table for the API calls of the market in order to save the information

## TODO: User actions and permissions in order to restrict the order dish button

## TODO: Methods to create new recipes and ingredients
