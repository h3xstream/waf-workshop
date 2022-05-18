FROM php:7.4-apache

# PHP extensions
RUN docker-php-ext-install pdo pdo_mysql
