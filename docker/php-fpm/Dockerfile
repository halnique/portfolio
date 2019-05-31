FROM php:7.1-fpm-alpine

LABEL maintainer="halnique <shunsuke4dev@gmail.com>"

USER root

RUN apk update && apk upgrade \
 && apk add --no-cache make g++ autoconf

RUN pecl install apcu \
 && docker-php-ext-enable apcu \
 && docker-php-ext-install pdo_mysql

ARG USER=nginx
ARG AGENT_UID=1000
RUN adduser -D -H -s /bin/sh -u ${AGENT_UID} ${USER}

WORKDIR /var/www
