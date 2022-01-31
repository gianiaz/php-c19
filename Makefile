docker-build-php:
	docker build -t gianiaz/php-c19 -f docker/Dockerfile .

docker-push-php:
	docker push gianiaz/php-c19:latest
