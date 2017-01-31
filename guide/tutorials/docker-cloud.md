# Docker Cloud

Example `docker-cloud.yml`

    php:
      image: dmstr/phd5-app
      ports:
        - "80:80"
      roles:
        - global
    db:
      image: mysql:5.7
      links:
        - redis
    redis:
      image: redis

[![Deploy to Docker Cloud](https://files.cloud.docker.com/images/deploy-to-dockercloud.svg)](https://cloud.docker.com/stack/deploy/?repo=https://github.com/dmstr/phd5-docs/tree/master)