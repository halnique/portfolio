ARG PHP_VERSION=latest

FROM php:${PHP_VERSION}

LABEL maintainer="halnique <shunsuke4dev@gmail.com>"

USER root

COPY --from=composer /usr/bin/composer /usr/local/bin/composer

RUN apt full-upgrade \
 && curl -sL https://deb.nodesource.com/setup_10.x | bash - \
 && curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add - \
 && echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list \
 && apt-get update \
 && apt-get install -y yarn zip unzip git \
 && pecl install xdebug \
 && docker-php-ext-enable xdebug \
 && docker-php-ext-install pdo_mysql

WORKDIR /var/www

CMD ["/bin/bash"]
