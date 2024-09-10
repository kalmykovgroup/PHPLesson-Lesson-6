FROM php:8.2-fpm

# ID пользователя должны совпадать(в конт. и на машине)
ARG DOCKER_ID=1000
ARG DOCKER_GUID=1000

# создаем группу внутри контейнера
RUN groupadd -g $DOCKER_GUID docker
# создаем пользователя
RUN useradd -g $DOCKER_GUID -u $DOCKER_ID docker


COPY .docker/app/docker-entrypoint.sh /docker-entrypoint.sh

RUN apt-get update && apt-get install -y libpq-dev

RUN docker-php-ext-configure pdo_pgsql && docker-php-ext-instell pro_pgsql

# переключаемся на пользователя
USER docker

ENTRYPOINT /docker-entrypoint.sh