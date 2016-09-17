## `make` application

phd uses `Makefile`s to execute common tasks during development, but you can also use standard *Docker* commands to control your stack.
See *phd* [README](https://github.com/phundament/app/blob/master/README.md) for some examples.

Basically, `make` targets are just shorthands for lengthy Docker commands.

After the initial `.env` configuration, for first initial setup run

    make all

To see all available targets run

    make help

You can also chain single commands

    make setup up open bash
   
Or use `Makefile`s for a different folder i.e. for managing an isolated test-stack
   
	cd tests
    make all
    make run-tests


You can find information in the [testing](../4-testing/testing.md) section.

> :bulb: `make` targets are run on the stack as `docker-compose` without additional parameters.

> :bulb: To do a dry-run for a command you can use the `-n` option, eg. `make -n all`

> :warning: removing containers, i.e. with `make clean` removes also data stored only in the container, you can use host-volumes for persisting data during development 

## Docker commands

You can create a container bash with

    make bash

or    
    
    docker-compose run --rm php bash

or    
    
    docker-compose exec php bash
    
or

    docker exec -it myapp_php_1 bash





