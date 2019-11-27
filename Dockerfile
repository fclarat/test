FROM php:7.2-fpm-alpine

RUN set -xe \
	&& apk update \
	&& apk add --no-cache wget git libxml2-dev curl-dev openssl-dev $PHPIZE_DEPS\
	&& wget https://getcomposer.org/composer.phar \
	&& mv composer.phar /usr/local/bin/composer \
	&& chmod +x /usr/local/bin/composer \
	&& docker-php-ext-install -j$(nproc) iconv \
	&& /usr/local/bin/composer self-update \
	&& /usr/local/bin/composer global require hirak/prestissimo \
    && docker-php-ext-install pcntl \
    && docker-php-ext-install bcmath \
    && docker-php-ext-install ctype \
    && docker-php-ext-install json \
    && docker-php-ext-install mbstring \
    && docker-php-ext-install pdo \
    && docker-php-ext-install tokenizer \
    && docker-php-ext-install xml \
    && pecl install mongodb \
    && docker-php-ext-enable mongodb

# Cleanup
RUN rm -rf /tmp/* && rm -rf /var/cache/apk/*