
### Extra menu items

Twig with key `extra.menuItems`

    {{ use ('hrzg/moxiecode/moxiemanager/widgets') }}
    {{ browse_button_widget( {"tagName": "a"} ) }}

    
### Modal
    
    {{ use ('yii/bootstrap') }}
    {{ modal_begin(
        {
            'id': 'modal-filemanager',
            'size': 'modal-lg'
        }
    ) }}

    ... modal content ...
    
    {{ modal_end() }}
    
---    
    
    <a type="button" data-toggle="modal" data-target="#modal-filemanager">
      Browse
    </a>
    
### Links

- [Yii 2 Twig documentation](https://github.com/yiisoft/yii2-twig/blob/master/docs/guide/README.md)
- [Convert PHP arrays to JSON](http://php.fnlist.com/php/json_encode)