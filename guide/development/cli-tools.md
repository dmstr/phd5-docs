CLI tools
=========

### On your host-system

- `git`
- `docker`
- `docker-compose`
- `make` (optional)

> :information_source: Several other Linux command line tools are available.

## `make` application

phd uses `Makefile`s to execute common tasks during development, but you can also use standard *Docker* commands to control your stack.
See *phd* [README](https://github.com/phundament/app/blob/master/README.md) for some examples.

Basically, `make` targets are just shorthands for lengthy Docker commands.

For the first initial setup run

    make all

To see all available targets run

    make help

You can also chain single commands

    make setup up open bash
   
Or use a configuration target, in example for managing an isolated test-stack
   
    make TEST up setup bash

> All `make` commands without a *configuration target*, like `TEST` or `STAGING` are run on the default stack 
> without additional `docker-compose` parameters. 

You can find information in the [testing](../4-testing/testing.md) section.

> :bulb: To do a dry-run for a command you can use the `-n` option, eg. `make -n all`


You can create a container bash with

    make bash

or    
    
    docker-compose run php bash

or

    docker exec -it app_php_1 bash




> TODO make clean - be aware of data-loss



### Inside the PHP container

- composer
- yii
- codecept
- linkchecker

> If a line in the documentation is prefixed with `$` it means that this command needs to be run inside the container.

    $ composer update

#### Examples
    
##### Show environment variables (for bash)

    $ env | sort
    
> Note, there may be additional ENV variables available from `src/app.env`