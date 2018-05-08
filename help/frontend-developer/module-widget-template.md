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




Templates
----

This Submenu shows you the predefined **widget templates**.

Further you're able to edit the existing templates or to create new templates by clicking on the **new** button upper left.

###create new Template

- Give the template a comprehensible **name**
- define a **php class**
- Type in the **Json Schema**
- Type in code for **Twig Template**
- click **create**

### Example

#### Basic Widget 

##### Schema

```
{
    "title": "Content Widget",
    "type": "object",
    "properties": {
        "headline": {
            "type": "string",
            "title": "Headline",
            "default": "Lorem ipsum"
        },
        "content": {
            "type": "string",
            "title": "Subline",
            "default": "<p>Pellentesque habitant morbi tristique ultricies mi vitae est. Mauris placerat eleifend leo.<\/p>",
            "format": "html",
            "options": {
                "wysiwyg": true
            }
        }
    }
}
```

##### Template

```
<h1>{{ headline }}</h1>
<div>{{ content | raw }}</div>
```

-----

## References

- [JSON Editor documentation](https://github.com/jdorn/json-editor)



---

:blue_book: [Project page](https://git.hrzg.de/hrzg/yii2-widgets2-module)

