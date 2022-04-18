## Landing

* Run `Activity` service first (https://github.com/Samataro/volta_metrics)
* Copy `.env.example` to `.env`
* Copy `.docker/.env.example` to `.docker/.env`
* Run `./start.sh`
* Run `cd .docker; docker-compose exec --user=laradock workspace composer install`
* Open http://localhost
