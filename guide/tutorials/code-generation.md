Code-generation
===============

### Enter the application container

For debugging and multiple one-off commands, you can enter the CLI container with

    make cli

> :bulb: Code generation only work in Yii's development environment. To write files you also might need to have root permissions while running the CLI application in the container.

Frontend module
---------------

You can create a standard Yii module with

    $ yii gii/module \
        --moduleID=frontend \
        --moduleClass=project\\modules\\frontend\\Module
                
Create additional controller

    $ yii gii/controller \
        --controllerClass=project\\modules\\frontend\\controllers\\ExamplesController \
        --viewPath=@project/modules/frontend/views/examples

To add it to your application adjust configuration in `project/config/common.php`.

    return [
        'modules' => [
            'frontend' => [
                'class' => 'project\modules\frontend\Module',
                'layout' => '//container',
            ]
        ]
    ];

You should now be able to access to module default page via `/frontend` in your browser.
    
> :information_source: Please note that standard Yii modules do not have access control enabled by default.

The generated source-files, like controllers and views can be found in `project/src/modules/frontend`.

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
        --moduleClass=project\\modules\\crud\\Module

To add it to your application adjust your configuration in `project/config/common.php`.

    return [
        'modules' => [
            'crud' => [
                'class' => 'project\modules\crud\Module',
                'layout' => '@backend/views/layouts/main',
            ]
        ]
    ];


> :bulb: When using a non-autoloaded namespace you need to register an alias before running the `gii` command
> 
>         'aliases' => [
>            '@name/package' => '@project/modules/crud'
>        ],

###  Generate breadcrumb entry for module

```php
public function beforeAction($action)
{
    $moduleUrl = '/'.$this->id;
    \Yii::$app->controller->view->params['breadcrumbs'][] = [
        'label' => ucfirst($this->id), 
        'url' => [$moduleUrl]
    ];
    return parent::beforeAction($action);
}
```

### Create migrations

	$ yii migrate/create init --migrationPath=@project/modules/crud/migrations

Add migration to application params in `src/config/common.php`

    'params' => [
        'yii.migrations' => [
            '@project/modules/crud/migrations'
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
      --modelDb=db \
      --modelNamespace=project\\modules\\crud\\models \
      --modelQueryNamespace=project\\modules\\crud\\models\\query \
      --crudAccessFilter=1 \
      --crudControllerNamespace=project\\modules\\crud\\controllers \
      --crudSearchModelNamespace=project\\modules\\crud\\models\\search \
      --crudViewPath=@project/modules/crud/views \
      --crudPathPrefix= \
      --tablePrefix=<PREFIX_> \
      --tables=<COMMA_SEPARATED_LIST_OF_TABLES>

See also [Giiant documentation](https://github.com/schmunk42/yii2-giiant/blob/master/README.md).

Have also a look at [guidelines for good schema design](http://www.yiiframework.com/wiki/227/guidelines-for-good-schema-design/)
even if it was written for Yii 1 it is still valid today. 

Login to the application backend as `admin` and go to the `crud` module.

:bulb: You can define and register the batch command in the Module bootstrapping process.

## Forms

Create a form model.

Enter application console

    $ yii gii/form \
      --modelClass=project\\modules\\frontend\\models\\TranslateForm \
      --viewName=translate \
      --viewPath=@project/modules/frontend/views/default

