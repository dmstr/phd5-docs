	make bash
	
	docker-compose run php bash
	
	docker-compose exec php bash
	

### Create a database migration from a SQL file

	yii migrate/create \
      --templateFile='@dmstr/db/mysql/templates/file-migration.php' \
      --migrationPath='@app/migrations/demo-data' \
      data_migration

https://github.com/dmstr/yii2-db/blob/master/README.md