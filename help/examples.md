# Code examples :construction_worker:

## Layouts `Twig`

### Full width header and container

    {{ use ('hrzg/widget/widgets') }}
    {{ widget_container_widget({id: 'header'}) }}
    <div class="container">
        {{ widget_container_widget({id: 'container'}) }}
    </div>

### File Manager

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