## Code conventions

Branches
--------

The phd repository contains the following main branches:

- master (development, unstable)
- 4.0 (alpha, beta, RC, stable releases)
- 3.0 (alpha, beta, RC, stable releases)


- DO not add secrets....

### Source-Code

- all code, variables, tables, databases, constants - everything in the source code **MUST BE** written and named in English

#### PHP

- PSR-2

##### Console

end of command:

    $this->stdout("Done.\n");    


#### LESS

- CSS framework core classes, eg. `container`, `row`, `col-*` **MUST NOT** be modified

#### docker-compose

##### Production

- nginx web services in production **SHOULD** define a `VIRTUAL_HOST` environment variable, which is used by the reverse-proxy


### Documentation

- `README.md` in project root (max. 300 lines)
- `docs/` detailed project documentation
  - `docs/README.md` index
  - `docs/troubleshooting.md` "Esoteric features"
- Source-code docblocks

-----

# Coding conventions

> **Heads up!** This section is under development.

- DO NOT repeat yourself
- USE PSR-2

## Confiuration

- MUST NOT contain secrects

## Docker

- host-volumes MUST NOT overlap
- all containers SHOULD keep running, eg. data-containers with `tail -f /dev/null`

## Database (MySQL)

- camelCase_id
- MUST USE non-project specific default values
- SHOULD have an idempotent setup (see `BaseAppCommand`)

## PHP

### Classes

- MUST USE English names

### Variables

- camelCase
- $this->table_field;

### Yii 

- MUST add `Tester` classes to the repository
- SHOULD use `Yii::info()` or `Yii::trace()`, NOT `Yii::getLogger->(..., ..., ...)`
- SHOULD NOT use `application.language = null` with `codemix/yii2-localeurls`
- SHOULD NOT use static `::className()` calls in application configuration  

### Giiant (Backend CRUD)

- providers MUST NOT be copied into the project, may can extend a new class
- SHOULD contain `Id` columns


## CSS
- SHOULD use hyphens for CSS classes and ID's i.e. `.my-class` and `#my-id`
- https://github.com/CSSLint/csslint/wiki/disallow-ids-in-selectors

## JavaScript

## bash

