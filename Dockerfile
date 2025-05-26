# Utilisation de l'image officielle PHP avec Apache
FROM php:apache

# Mise à jour des paquets et installation des extensions nécessaires
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl \
    && docker-php-ext-install pdo pdo_mysql mysqli gd mbstring xml

# Activation des modules Apache (si nécessaire)
RUN a2enmod rewrite

# Copie du projet (facultatif)
WORKDIR /var/www/html
COPY . /var/www/html

# Exposition du port 80 (serveur Apache)
EXPOSE 80

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer