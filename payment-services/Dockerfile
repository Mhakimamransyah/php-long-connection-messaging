FROM php:7.4-cli
RUN apt-get update && apt-get install -y librabbitmq-dev --no-install-recommends
RUN pecl install amqp \
    && cp /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini \
    && rm /usr/local/etc/php/php.ini-development \
    && echo "extension=amqp.so" >> /usr/local/etc/php/php.ini \
    && docker-php-ext-install sockets\
    && docker-php-ext-enable amqp sockets
COPY payment-services /src/www/payment

RUN echo "RABBIT_MQ_HOST=host.docker.internal" >> /src/www/payment/env/.env

ENV X_LISTEN 0.0.0.0:8001

WORKDIR /src/www/payment

ENTRYPOINT php /src/www/payment/app/index.php

