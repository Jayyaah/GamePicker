FROM arm64v8/php:8.1-apache

# Installe PDO MySQL
RUN docker-php-ext-install pdo pdo_mysql
