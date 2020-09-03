# Database migrations

> :bulb: It is recommended to keep structural (schema) and data-only migrations separated.


## Usage

- Create a file-migration
  
      $ yii migrate/create \
          --templateFile=@dmstr/db/mysql/templates/file-migration.php \
          --migrationPath=@project/migrations/dev-data \
          export

- Create the database export, which is basically an adjusted dump

       $ yii db/export --outputPath=@project/migrations/dev-data

  > :exclamation: The dump truncates all exported tables by default 

- Create a migration

       $ yii file:migrate/create dev_data

- Adjust `public $file = '<NAME_OF_YOUR_EXPORTED_FILE>.sql';` in the newly created migration.

- For development add the development-data migrations via ENV variable in `docker-compose.dev.yml`

      APP_MIGRATION_LOOKUP=@project/migrations/dev-data


## Additional information

If you create initial data for the application, which is required and should always be inserted in inital setup, do not forget to add the migration path to the configuration

    'params' => [
        'yii.migrations' => [
            '@app/migrations/data',
        ]
    ]


Lookup paths for migrations can be defined in application configuration, for details see [dmstr/yii2-migrate-command](https://github.com/dmstr/yii2-migrate-command/blob/master/README.md).

    'params' => [
        'yii.migrations' => [
            '@yii/rbac/migrations',
            '@dektrium/user/migrations',
            '@vendor/lajax/yii2-translate-manager/migrations',
            '@bedezign/yii2/audit/migrations'
        ]
    ]

## Advanced topics

### Pre-configured command alias

Configure migrate command with predefined values *use only for creating file migrations*

    'controllerMap' => [
        'file:migrate' => [
            'class' => 'yii\console\controllers\MigrateController',
            'templateFile' => '@vendor/dmstr/yii2-db/db/mysql/templates/file-migration.php',
            'migrationPath' => '@project/migrations/dev-data',
        ]
    ],

### MySQL ALTER TABLE statements

Should be combined into one statement, since it's faster and more error resilient.

```mysql
ALTER TABLE `my_table` ADD `COL_X` DECIMAL(10,2) NULL DEFAULT NULL AFTER `COL_A`,
    ADD `COL_Y` VARCHAR(50) NULL DEFAULT NULL AFTER `COL_B`,
    ADD `COL_Z` VARCHAR(5) NULL DEFAULT NULL AFTER `COL_C`,
```

## Resources

:green_book: https://github.com/dmstr/yii2-db/blob/master/README.md
