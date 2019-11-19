# Install

1) cd laravel
2) mv .env.example .env
3) docker-compose up -d
4) docker-compose exec php composer require jenssegers/mongodb
5) docker-compose exec php php artisan key:generate
6) docker-compose exec php php artisan serve --host="0.0.0.0" --port="8888"
