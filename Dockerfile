FROM php:8.3-apache

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

CMD ["apache2-foreground"]
