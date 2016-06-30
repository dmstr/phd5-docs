# Configuration

## Local development

docker-compose

.env

docker-compose.yml
docker-compose.dev.yml

See also [ENV dmstr/docker-php-yii2](https://github.com/dmstr/docker-php-yii2)

## Application

src/app.env

YII_ENV
YII_DEBUG

src/config    

### Commands

        'file:migrate' => [
            'class' => 'yii\console\controllers\MigrateController',
            'templateFile' => '@vendor/dmstr/yii2-db/db/mysql/templates/file-migration.php'
        ]