
### Database migrations

> :bulb: It is recommended to keep structural and data migrations separated.

Lookup paths for migrations can be defined in application configuration, for details see [dmstr/yii2-migrate-command](https://github.com/dmstr/yii2-migrate-command/blob/master/README.md).

    'params'      => [
        'yii.migrations' => [
            '@yii/rbac/migrations',
            '@dektrium/user/migrations',
            '@vendor/lajax/yii2-translate-manager/migrations',
            '@bedezign/yii2/audit/migrations'
        ]
    ]
	

### Create a database migration from a SQL file

	yii migrate/create \
      --templateFile='@dmstr/db/mysql/templates/file-migration.php' \
      --migrationPath='@app/migrations/demo-data' \
      data_migration

Do not forget to add the migration path to the configuration

    'params'      => [
        'yii.migrations' => [
            '@app/migrations/demo-data',
        ]
    ]

:green_book: https://github.com/dmstr/yii2-db/blob/master/README.md


### Commands

Configure migrate command with predefined values *use only for creating file migrations*

    'controllerMap' => [
        'file:migrate' => [
            'class' => 'yii\console\controllers\MigrateController',
            'templateFile' => '@vendor/dmstr/yii2-db/db/mysql/templates/file-migration.php',
            'migrationPath' => '@app/modules/_migrations/demo-data',
        ]
    ],
