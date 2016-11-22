Configuration
=============

## Introduction

phd uses an environment variables based configuration, see also [Dev/prod parity](http://12factor.net/dev-prod-parity) for more information about this topic.

There are two level of environment configurations. 

**Variables for controlling the application stacks *(outside on your host)* with `docker-compose`, are defined in `.env` files.**

**Environment settings used within the application services *(inside a container)* are defined in `*.yml` files and `src/app.env`.**

## Basic configuration

:exclamation: Before starting the application the first time, update your `.env-dist`, `tests/.env-dist` and `src/app.env` files with sane defaults for the new project.

### Development stack

	COMPOSE_PROJECT_NAME=myapp
	STACK_PHP_IMAGE=local/namespace/myapp_php
	GITHUB_API_TOKEN={GITHUB_API_TOKEN}

### Testing stack

	COMPOSE_PROJECT_NAME=test-myapp
	STACK_PHP_IMAGE=local/namespace/myapp_php

> Windows users, use a semicolon as path separator `COMPOSE_FILE=./docker-compose.yml;./docker-compose.dev.yml`

### Application environment

Initial configuration adjustments should be made for the following values

	APP_NAME=myapp
	APP_TITLE="MyApp"
	APP_LANGUAGES=en,fr,zh

> `app.env-dist` should be adjusted and committed to reflect basic application settings, but we strongly recommend **not to add secrets** like passwords or tokens to the repository. 
> Note: The `app.env-dist` file is intentionally copied as `app.env` onto the image. If you want to make changes during runtime, you also need to create a local file and mount this into the container.

> To be able to use translatemanager every defined/used language must be present in the app_language table. 
> You can insert new languages in backend:
> http://<YOUR_DOMAIN>/translatemanager/language/create

## Advanced configuration

### Environment variables

Further important settings

 - `YII_ENV` - current application environment, eg. `dev`, `test`, `prod`
 - `YII_DEBUG` - application debug settings 
 - `APP_CONFIG_FILE` - alias for  additional configuration file
 - `APP_MIGRATION_LOOKUP` - alias for additional migration paths eg. `@app/migrations/demo-data`

For all available environment settings, see `src/app.env`.

### Development & debugging

During **local development** it is recommended to enable debug settings in `src/app.env`.

    

> :bangbang: Make sure you **do not** have these settings enabled in production deployments.

### PHP source-code

You find the config files for an application in `src/config`, those can also be changed at runtime during development:

 - `config/main.php` - main application configuration entrypoint
 - `config/common.php` - configuration for web and console applcations
 - 

> :exclamation: An important difference between application and environment configuration is that
> ENV variables are immutable by default, but values in PHP arrays can be overwritten.


## Hierarchy & scopes

The following list displays configuration locations from highest to lowest priority and their corresponding scope; files are located in the application root folder `/` or in the `tests/` direcory

| Defined in | .yml | bash | app | runtime | restart | rebuild | variable replacement |
|------------|------|------|-----|---|---|---|---|
| `.env`     | :ok: | :x: | :x: | :x: | :ok: | :x: | :x: |
| `docker-compose.override.yml` | :ok: | :ok: | :ok: | :x: | :ok: | :x: | :ok:
| `docker-compose.yml` | :ok: | :ok: | :ok: | :x:| :ok: | :x: | :ok:
| `Dockerfile` | :x: | :ok: | :ok: | :x:| :ok: | :ok: | :x: 
| `src/app.env`  | :x: | :x: | :ok: | :ok: | :x: | :x: | :ok:
| `src/config/*`  | :x: | :x: | :ok: | :ok: | :x: | :x: | :ok:

> :exclamation: Values in `.env` must be explicitly passed to a service configuration in a `.yml`` file.

ENV variable are immutable by convention, so if a value is set in a `Dockerfile`, you can not
 overwrite it in your `app.env` file, but in `docker-compose.yml`.

Only values in `app.env` can be changed while the containers are running. If you change environment variables in 
`docker-compose.yml` you need to restart your containers.  

