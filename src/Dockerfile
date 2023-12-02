FROM php:8.1
WORKDIR /usr/src/app
COPY . .
EXPOSE 81
RUN apt-get update && \
    apt-get install -y libpq-dev && \
    docker-php-ext-install pgsql pdo_pgsql

ENTRYPOINT [ "php", "-S", "0.0.0.0:81" ]