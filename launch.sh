#!/bin/bash

# Run composer install & update in the same container
docker exec -it symfony-php composer install
docker exec -it symfony-php composer update
docker exec -it symfony-api composer install
docker exec -it symfony-api composer update

# Import data into database
docker exec -it mysql -u username -p database_name < file.sql
