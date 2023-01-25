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

# Lancement du serveur local
# --------------------------
CMD [ "symfony", "server:start", "--port=8000", "--no-tls" ]

FROM php:7.3-apache
LABEL maintainer="gilas@bigpapoo.com"

COPY files/slim-entrypoint /usr/local/bin/

RUN apt-get update && apt-get install -y vim less git zip unzip \
 && docker-php-ext-install pdo pdo_mysql \
 && php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
 && php composer-setup.php --install-dir=/usr/local/bin  --filename=composer \
 && php -r "unlink('composer-setup.php');" \
 && a2enmod rewrite \
 && a2enmod headers

ENTRYPOINT ["slim-entrypoint"]
CMD ["apache2-foreground"]
