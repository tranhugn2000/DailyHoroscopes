##### Dockerfile ##### 
FROM php:8.1-fpm AS build

WORKDIR /var/www/DailyHoroscopes
ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN chmod +x /usr/local/bin/install-php-extensions && sync && \
    install-php-extensions mbstring pdo_mysql zip exif pcntl gd memcached pdo_pgsql

RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    unzip \
    git \
    curl \
    lua-zlib-dev \
    libmemcached-dev \
    nginx \
    nano

RUN apt-get install -y supervisor

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN groupadd -g 1000 www && useradd -u 1000 -ms /bin/bash -g www www

WORKDIR /var/www

COPY --chown=www:www-data . /var/www

RUN mkdir -p /var/www/DailyHoroscopes/storage /var/www/DailyHoroscopes/bootstrap/cache && \
    chmod -R ug+w /var/www/DailyHoroscopes/storage /var/www/DailyHoroscopes/bootstrap/cache


# RUN cp /var/www/DailyHoroscopes/docker/supervisord.conf /etc/supervisord.conf
# RUN cp /var/www/DailyHoroscopes/docker/php.ini /usr/local/etc/php/conf.d/app.ini
# RUN cp /var/www/DailyHoroscopes/docker/nginx.conf /etc/nginx/sites-enabled/default

RUN mkdir -p /var/log/php && touch /var/log/php/errors.log && chmod 777 /var/log/php/errors.log


# RUN cp docker/.env.example .env

RUN composer install 

# RUN chmod +x /var/www/docker/run.sh


EXPOSE 80
CMD ["php-fpm"]

# ENTRYPOINT ["/var/www/docker/run.sh"]
# CMD ["/usr/sbin/nginx", "-g", "daemon off;"]