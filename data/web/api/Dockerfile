FROM php:8.1-apache

RUN apt-get update

# Git & Zip
# ---------
RUN apt-get install -y git unzip zip

# symfony
# ----
RUN curl -1sLf 'https://dl.cloudsmith.io/public/symfony/stable/setup.deb.sh' | bash
RUN apt install symfony-cli

# Composer
# --------
RUN curl -sS https://getcomposer.org/installer | php \
	&& mv composer.phar /usr/local/bin/ \
	&& ln -s /usr/local/bin/composer.phar /usr/local/bin/composer

# Extensions PHP
# --------------
RUN docker-php-ext-install pdo pdo_mysql

WORKDIR /app
COPY . /app

RUN composer install

RUN composer update

# Lancement du serveur local
# --------------------------
CMD [ "symfony", "server:start", "--port=8000", "--no-tls" ]
