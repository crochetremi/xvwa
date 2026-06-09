# État de départ : image standard, application servie en root par Apache.
# Pistes de durcissement (Faille 4) : utilisateur non-root, image minimale.
FROM php:8.2-apache
RUN docker-php-ext-install mysqli > /dev/null
# (!) pas de USER : le conteneur tourne en root
