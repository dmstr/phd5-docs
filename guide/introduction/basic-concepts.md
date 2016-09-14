Basic concepts
==============

Layers
------

Docker is the container-engine in which all services and tools are run, this ensures a maximum of portability across
 platforms and environments.

- [View build tools](https://github.com/phundament/app/tree/master/build)

> TODO: Link to Docker Docs

### Services

Services are defined in `docker-compose.yml` they describe the stack components, such as the PHP application, databases,
caches or testing containers.

- [View application service definition](https://github.com/phundament/app/blob/master/docker-compose.yml)

### Images

- dmstr/nginx-php (*currently phundament/nginx-one*)
- dmstr/php-yii2
- dmstr/yii2-app, dmstr/phd5-app

### Stacks

Stacks and their service definitions can have different flavours. You may need slightly different setups in testing, staging
and production environment. phd features as `yaml-converter-command`, which can create stack files from templates.
  
- [View project stacks](https://github.com/phundament/app/tree/master/build/compose)

### Containers

The application along with other services are run in containers, usually you have one container per service, but
you can also scale PHP-FPM with a haproxy or run multiple workers off a CLI container.

- [View application Dockerfile](https://github.com/phundament/app/blob/master/Dockerfile)
- [View phd Docker images](https://hub.docker.com/u/phundament/)
- [View phd Docker images source-code](https://github.com/phundament/docker-images)

### Source-code

The topmost layer of the stack is the application source-code in `/src`. The PHP application is build with
Yii 2.0 Framework.

- [View application ENV variables](https://github.com/phundament/app/tree/master/.env-dist)
- [View application source](https://github.com/phundament/app/tree/master/src)
- [View application tests](https://github.com/phundament/app/tree/master/tests)

> TODO: Link to Guide, API

#### Application framework and composer packages

The building blocks of the application.

 - [View application packages](https://github.com/phundament/app/blob/master/composer.json)



Directories & files
-------------------


Docker & docker-compose

```
docker-compose.yml  docker container setup
Dockerfile          docker image build information
```

Application source

```
.env                environment config
src/                application source-code
yii                 application CLI
runtime/            files generated during runtime
```

Build support

```
Makefile            build and Docker stack control-targets
build/              files for Docker build tasks
```

Testing

```
codeception.yml     test-suite configuration
tests/              various tests for objects that are common among applications
```

### src/

```
assets/             application assets such as JavaScript and CSS
config/             application configuration
controllers/        web-controller classes
commands/           console controller classes
models/             application model classes
modules/            application modules (eg. admin)
migrations/         database migrations
views/              view files for the application
web/                document root with entry-script
```

See also [Yii 2.0 Guide](http://www.yiiframework.com/doc-2.0/guide-index.html)