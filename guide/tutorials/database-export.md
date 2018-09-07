
Example for storing database dumps on S3. 

    yii db/export --outputPath=/app/runtime/_debug && \
    yii migrate/history > /app/runtime/_debug/migrate-history.log && \
    yii fs/sync runtime://_debug s3:// --interactive=0 && \
    yii fs/rmdir runtime://_debug --recursive --interactive=0


Download via Filefly

> Note! It is strongly recommended to remove the debug dumps after downloading them.


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

