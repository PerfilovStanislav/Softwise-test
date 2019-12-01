#!/bin/bash

echo "Run Docker containers!"

NETWORK=test-network

if [ $(docker network ls | grep $NETWORK | wc -l) -lt 1 ]
then
    docker network create --driver=bridge $NETWORK
else
    echo "общая docker сеть уже была создана"
fi

if [ ! -f .env ]; then
  cp .env.example .env
fi

docker-compose up --build
