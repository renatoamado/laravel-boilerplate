FROM php:8.1-apache

RUN apt-get update

RUN apt-get install git -y
RUN apt-get install zlib1g-dev -y
RUN apt-get install libzip-dev -y
RUN apt-get install unzip -y
RUN apt-get install -y nano

# install composer
RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/ \
    && ln -s /usr/local/bin/composer.phar /usr/local/bin/composer

RUN apt-get install -y libpq-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql

RUN docker-php-ext-install pdo_mysql mysqli 

RUN docker-php-ext-install zip

RUN apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libtidy-dev \
        libzip-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd exif tidy

RUN a2enmod rewrite

ENV PATH="~/.composer/vendor/bin:./vendor/bin:${PATH}"

WORKDIR "/var/www/html"