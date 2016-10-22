## Building an application `FROM dmstr/phd5`

The Docker images from *phd* can also be used to build slim customized applications, just by adding modules to the source code.

Visit [`dmstr/planck`](https://github.com/dmstr/planck) for an example.


## Getting started

Fork, clone or download the *planck* repository.

```
git clone https://github.com/dmstr/planck.git
```

Edit the base image if your want to build from another pre-build application template.

Edit defaults and copy `.env-dist` to `.env`.

Initialize application

```
docker-compose run --rm \
    -e APP_MIGRATION_LOOKUP=@app/migrations/demo-data \
    php yii app/setup
```

Set admin password

```
docker-compose run --rm yii user/password admin admin1
```

Start stack

```
docker-compose up -d
```


## Customize


### Application environment variables

Should be set in `Dockerfile` or `src/local.env` (runtime changes) 

    edit src/local.env

Edit `Dockerfile`

Enable the host-volume by uncommenting `services.php.volumes` in `docker-compose.dev.yml`     

    - ./src/local.env:/app/src/local.env


### Create frontend module



### Create database CRUD

Create CRUD module

	$ yii gii/module --moduleID=crud --moduleClass=aye\\crud\\Module



### Install additional packages
    
    docker cp $(docker-compose ps -q php):/app/composer.json .

Edit run `composer require` or edit `composer.json`

    composer update
    
    edit Dockerfile
    
    docker-compose build



## Test

Copy `test` from phd5.

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



## Deploy

```
curl -X POST \
  -F token=${GITLAB_PROJECT_TOKEN} 
  -F "ref=master" 
  -F "variables[TRIGGER_STACK_DIR]=demos/${TRAVIS_REPO_SLUG}" 
  https://{$GITLAB_HOSTNAME}/api/v3/projects/${GITLAB_PROJECT_ID}/trigger/builds
```
