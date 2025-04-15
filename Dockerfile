FROM php:7.4-apache

# Instala extensões PHP que você precisar
RUN docker-php-ext-install pdo pdo_mysql

# Ativa o mod_rewrite do Apache
RUN a2enmod rewrite

# Copia o vhost customizado
COPY app/Core/docker/apache/vhost.conf /etc/apache2/sites-available/000-default.conf

# Define diretório de trabalho
WORKDIR /var/www/html

# Copia os arquivos do projeto para o container
COPY . /var/www/html

# Dá permissão ao Apache
RUN chown -R www-data:www-data /var/www/html
