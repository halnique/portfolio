FROM php:7.1

LABEL maintainer="halnique <shunsuke4dev@gmail.com>"

USER root

RUN apt full-upgrade

RUN pecl install xdebug \
 && docker-php-ext-enable xdebug \
 && docker-php-ext-install pdo_mysql

RUN curl -sL https://deb.nodesource.com/setup_10.x | bash - \
 && curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add - \
 && echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list \
 && apt-get update \
 && apt-get install -y yarn

RUN curl --silent --fail --location --retry 3 --output ./installer.php --url https://getcomposer.org/installer \
 && php installer.php --no-ansi --install-dir=/usr/bin --filename=composer \
 && rm -f installer.php

RUN apt-get install -y zip unzip git

WORKDIR /var/www

CMD ["/bin/bash"]
