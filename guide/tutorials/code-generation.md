Code-generation
===============

Backend frontend/CRUD module
-----------------------

phd allows you to use you custom designed database schema as the base for CRUD admin interfaces.
To add a new module to your application, we create a `frontend` module with phd and Yii's built-in tools

> If you would like to create an extension module in a composer package, please start by 
> [creating an extension](44-extension-development.md) first.
> push it to your repo and install it with `composer require --prefer-source name/package`. 
> Afterwards generate your code directly into `vendor/name/package` and use this repository for development.

### Enter the application container

For debugging and multiple one-off commands, you can enter the CLI container with

    docker-compose run --rm php bash

### Generate module code

First, create the module with

    yii gii/giiant-module \
        --moduleID=frontend \
        --moduleClass=app\\modules\\frontend\\Module

and add it to your application config in `src/config/common.php`

    'modules' => [
        'frontend' => [
            'class'  => 'app\modules\frontend\Module',
            'layout' => '@admin-views/layouts/main',
        ],
    ]

### Create migrations

	$ yii migrate/create init --migrationPath=@app/modules/frontend/migrations

Add migration to application params in `src/config/common.php`

    'params' => [
        'yii.migrations' => [
            [...],
            '@app/modules/frontend/migrations'
        ],
    ],

And run the migrations
    
    $ yii migrate


### Generate CRUDs with giiant 

Create the backend CRUDs with gii and Giiant

    yii giiant-batch \
      --interactive=0 \
      --overwrite=1 \
      --tablePrefix=app_ \
      --modelDb=db \
      --modelNamespace=app\\modules\\frontend\\models \
      --modelQueryNamespace=app\\modules\\frontend\\models\\query \
      --crudAccessFilter=1 \
      --crudControllerNamespace=app\\modules\\frontend\\controllers \
      --crudSearchModelNamespace=app\\modules\\frontend\\models\\search \
      --crudViewPath=@app/modules/frontend/views \
      --crudPathPrefix= \
      --tables=app_view,app_less

See also [Giiant documentation](https://github.com/schmunk42/yii2-giiant/blob/master/README.md).

Have also a look at [guidelines for good schema design](http://www.yiiframework.com/wiki/227/guidelines-for-good-schema-design/)
even if it was written for Yii 1 it is still valid today. 

Login to the application backend and go to the frontend module.

:bulb: You can define and register the batch command in the Module bootstrapping process.

### Create widget for view contents

See [Online help](https://github.com/dmstr/docs-phd5/blob/master/help/frontend-twig.md)


### Create asset bundle for LESS from the database

See [Online help](https://github.com/dmstr/docs-phd5/blob/master/help/frontend-less.md)


### Create additional controllers

    $ yii gii/controller \
        --controllerClass=modules\\frontend\\controllers\\MyController \
        --viewPath=@modules/frontend/views/my

