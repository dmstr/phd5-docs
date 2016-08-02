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

