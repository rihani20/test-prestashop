# Utiliser l'image de base PHP avec Apache
FROM php:7.1-apache

# Activer les extensions PHP nécessaires
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Configurer le document root
ENV APACHE_DOCUMENT_ROOT /var/www/html

# Activer le mod_rewrite d'Apache
RUN a2enmod rewrite

# Copier le code de votre projet PrestaShop
COPY . /var/www/html

# Installer les dépendances de PrestaShop
RUN composer install

# Exposer le port 80
EXPOSE 80
