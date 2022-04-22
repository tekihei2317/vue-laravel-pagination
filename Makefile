create-project:
	docker compose run composer create-project --prefer-dist laravel/laravel .
up:
	docker compose up -d app
ps:
	docker compose ps
down:
	docker compose down
app:
	docker compose exec app bash
fresh:
	docker compose exec app php artisan migrate:fresh --seed
tinker:
	docker compose exec app php artisan tinker
composer-install:
	docker compose run composer install
setup:
	cp backend/.env.example backend/.env
	@make composer-install
	docker compose run app php artisan key:generate
	touch backend/database/database.sqlite
	@make fresh
	@make up
	cd frontend/ && yarn install
