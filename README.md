# PHPLesson


<!-- генерирует ssh ключ  -->
ssh-keygen -t rsa 
<!--  -->
ls .ssh/
<!--  -->
cat .ssh/id_rsa.pub
mkdir Progects
cd Progects
git clone git@github.com:Hissul/PHPLesson.git


chmod +x docker-entrypoint.sh
ls -la docker-entrypoint.sh


docker compose build
docker compose up


sudo chown alexander:alexander app

mkdir app/public
nano app/public/index.php
cat app/public/index.php


git status
git checkout -b base
it add .docker/app/docker-compose.yaml
git commit . -m "base Base docker compose container. app and webserver"
git config --global user.email "masstadontt@rambler.ru'
git config --global user.name "Hissul"
git commit . -m "base Base docker compose container. app and webserver"
git push origin base


docker ps - список контейнеров
docker exec -it lesson_20240710_app bash - в контейнер

echo "Hello world!" >  newFile.txt - создаем файл в контейнере

env | sort - в контейнере (список переменных)

env | grep DATABASE - в контейнере (поиск)







1  sudo docker run hello-world
    2  [sudo] пароль для alexander: 
    3  newgrp docker
    4  sudo groupadd docker
    5  newgrp docker
    6  sudo docker run hello-world
    7  cd Progects
    8  cd PHPLesson
    9  ls -la
   10  touch app/index.php
   11  sudo chown alexander:alexander app
   12  ls -la
   13  mkdir app/public
   14  nano app/public/index.php
   15  cat app/public/index.pxp
   16  cat app/public/index.php
   17  nano app/public/index.php
   18  git status
   19  git checkout -b base
   20  git status
   21  git add .docker/app/docker-compose.yaml
   22  git status
23  git add .docker/app/docker-compose.yaml
   24  git add .docker/ app/ docker-compose.yaml
   25  git status
   26  git commit . =m "base Base docker compose container. app and webserver"
   27  git commit . -m "base Base docker compose container. app and webserver"
   28  git config --global user.email "masstadontt@rambler.ru'
   29  git config --global user.email "masstadontt@rambler.ru"
   30  git config --global user.name "Hissul"
   31  git commit . -m "base Base docker compose container. app and webserver"
   32  git push origin base
   33  history | les
   34  history | less

