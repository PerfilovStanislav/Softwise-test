FROM php:7.2-fpm

COPY . /var/www

WORKDIR /var/www

RUN apt-get update && apt-get install --assume-yes zlib1g-dev

RUN pecl install -o -f redis-5.0.7 \
    && rm -rf /tmp/pear \
    && docker-php-ext-enable redis

RUN docker-php-ext-install pdo pdo_mysql zip bcmath

RUN apt-get --assume-yes install git
RUN apt-get install unzip

RUN curl -sL https://getcomposer.org/installer | php -- --install-dir /usr/bin --filename composer

CMD php-fpm
