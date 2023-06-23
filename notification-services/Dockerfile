FROM php:7.4-cli
RUN apt-get update && apt-get install -y librabbitmq-dev --no-install-recommends
RUN pecl install amqp \
    && cp /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini \
    && rm /usr/local/etc/php/php.ini-development \
    && echo "extension=amqp.so" >> /usr/local/etc/php/php.ini \
    && docker-php-ext-install sockets\
    && docker-php-ext-enable amqp sockets
COPY notification-services /src/www/notification

RUN echo "RABBIT_MQ_HOST=host.docker.internal" >> /src/www/notification/env/.env

ENV X_LISTEN 0.0.0.0:8002

WORKDIR /src/www/notification

ENTRYPOINT php /src/www/notification/app/index.php

