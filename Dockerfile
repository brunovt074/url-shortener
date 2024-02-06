FROM php:8.3.2-apache

# Instala dependencias y extensiones necesarias para Laravel
RUN apt-get update && \
    apt-get install -y libzip-dev zip && \
    docker-php-ext-install pdo_mysql zip

# Copia los archivos de tu aplicación al contenedor
COPY . /var/www/html

# Instala Composer y las dependencias de Laravel
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN cd /var/www/html && \
    composer install --optimize-autoloader --no-dev

# Configura permisos y otros ajustes si es necesario

# Expón el puerto necesario
EXPOSE 8000

# Configura el entorno de producción
ENV APP_ENV=production
ENV APP_DEBUG=false

# Configura Apache
COPY docker/vhost.conf /etc/apache2/sites-available/000-default.conf
RUN a2enmod rewrite

CMD ["apache2-foreground"]