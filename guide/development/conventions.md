# Code conventions

## Source-Code

### Git branches

The phd repository contains the following main branches:

- master (development, unstable)
- x.y (alpha, beta, RC, stable releases)

### PHP

- PSR-2
- all code, variables, tables, databases, constants - everything in the source code **MUST BE** written and named in English
- resources **SHOULD NOT** be loaded from a server or CDN during development & testing 
- migrations **MUST NOT** be changed after they are comitted and pushed
- migrations **MUST NOT** use model classes
- committed code **MUST NOT** contain secrets
- classes **MUST** use English names
- variables in code **SHOULD** use `camelCase`
- database properties **SHOULD** use `$this->table_field`

### Yii 

- MUST add `Tester` classes to the repository
- SHOULD use `Yii::info()` or `Yii::trace()`, NOT `Yii::getLogger->(..., ..., ...)`
- SHOULD NOT use `application.language = null` with `codemix/yii2-localeurls`
- SHOULD NOT use static `::className()` calls in application configuration  
- Console commands **SHOULD** print a newline at the end of their output `$this->stdout("Done".PHP_EOL)`    

### Widgets

- references **SHOULD NOT** use absolute URLs

### Twig

- If attributes in *Twig* templates need to be translated and scanned by the **Translatemanager** module you need to use the following syntax 

      data-content={{ t('catalogue', '__TOOLTIP_TEXT__'  | escape('html_attr')) }}

### LESS/CSS

- CSS framework core classes, eg. `container`, `row`, `col-*` **MUST NOT** be modified
- SHOULD use hyphens for CSS classes and ID's i.e. `.my-class` and `#my-id`
- https://github.com/CSSLint/csslint/wiki/disallow-ids-in-selectors

### Giiant (Backend CRUD)

- providers **MUST NOT** be copied into the project, may can extend a new class
- SHOULD contain `Id` columns


## Docker

### Volumes

- host-volumes **MUST NOT** overlap
- host-volumes **SHOULD NOT** contain single files

### Images

- All production images **MUST BE** tagged


## Documentation

- `README.md` in project root (max. 300 lines)
- `docs/` detailed project documentation
  - `docs/README.md` index
  - `docs/troubleshooting.md` "Esoteric features"
- Source-code docblocks


## Database (MySQL)

- camelCase_id
- **MUST USE** non-project specific default values
- **SHOULD** have an idempotent setup (see `AppCommand`)




