## Building an application `FROM dmstr/phd5`

The Docker images from *phd* can also be used to build slim customized applications, just by adding modules to the source code.

Visit [`dmstr/planck`](https://github.com/dmstr/planck) for an example.


## Getting started

Fork, clone or download the *planck* repository.

```
git clone https://github.com/dmstr/planck.git
```

Edit defaults and copy `.env-dist` to `.env`.

Initialize application

```
docker-compose run --rm \
    -e APP_ADMIN_PASSWORD=admin1 \
    -e APP_MIGRATION_LOOKUP=@app/migrations/demo-data \
    php yii app/setup
```

Start stack

```
docker-compose up -d
```


## Customize

### Override ENV variables

    docker cp planck_php_1:/app/src/app.env ./src

### Create frontend module

Adjust config

    return [
        'aliases' => [
            '@aye/frontend' => '@app/modules/frontend'
        ],
        'modules' => [
            'frontend' => [
                'class' => 'aye\frontend\Module'
            ]
        ]
    ];

Create bash    
    
    docker-compose run --rm -e YII_ENV=dev php bash

Create frontend module    
    
    $ yii gii/module --moduleID=frontend --moduleClass=aye\\frontend\\Module

Create additional controller

    $ yii gii/controller \
        --controllerClass=aye\\frontend\\controllers\\ExamplesController \
        --viewPath=@aye/frontend/views/examples

### Create database CRUD

Create CRUD module

	$ yii gii/module --moduleID=crud --moduleClass=aye\\crud\\Module



### Install additional packages
    
    docker cp planck_php_1:/app/composer.json .
    docker cp planck_php_1:/app/composer.lock .

    composer update
    
    edit Dockerfile
    
    docker-compose build

## Test

Copy `test` from phd5.

## Deploy

#### Setup build

Enable Travis build
https://travis-ci.org/profile/schmunk42

GitHub Services > Travis
https://github.com/schmunk42/planck/settings/installations

DockerHub setup

Set ENV settings

- `REGISTRY_PASS`
- `REGISTRY_USER`
- `DEPLOY_TOKEN`

GitLab setup

```
curl -X POST \
  -F token=${GITLAB_PROJECT_TOKEN} 
  -F "ref=master" 
  -F "variables[TRIGGER_STACK_DIR]=demos/${TRAVIS_REPO_SLUG}" 
  https://{$GITLAB_HOSTNAME}/api/v3/projects/${GITLAB_PROJECT_ID}/trigger/builds
```