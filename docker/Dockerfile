FROM php:8.2-apache

# Enable mod_rewrite
RUN a2enmod rewrite

# Install necessary build tools
RUN apt-get update && apt-get install -y \
    gcc \
    make \
    autoconf \
    && rm -rf /var/lib/apt/lists/*

# Install required extensions and dependencies
RUN apt-get update && apt-get install -y \
    libbz2-dev \
    libcurl4-openssl-dev \
    libxml2-dev \
    mariadb-client \
    libssl-dev \
    libldap-dev \
    libpcre3-dev \
    libmariadb-dev \
    libonig-dev \
    libpng-dev \
    libjpeg-dev \
    libzip-dev \
    zip \
    unzip \
    libicu-dev \
    libldap2-dev \
    libgd-dev \
    libpq-dev
    
# Remove default PHP extensions
RUN docker-php-ext-install -j$(nproc) \
    mysqli \
	pdo_mysql \
    ctype \
    soap \
    session \
    dom 

# Install additional PHP extensions
RUN docker-php-ext-install -j$(nproc) \
    bcmath \
    zip \
    intl \
    gd \
    bz2 \
    mbstring \
    pgsql \
    opcache

# Copy virtual host configuration
COPY ./docker/php/vhost.conf /etc/apache2/sites-available/000-default.conf

# Install required extensions and dependencies
RUN apt-get update && apt-get install -y

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN pear config-set php_ini /usr/local/etc/php/php.ini

WORKDIR /var/www/html

COPY ./ /var/www/html

# Expose ports
EXPOSE 80
EXPOSE 443

# Start Apache in the foreground
CMD ["apache2ctl", "-D", "FOREGROUND"]