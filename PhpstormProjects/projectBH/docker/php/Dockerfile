FROM php:8.4-fpm

# 1. Системные зависимости
RUN apt-get update && apt-get install -y \
    git unzip libpq-dev libzip-dev \
    && apt-get clean

# 2. PHP расширения
RUN docker-php-ext-install \
    pdo pdo_pgsql zip opcache

# 3. Redis
RUN pecl install redis && docker-php-ext-enable redis

# 4. Node.js (для Vite/Mix)
RUN curl -sL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs

# 5. Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# 6. Пользователь (безопасность)
RUN useradd -G www-data,root -u 1000 -d /home/devuser devuser \
    && mkdir -p /home/devuser && chown -R devuser:devuser /home/devuser
USER devuser

# 7. Рабочая папка
WORKDIR /var/www