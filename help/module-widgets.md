# Widgets module
    
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

#### Filefly (images)

    "image": {
        "type": "string",
        "format": "filefly",
        "default": "/_phd/test.png"
    }

## References

- [JSON Editor documentation](https://github.com/jdorn/json-editor)

---

:blue_book: [Project page](https://git.hrzg.de/hrzg/yii2-widgets2-module)

