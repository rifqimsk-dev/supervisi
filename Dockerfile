FROM php:8.1-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl

# Configure and install PHP extensions
RUN docker-php-ext-configure gd \
    --with-freetype \
    --with-jpeg

RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy project
COPY . .

# Install dependencies
RUN composer install --no-dev --optimize-autoloader

# Expose port (Railway will override)
EXPOSE 8000

# Run Laravel
CMD php artisan key:generate --force && \
    php artisan migrate --force && \
    php artisan serve --host=0.0.0.0 --port=${PORT}
