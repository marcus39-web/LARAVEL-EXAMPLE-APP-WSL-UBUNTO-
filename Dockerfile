FROM php:8.4-apache

RUN docker-php-ext-install pdo pdo_mysql
COPY apache-vhost.conf /etc/apache2/sites-available/000-default.conf
COPY apache-custom.conf /etc/apache2/conf-enabled/

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

CMD ["apache2-foreground"]
