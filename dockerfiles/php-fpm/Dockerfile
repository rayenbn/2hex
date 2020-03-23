FROM php:7.2-fpm

WORKDIR /var/www/html

ENV COMPOSER_ALLOW_SUPERUSER 1

# Install dependencies
RUN apt-get update && apt-get install -y \
    libxml2-dev \
    libpng-dev \
	libfreetype6-dev \
	libjpeg62-turbo-dev \
	libjpeg-dev \
	libpq-dev \
	libmemcached-dev \
	libxslt-dev \
	curl \
	zip \
	unzip \
	libzip-dev \
	git \
	locales \
	make \
	wget \
	libtool


# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions

RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ --with-gd --with-png-dir=/usr/include/
RUN docker-php-ext-install mbstring mysqli gd pdo_mysql soap xml zip exif gettext pcntl shmop sockets sysvmsg sysvsem sysvshm wddx xsl

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

#install Node js
RUN curl -sS https://deb.nodesource.com/setup_10.x | bash - \
	&& apt-get install -y build-essential nodejs

USER root

ARG PGID=1000
ARG PUID=1000

RUN groupmod -o -g ${PGID} www-data && \
    usermod -o -u ${PUID} -g www-data www-data

# Expose port 9000 and start php-fpm server
EXPOSE 9000

CMD ["php-fpm"]