#!/bin/bash

echo Uploading Application container 
docker-compose up --build -d

echo Make migrations
docker exec -it php /app/bin/cake migrations migrate

echo Information of new containers
docker ps -a 