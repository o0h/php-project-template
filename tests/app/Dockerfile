FROM php:7-cli-alpine
RUN apk add bash icu-dev git

WORKDIR /usr/src/php/ext
RUN git clone https://github.com/xdebug/xdebug
RUN NPROC=$(grep -c ^processor /proc/cpuinfo 2>/dev/null || 1) && \
    docker-php-ext-install -j${NPROC} intl xdebug pdo_mysql
RUN echo -e "zend_extension = xdebug.so\n" \
        "xdebug.mode=debug\n" \
        "xdebug.client_host = host.docker.internal\n" \
        "xdebug.start_with_requesta = yes\n" \
        "xdebug.idekey = PLEASE_SET_YOUR_APP_NAME\n" \
    > /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

COPY .docker/composer-setup.sh /tmp/composer-setup.sh
RUN sh /tmp/composer-setup.sh && \
    mv composer.phar /usr/bin/composer && \
    chmod +x /usr/bin/composer && \
    rm  /tmp/composer-setup.sh
WORKDIR /app
