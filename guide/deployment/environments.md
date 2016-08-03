## Staging/Production

### Virtual-host

- CAN USE a wildcard OR CAN USE a comma separated virtual-host list
- SHOULD use `www.` as default

### Export database

    make bash
    
    $ yii db/x-dump-data

### Import database

#### Manually

#### Via migrations

Staging
=======

:warning: This section is under development.

### Local staging

	make STAGE all

See also `build/compose`.




Production
==========

:warning: This section is under development.

### Migrate production data sets

- Do not export the schema (experimental: use `yii db/x-dump-data`)
- Don't export the data of tables such as
 - log
 - migration
 - language
 - auth
- Use correct time in migration history
- minimize the number of `dev-master` packages
