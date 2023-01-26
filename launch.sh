#!/bin/bash

# Run composer install & update in the same container
docker exec -it symfony-back composer install
docker exec -it symfony-back composer update
docker exec -it symfony-auth composer install
docker exec -it symfony-auth composer update
