## Building an application `FROM dmstr/phd5`



### Fork repo

Edit .env-dist

### Customize

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

Create CRUD module



### Extend
    
    docker cp planck_php_1:/app/composer.json .
    docker cp planck_php_1:/app/composer.lock .
    docker cp planck_php_1:/app/src/app.env ./src

    composer update
    
    edit Dockerfile
    
    docker-compose build



### Deploy

#### Setup build

GitHub Services > Travis
https://github.com/schmunk42/planck/settings/installations

DockerHub setup

Enable Travis build
https://travis-ci.org/profile/schmunk42

Set ENV settings

REGISTRY_PASS
REGISTRY_USER
DEPLOY_TOKEN

    REGISTRY_HOST
