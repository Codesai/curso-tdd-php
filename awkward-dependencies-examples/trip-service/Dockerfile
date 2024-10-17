FROM composer:2.8
RUN apk add --no-cache $PHPIZE_DEPS \
    && apk add --update linux-headers \
    && pecl install xdebug-3.3.2 \
    && docker-php-ext-enable xdebug \
    && docker-php-ext-install pdo_mysql
ENV XDEBUG_MODE=coverage
WORKDIR /app