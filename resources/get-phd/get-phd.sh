#!/usr/bin/env bash

set -e

curl -Lo docker-compose.yml https://raw.githubusercontent.com/dmstr/phd5-docs/master/resources/play-with-docker/docker-compose.yml
docker-compose run php yii app/setup
docker-compose up -d
docker-compose ps
