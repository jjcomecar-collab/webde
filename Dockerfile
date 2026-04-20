FROM php:8.2-cli

# Instalar dependencias
RUN apt-get update && apt-get install -y \
    git unzip curl libzip-dev zip \
    && docker-php-ext-install zip

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Crear carpeta app
WORKDIR /app

# Copiar proyecto
COPY . .

# Instalar Laravel
RUN composer install

# Exponer puerto
EXPOSE 10000

# Comando de inicio
CMD php artisan serve --host=0.0.0.0 --port=10000