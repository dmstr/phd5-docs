Code-generation
===============

### Enter the application container

For debugging and multiple one-off commands, you can enter the CLI container with

    docker-compose run --rm -e YII_ENV=dev php bash

> :bulb: Code generation only work in Yii's development environment.

Frontend module
---------------

You can create a standard Yii module with

    $ yii gii/module \
        --moduleID=frontend \
        --moduleClass=app\\modules\\frontend\\Module
                
Create additional controller

    $ yii gii/controller \
        --controllerClass=app\\modules\\frontend\\controllers\\ExamplesController \
        --viewPath=@app/modules/frontend/views/examples

To add it to your application adjust configuration in `src/config/common.php`.

    return [
        'modules' => [
            'frontend' => [
                'class' => 'app\modules\crud\Module'
                'layout' => 'container',
            ]
        ]
    ];
    
You should now be able to access to module default page via `/frontend` in your browser.    

Backend CRUD module
-------------------

*phd* allows you to use you custom designed database schema as the base for CRUD admin interfaces.
To add a new module to your application, we create a `crud` module with phd and Yii's built-in tools

> If you would like to create an extension module in a composer package, please start by 
> [creating an extension](44-extension-development.md) first.
> push it to your repo and install it with `composer require --prefer-source name/package`. 
> Afterwards generate your code directly into `vendor/name/package` and use this repository for development.

### Generate module code

    $ yii gii/giiant-module \
        --moduleID=crud \
        --moduleClass=app\\modules\\crud\\Module

Then, create the module with

    yii gii/giiant-module \
        --moduleID=crud \
        --moduleClass=myapp\\crud\\Module

To add it to your application adjust your configuration in `src/config/common.php`.

    return [
        'modules' => [
            'frontend' => [
                'class' => 'myapp\crud\Module'
                'layout' => 'container',
            ]
        ]
    ];

>         'aliases' => [
>            '@myapp/frontend' => '@myapp/modules/crud'
>        ],



### Create migrations

	$ yii migrate/create init --migrationPath=@app/modules/crud/migrations

Add migration to application params in `src/config/common.php`

    'params' => [
        'yii.migrations' => [
            '@app/modules/crud/migrations'
        ],
    ],

And run the migrations
    
    $ yii migrate

See also [how to create file migrations](database-migrations-from-file.md).



### Generate CRUDs with giiant 

Create the backend CRUDs with gii and Giiant

    yii giiant-batch \
      --interactive=0 \
      --overwrite=1 \
      --tablePrefix=app_ \
      --modelDb=db \
      --modelNamespace=myapp\\frontend\\models \
      --modelQueryNamespace=myapp\\frontend\\models\\query \
      --crudAccessFilter=1 \
      --crudControllerNamespace=myapp\\frontend\\controllers \
      --crudSearchModelNamespace=myapp\\frontend\\models\\search \
      --crudViewPath=@app/modules/frontend/views \
      --crudPathPrefix= \
      --tables=app_view,app_less

See also [Giiant documentation](https://github.com/schmunk42/yii2-giiant/blob/master/README.md).

Have also a look at [guidelines for good schema design](http://www.yiiframework.com/wiki/227/guidelines-for-good-schema-design/)
even if it was written for Yii 1 it is still valid today. 

Login to the application backend as `admin` and go to the `crud` module.

:bulb: You can define and register the batch command in the Module bootstrapping process.
