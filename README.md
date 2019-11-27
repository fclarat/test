# Install

1) mv .env.example .env
2) docker-compose up -d
3) docker-compose exec php composer install
4) docker-compose exec php php artisan key:generate
5) docker-compose exec php php artisan serve --host="0.0.0.0" --port="8888"
