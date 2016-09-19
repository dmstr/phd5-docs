# Upgrading instructions

### 0.5.0-beta3 to 0.5.0

```
UPDATE `app_twig` 
   SET `value` = REPLACE(`value`, 'widget_container_widget', 'cell_widget') 
 WHERE `value` LIKE '%widget_container_widget%'

UPDATE `app_twig` 
   SET `key` = REPLACE(`key`, '/prototype/render/twig/', '/pages/default/page/')

UPDATE `dmstr_page` 
   SET `route` = "/pages/default/page", 
   		`view` = "@vendor/dmstr/yii2-prototype-module/src/views/render/twig.php" 
 WHERE `route` = "/prototype/render/twig"
```

----


## Docker image

### phundament/php-one 4.5 :arrow_right: 4.6

#### Upgrade Codeception tester classes

Locate your **generated** tester classes in `/tests/codeception/...` and remove them.

Create an application bash

    make bash
    
Rebuild tester classes. (YII_ENV must be set to 'test')

    $ codecept build
    
Test the testers

    make build
    make TEST up setup bash

    $ codecept run
    
Commit your changes...        



