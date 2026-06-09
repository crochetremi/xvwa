# On part de l'image officielle PHP 7.4 avec Apache
FROM php:7.4-apache

# On installe et on active les extensions mysqli et pdo_mysql
RUN docker-php-ext-install mysqli pdo_mysql