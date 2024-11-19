##### Dockerfile ##### 
FROM php:8.1-fpm AS build

WORKDIR /var/www
ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN chmod +x /usr/local/bin/install-php-extensions && sync && \
    install-php-extensions mbstring zip exif pcntl gd pdo_pgsql

RUN apt-get update && apt-get install -y\
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    jpegoptim optipng pngquant gifsicle \
    locales \
    zip \
    unzip \
    git \
    curl \
    nginx \
    supervisor \
    nano
    
# Install Node.js and npm
RUN curl -fsSL https://deb.nodesource.com/setup_16.x | bash - && \
    apt-get install -y nodejs

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Clean up APT when done
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Create a group and user to run the processes
RUN groupadd -g 1000 www && useradd -u 1000 -ms /bin/bash -g www www

# Copy the application code into the container
COPY . .

# Create necessary directories and set permissions
RUN mkdir -p /var/www/storage /var/www/bootstrap/cache && \
    chmod -R ug+w /var/www/storage /var/www/bootstrap/cache

# RUN cp /var/www/DailyHoroscopes/docker/supervisord.conf /etc/supervisord.conf
# RUN cp /var/www/DailyHoroscopes/docker/php.ini /usr/local/etc/php/conf.d/app.ini
# RUN cp /var/www/DailyHoroscopes/docker/nginx.conf /etc/nginx/sites-enabled/default

RUN mkdir -p /var/log/php && touch /var/log/php/errors.log && chmod 777 /var/log/php/errors.log

# Install Composer dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Generate application key
RUN php artisan key:generate

# Install Node.js dependencies and build assets
RUN npm install
RUN npm run build

# Expose port 9000 for PHP-FPM
EXPOSE 9000
CMD ["php-fpm"]
