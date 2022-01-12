FROM laradock/php-fpm:latest-7.4

ARG user
ARG uid

RUN set -xe; \
    apt-get update -yqq && \
    pecl channel-update pecl.php.net && \
    apt-get install -yqq \
      apt-utils \
      gnupg2 \
      git \
      libzip-dev zip unzip && \
      docker-php-ext-configure zip && \
      docker-php-ext-install zip && \
      php -m | grep -q 'zip'

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN groupadd -g $uid $user
RUN useradd -u $uid -ms /bin/bash -g $user $user

COPY ./quiz /var/www
COPY --chown=$user:$user quiz /var/www
WORKDIR /var/www

USER $user

CMD ["sh", "-c", "cp -n .env.example .env && composer install && php artisan key:generate && php-fpm"]

EXPOSE 9000
