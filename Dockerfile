FROM php:8.2-cli

# Instalar dependencias
RUN apt-get update && apt-get install -y \
    git unzip curl libzip-dev zip \
    && docker-php-ext-install zip

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

# Copiar proyecto
COPY . .

# Crear .env si no existe
RUN cp .env.example .env || true

# Instalar dependencias Laravel
RUN composer install

# Crear base de datos SQLite
RUN mkdir -p database && touch database/database.sqlite

# Generar clave
RUN php artisan key:generate

# Ejecutar migraciones
RUN php artisan migrate --force

# Permisos
RUN chmod -R 775 storage bootstrap/cache

# Exponer puerto
EXPOSE 10000

# Iniciar servidor
CMD php artisan serve --host=0.0.0.0 --port=10000