# Install and Run

pre-requirements: docker & docker-compose installed (https://docs.docker.com/install/ & https://docs.docker.com/compose/install/)


1) cd test
2) mv .env.example .env
3) Change .env values:
```
DB_CONNECTION=mongodb
DB_HOST=mongodb
DB_PORT=27017
DB_DATABASE=test
DB_USERNAME=root
DB_PASSWORD=root
```
4) docker-compose up -d
5) docker-compose exec php composer install
6) docker-compose exec php php artisan key:generate
7) docker-compose exec php php artisan serve --host="0.0.0.0" --port="8888"


# Use

1) go to http://localhost:8888/ 
2) Click in the menu "add item", both fields are requiered. 
3) Repeat step 2 several times.
4) Go to "list" in the menu. 
5) You can drag and drop or delete the items.


# Execute Test

1) docker-compose exec php php ./vendor/bin/phpunit



