FROM php:8.1.12-apache

WORKDIR /var/www/html

COPY . .

RUN apt update  \
    && apt install libzip-dev zip unzip git -y  \
    && curl -sS https://getcomposer.org/installer -o /tmp/composer-setup.php \
    && php /tmp/composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && composer install --no-interaction \
    && docker-php-ext-install zip \
    && docker-php-ext-install pdo pdo_mysql \
    && docker-php-ext-install mysqli \
    && docker-php-ext-install bcmath \
    && rm -rf /var/lib/apt/lists/* \
    && rm -rf /tmp/* \
    && rm -rf /var/cache/apk/*

RUN chmod o+w storage/ -R
