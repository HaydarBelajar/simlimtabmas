FROM php:7.4-fpm

# Set Timezone
ENV TZ=Asia/Jakarta
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    libzip-dev \
    unzip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd pdo zip

# Install Postgre PDO
RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql

# Install intl
RUN apt-get install -y libicu-dev \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl

# Add php config
RUN touch /usr/local/etc/php/conf.d/uploads.ini \
    && echo "upload_max_filesize = 64M;" >> /usr/local/etc/php/conf.d/uploads.ini \
    && echo "post_max_size = 64M;" >> /usr/local/etc/php/conf.d/uploads.ini \
    && echo "max_execution_time = 180;" >> /usr/local/etc/php/conf.d/uploads.ini \
    && echo "max_input_vars = 100000;" >> /usr/local/etc/php/conf.d/uploads.ini \
    && echo "memory_limit = 256M;" >> /usr/local/etc/php/conf.d/uploads.ini


# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Setting working directory. All the path will be relative to WORKDIR
WORKDIR /usr/src/simlitabmas-ui

# Installing project files
COPY ./ ./
RUN composer install
RUN php artisan cache:clear && php artisan config:clear

# info php
RUN touch /usr/src/simlitabmas-ui/public/info.php \
    && echo "<?php" >> /usr/src/simlitabmas-ui/public/info.php \
    && echo "phpinfo();" >> /usr/src/simlitabmas-ui/public/info.php

CMD php artisan serve --host=0.0.0.0 --port=9000
