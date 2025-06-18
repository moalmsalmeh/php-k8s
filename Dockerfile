FROM php:8.2-apache

RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
RUN docker-php-ext-install pdo_mysql

COPY phpunit.phar /usr/local/bin/phpunit
RUN chmod +x /usr/local/bin/phpunit

COPY src/ /var/www/html/
COPY tests/ /var/www/html/tests/

WORKDIR /var/www/html

EXPOSE 80