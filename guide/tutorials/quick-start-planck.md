# Building an application `FROM dmstr/phd5`

Docker images from *phd* apps can also be used as base images, just by adding modules to the source code.

Visit [`dmstr/planck`](https://github.com/dmstr/planck) for an example.


## Getting started

### Installation

- [Download](https://github.com/dmstr/planck/releases) the *planck* repository.
- :bulb: Edit the base image if your want to build from another pre-build application template.

*See also [guide](../development/installation.md)*


### Configuration

Copy `.env-dist` to `.env` and adjust project defaults.
 
Update `Dockerfile` with application default, like `APP_NAME` and `APP_LANGUAGES`.

 *See also [guide](../development/configuration.md)*


### Initialize application

Run inital setup with demo data migrations

```
docker-compose run --rm \
    -e APP_MIGRATION_LOOKUP=@app/migrations/demo-data \
    php yii app/setup
```

Set admin password

```
docker-compose run --rm php yii user/password admin admin1
```

Start stack

```
docker-compose up -d
```

Open the application in your browser

```
open http://$DOCKER_HOST_IP:21080
```

## Customize


### Application environment variables

Persistent defaults should be set in `Dockerfile` 

For runtime changes you caan create a file under `src/local.env`. 

    edit src/local.env

Enable the host-volume by uncommenting `services.php.volumes` in `docker-compose.dev.yml`     

    - ./src/local.env:/app/src/local.env


### Create database migrations

    make bash
    
    $ yii migrate/create first
    
Adjust migration code 

*See also [create migrations from files](database-migrations-from-file.md)*


Apply schema changes by running the migrations.
    
    $ yii migrate


### Create frontend module & database CRUD with `schmunk42/yii2-giiant`

See [Code generation](code-generation.md)



### Install additional packages
    
    docker cp $(docker-compose ps -q php):/app/composer.json .

Edit run `composer require` or edit `composer.json`

    composer update -vv
    
    edit Dockerfile
    
    docker-compose build

> :exclamation: Running composer updates in a Docker container might be pretty slow if you are using host-volumes on OS X. See also: [issue](https://github.com/docker/for-mac/issues/77).

See also [Composer update](composer-update-packages.md)


## Test

    cd tests
    docker-compose up -d

Run tests

    docker-compose run --rm php codecept run

See [testing](../development/testing.md)

### `Makefile` support

Copy `Makefile` and `Makefile.base` from phd5.



## Build

### Setup build

#### Travis

Enable Travis build
https://travis-ci.org/profile/schmunk42

GitHub Services > Travis
https://github.com/schmunk42/planck/settings/installations



## Release

DockerHub setup

Set ENV settings

- `REGISTRY_PASS`
- `REGISTRY_USER`
- `DEPLOY_TOKEN`

#### GitLab setup

- `REGISTRY_HOST`

See also [CI](../deployment/continuous-integration.md)

## Deploy

```
curl -X POST \
  -F token=${GITLAB_PROJECT_TOKEN} 
  -F "ref=master" 
  -F "variables[TRIGGER_STACK_DIR]=demos/${TRAVIS_REPO_SLUG}" 
  https://{$GITLAB_HOSTNAME}/api/v3/projects/${GITLAB_PROJECT_ID}/trigger/builds
```

See also [Environments](../deployment/environments.md)
