# Host-system CLI tools

## `make` application

phd uses `Makefile`s to execute common tasks during development, but you can also use standard *Docker* commands to control your stack.

Basically, `make` **targets** are just shorthands for lengthy Docker commands.

> TODO: Link "Backend", "Frontend"

## CLI

To see all available targets run

    make help

After the initial `.env` configuration, for first initial setup run

    make all

You can also chain single **targets**

    make setup up open bash

Or run `docker-compose` commands against your current stack

	docker-compose ps
	docker-compose logs

   
Or use `Makefile`s for a different folder i.e. for managing an isolated test-stack
   
	cd tests
    make all
    make run-tests

You can find information in the [testing](../4-testing/testing.md) section.

> :bulb: `make` targets are run on the stack as `docker-compose` without additional parameters.

> :bulb: To do a dry-run for a command you can use the `-n` option, eg. `make -n all`

> :warning: removing containers, i.e. with `make clean` removes also data stored only in the container, you can use host-volumes for persisting data during development 

### `Make` vs. Docker commands


You can create a new container bash with

    make bash

or    
    
    docker-compose run --rm php bash

Alternatively you can also execute a bash within a running container
    
    docker-compose exec php bash
    
or

    docker exec -it myapp_php_1 bash


#### Examples

Setup application with demo data and default user password

    docker-compose run --rm \
        -e APP_ADMIN_PASSWORD=mod.Uless11 \
        -e APP_MIGRATION_LOOKUP=@app/migrations/demo-data \
        php yii app/setup

> TODO: link tutorials

