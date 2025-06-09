FROM php:7.4-apache

# Instala e habilita a extensão mysqli
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
