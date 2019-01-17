FROM php:7.0-apache

RUN apt-get update \
  && apt-get install -y --no-install-recommends libpq-dev \
  && docker-php-ext-install mysqli pdo_pgsql pdo_mysql

Copy ../web/index.php /tmp/

RUN cd /tmp   
  && php index.php

EXPOSE 80
