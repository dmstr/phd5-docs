Container bash
==============


### Inside the PHP container

- `composer` package manager
- `yii` application console
- `codecept` testing
- `linkchecker` qa

```
make bash
```

> If a line in the documentation is prefixed with `$` it means that this command needs to be run inside the container.

    $ composer update

#### Help `yii help`

```
This is Yii version 2.0.10.

The following commands are available:

- app                              @link http://www.diemeisterei.de/
    app/clear-assets               Clear [application]/web/assets folder.
    app/setup                      Initializes application.
    app/show-config                Shows application configuration
    app/show-env                   Shows application environment variables.
    app/version (default)          Displays application version from APP_VERSION constant.

- asset                            Allows you to combine and compress your JavaScript and CSS files.
    asset/compress (default)       Combines and compresses the asset files according to the given configuration.
    asset/template                 Creates template of configuration file for [[actionCompress]].

- audit                            Task runner commands for Audit.
    audit/cleanup                  Cleanup the Audit data
    audit/error-email              Email errors to support email.

- cache                            Allows you to flush cache.
    cache/flush                    Flushes given cache components.
    cache/flush-all                Flushes all caches registered in the system.
    cache/flush-schema             Clears DB schema cache for a given connection component.
    cache/index (default)          Lists the caches that can be flushed.

- db                               MySQL database maintenance command.
    db/create                      Create MySQL database
    db/dump                        Dumps current database tables to runtime folder
    db/index (default)             Displays tables in database
    db/x-dump                      EXPERIMENTAL: Schema and/or Data dumps
    db/x-dump-data                 EXPERIMENTAL: data only dump

- fixture                          Manages fixture data loading and unloading.
    fixture/load (default)         Loads the specified fixture data.
    fixture/unload                 Unloads the specified fixtures.

- gii                              This is the command line version of Gii - a code generator.
    gii/controller                 Controller Generator
    gii/crud                       CRUD Generator
    gii/extension                  Extension Generator
    gii/form                       Form Generator
    gii/giiant-crud                Giiant CRUD
    gii/giiant-extension           Giiant Extension
    gii/giiant-model               Giiant Model
    gii/giiant-module              Giiant Module
    gii/giiant-test                Giiant Test
    gii/index (default)
    gii/model                      Model Generator
    gii/module                     Module Generator

- giiant-batch                     @author Tobias Munk <schmunk@usrbin.de>
    giiant-batch/cruds             Run batch process to generate CRUDs all given tables.
    giiant-batch/index (default)   Run batch process to generate models and CRUDs for all given tables.
    giiant-batch/models            Run batch process to generate models all given tables.

- help                             Provides help information about console commands.
    help/index (default)           Displays available commands or the detailed information

- message                          Extracts messages to be translated from source files.
    message/config                 Creates a configuration file for the "extract" command using command line options specified
    message/config-template        Creates a configuration file template for the "extract" command.
    message/extract (default)      Extracts messages to be translated from source code.

- migrate                          Manages application and extension migrations (dmstr/yii2-migrate-command).
    migrate/create                 Creates a new migration.
    migrate/down                   Downgrades the application by reverting old migrations.
    migrate/history                Displays the migration history.
    migrate/mark                   Modifies the migration history to the specified version.
    migrate/new                    Displays the un-applied new migrations.
    migrate/redo                   Redoes the last few migrations.
    migrate/to                     Upgrades or downgrades till the specified version.
    migrate/up (default)           Upgrades the application by applying new migrations.

- resque                           Class ResqueController
    resque/debug
    resque/enqueue
    resque/inspect
    resque/prune-workers
    resque/status (default)
    resque/work

- serve                            Runs PHP built-in web server
    serve/index (default)          Runs PHP built-in web server

- translate                        Command for scanning and optimizing project translations
    translate/help (default)       Display this help.
    translate/optimize             Removing unused language elements.
    translate/scan                 Detecting new language elements.

- user/confirm                     Confirms a user.
    user/confirm/index (default)   Confirms a user by setting confirmed_at field to current time.

- user/create                      Creates new user account.
    user/create/index (default)    This command creates new user account. If password is not set, this command will generate new 8-char password.

- user/delete                      Deletes a user.
    user/delete/index (default)    Deletes a user.

- user/password                    Updates user's password.
    user/password/index (default)  Updates user's password to given.


To see the help of each command, enter:

  yii help <command-name>
```

#### Examples
    
##### Show environment variables (for bash)

    $ env | sort
    
> Note, there may be additional ENV variables available in an application loaded from `src/app.env`


