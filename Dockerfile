FROM php:7.4-fpm

# Copy composer 
COPY composer.lock composer.json /var/www/

# Work directory
WORKDIR /var/www

#Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    build-essential \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    jpegoptim optipng pngquant gifsicle \
    locales \
    vim \
    zip \
    unzip

#Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

#Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd 
RUN docker-php-ext-configure gd --with-freetype --with-jpeg

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY . /var/www

RUN chown -R www-data:www-data \
            /var/www/storage \
            /var/www/bootstrap/cache

EXPOSE 9000
CMD [ "php-fpm" ]