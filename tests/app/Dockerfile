FROM php:7-cli-alpine
RUN apk add bash icu-dev git

WORKDIR /usr/src/php/ext
RUN git clone https://github.com/xdebug/xdebug
RUN NPROC=$(grep -c ^processor /proc/cpuinfo 2>/dev/null || 1) && \
    docker-php-ext-install -j${NPROC} intl xdebug pdo_mysql

COPY .docker/composer-setup.sh /tmp/composer-setup.sh
RUN sh /tmp/composer-setup.sh && \
    mv composer.phar /usr/bin/composer && \
    chmod +x /usr/bin/composer && \
    rm  /tmp/composer-setup.sh
WORKDIR /app
