docker-build-php:
	docker build -t gianiaz/php-c19 -f docker/Dockerfile .

docker-build-php-arm:
	docker build -t gianiaz/php-c19-arm -f docker/Dockerfile .

docker-push-php:
	docker push gianiaz/php-c19:latest

docker-push-php-arm:
	docker build -t gianiaz/php-c19-arm -f docker/Dockerfile .
