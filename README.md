# Install and Run

pre-requirements: docker & docker-compose installed (https://docs.docker.com/install/ & https://docs.docker.com/compose/install/)

1) mv .env.example .env
2) Change .env values

DB_CONNECTION=mongodb\
DB_HOST=mongodb\
DB_PORT=27017\
DB_DATABASE=test\
DB_USERNAME=root\
DB_PASSWORD=root

3) docker-compose up -d
4) docker-compose exec php composer install
5) docker-compose exec php php artisan key:generate
6) docker-compose exec php php artisan serve --host="0.0.0.0" --port="8888"


# Use

1) go to http://localhost:8888/ 
2) Click in the menu add item, both field are requiered. 
3) Repeat step 2 several times.
4) Go to list in the menu. 
5) You can drag and drop items or delete its.


# Execute Test

1) docker-compose exec php php ./vendor/bin/phpunit



