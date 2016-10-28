Code-generation
===============

Frontend module
---------------

You can create a standard Yii module with

    yii gii/giiant \
        --moduleID=frontend \
        --moduleClass=myapp\\frontend\\Module
                
Create additional controller

    $ yii gii/controller \
        --controllerClass=myapp\\frontend\\controllers\\ExamplesController \
        --viewPath=@myapp/frontend/views/examples
   

Backend CRUD module
-------------------

*phd* allows you to use you custom designed database schema as the base for CRUD admin interfaces.
To add a new module to your application, we create a `frontend` module with phd and Yii's built-in tools

> If you would like to create an extension module in a composer package, please start by 
> [creating an extension](44-extension-development.md) first.
> push it to your repo and install it with `composer require --prefer-source name/package`. 
> Afterwards generate your code directly into `vendor/name/package` and use this repository for development.


### Enter the application container

For debugging and multiple one-off commands, you can enter the CLI container with

    docker-compose run --rm -e YII_ENV=dev php bash


### Generate module code

We will create a module in `src/modules/frontend` which is namespaced as `myapp\frontend`.

To add it to your application adjust configuration in `src/config/common.php`.

    return [
        'aliases' => [
            '@myapp/frontend' => '@myapp/modules/crud'
        ],
        'modules' => [
            'frontend' => [
                'class' => 'myapp\crud\Module'
                'layout' => 'container',
            ]
        ]
    ];

Then, create the module with

    yii gii/giiant-module \
        --moduleID=crud \
        --moduleClass=myapp\\crud\\Module

> :bulb: You can create a default Yii 2.0 module by using the standard Gii generator    
>    
>     $ yii gii/module --moduleID=crud --moduleClass=myapp\\crud\\Module



### Create migrations

	$ yii migrate/create init --migrationPath=@myapp/crud/migrations

Add migration to application params in `src/config/common.php`

    'params' => [
        'yii.migrations' => [
            [...],
            '@myapp/frontend/migrations'
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

Login to the application backend and go to the frontend module.

:bulb: You can define and register the batch command in the Module bootstrapping process.
