FROM php:8.1-apache

# Instala e configura componentes essenciais
RUN apt-get update && \
    dpkg --configure -a && \
    rm /var/lib/dpkg/lock && \
    a2enmod rewrite &&  \
    a2enconf httpd && \
    service apache2 restart &&\
    echo "America/Sao_Paulo" > /etc/timezone; \
    rm -f /etc/apache2/sites-enabled/000-default.conf

RUN apt-get install -y --no-install-recommends unzip && \
    apt-get install unzip && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin/ --filename=composer;

RUN apt-get install -y --no-install-recommends libpq-dev && \
    docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql && \
    docker-php-ext-install mysqli pdo pdo_mysql pgsql pdo_pgsql;

RUN pecl install xdebug && docker-php-ext-enable xdebug
RUN echo 'xdebug.mode=develop,coverage,debug,profile' >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo 'xdebug.idekey=docker' >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo 'xdebug.start_with_request=yes' >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo 'xdebug.log=/dev/stdout' >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo 'xdebug.log_level=0' >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo 'xdebug.client_port=9003' >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo 'xdebug.client_host=host.docker-xdebug.internal' >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# GD
# Setup GD extension
RUN apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd
RUN docker-php-ext-enable gd

# Copy existing application directory contents
COPY . /var/www/html

# Copy existing application directory permissions
COPY --chown=www-data:www-data . /var/www/html

## Change current user to www
#USER www-data

EXPOSE 80
