# Code examples :construction_worker:

## Twig layouts

### Widgets :credit_card:

Simple

    {{ use ('hrzg/widget/widgets') }}
    {{ cell_widget({id: 'main'}) }}

Full width header and container

    {{ use ('hrzg/widget/widgets') }}
    {{ cell_widget({id: 'header'}) }}
    <div class="container">
        {{ cell_widget({id: 'container'}) }}
    </div>

### Filefly :credit_card:

    {{ use ('hrzg/filemanager/widgets') }}
    {{ file_manager_widget_widget(
        {
            'handlerUrl': '/en/filefly/api'
        }
    ) }}


## Backend

### Extra menu items

Twig with key `extra.menuItems`

    {{ use ('hrzg/moxiecode/moxiemanager/widgets') }}
    {{ browse_button_widget( {"tagName": "a"} ) }}