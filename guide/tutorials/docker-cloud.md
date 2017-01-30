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
