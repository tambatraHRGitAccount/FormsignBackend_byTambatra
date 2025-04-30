andson_run:
	sudo update-alternatives --set php /usr/bin/php8.3
	docker compose up -d
	symfony server:start 

fixtures:
	symfony console doctrine:fixtures:load --no-interaction