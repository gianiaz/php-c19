FROM php:7.4.27-cli-alpine3.15

LABEL mantainer="gianiaz@gmail.com"

RUN adduser -D -u 1000 gianiaz  \
    && mkdir -p /home/gianiaz \
    && chown -R gianiaz /home/gianiaz \
    && curl -sS https://getcomposer.org/installer | php -- \
     --install-dir=/usr/local/bin \
     --version=2.2.5 \
     --filename=composer

USER root

RUN apk --no-cache add \
    git

RUN docker-php-ext-install bcmath

WORKDIR /home/gianiaz/app


COPY composer.json /home/gianiaz/app/
COPY index.php /home/gianiaz/app/

RUN composer install

RUN chmod 755 /home/gianiaz/app/index.php

RUN ln -s /home/gianiaz/app/index.php /usr/local/bin/verifyC19

USER gianiaz


ENV TERM xterm-256color

