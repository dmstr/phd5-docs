# Widgets module

> TODO

    {{ use ('hrzg/widget/widgets') }}
    {{ cell_widget({id: 'main'}) }}

---
    
### Examples

Simple

    {{ use ('hrzg/widget/widgets') }}
    {{ cell_widget({id: 'main'}) }}

Full width header and container

    {{ use ('hrzg/widget/widgets') }}
    {{ cell_widget({id: 'header'}) }}
    <div class="container">
        {{ cell_widget({id: 'container'}) }}
    </div>
    
---

:blue_book: [Project page](https://git.hrzg.de/hrzg/yii2-widgets2-module)
:notebook: [Extension README](module-widgets.md)

