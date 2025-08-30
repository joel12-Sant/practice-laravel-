FROM php:8.1-apache

# Instalar dependencias de PHP
RUN apt-get update && apt-get install -y zip unzip git curl npm \
    libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo_mysql

# Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Configurar Apache para apuntar a /var/www/html/public
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/*.conf
RUN a2enmod rewrite

WORKDIR /var/www/html
