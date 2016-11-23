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

### GitLab trigger

    deploy:staging:
      type: deploy
      environment: staging-2
      script:
        - curl -X POST -F token=${TOKEN_STACKS_STAGING_2} -F "ref=master" -F "variables[TRIGGER_STACK_DIR]=projects/${CI_PROJECT_PATH}" ${ROJ_REPO_URL}
      only:
        - latest    

---

Transfer data from staging to migrations

- Go to `/resque`
- `yii db/x-dump/data`
- Download (via Moxiemanager or Filyfly)
- Create file migration, place into tests/codeception/_migrations/VERSION
- cd tests
- make clean all
- make run-tests (or make bash $ codecept run)


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

## ENV variables

### Mailer config

APP_MAILER_HOST=mailcatcher
APP_MAILER_USERNAME=smtp-user
APP_MAILER_PASSWORD=secret

```
APP_MAILER_HOST=mailcatcher
APP_MAILER_USERNAME=smtp-user
APP_MAILER_PASSWORD=secret
```