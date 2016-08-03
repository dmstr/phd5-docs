# Code examples :construction_worker:

## Layouts `Twig`

### Full width header and container

    {{ use ('hrzg/widget/widgets') }}
    {{ widget_container_widget({id: 'header'}) }}
    <div class="container">
        {{ widget_container_widget({id: 'container'}) }}
    </div>

## Backend

### Extra menu items

Twig with key `extra.menuItems`

    {{ use ('hrzg/moxiecode/moxiemanager/widgets') }}
    {{ browse_button_widget( {"tagName": "a"} ) }}