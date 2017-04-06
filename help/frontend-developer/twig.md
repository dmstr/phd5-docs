## Twig Layouts



**ATTENTION:** There has to be a  **twig** on the page before you can add widgets.

If you choose the `view` **@vendor/dmstr/yii2-prototype-module/src/views/render/twig.php** it should create a twig automatically, if not please contact support.

___

    
## How to create a twig

If there is no **twig** on the page, you will see a flash message saying `+ de/site/index Twig` to create a twig.

**Example Twigs**

Simple

    {{ use ('hrzg/widget/widgets') }}
    {{ cell_widget({id: 'main'}) }}
    
Top, Main and Bottom Cell

    {{ use ('hrzg/widget/widgets') }}
    {{ cell_widget({id: 'top'}) }}
    {{ cell_widget({id: 'main'}) }}
    {{ cell_widget({id: 'bottom'}) }}

## Meta-Tags

You can register meta tags or link tags in global Twig widgets

    {{ this.registerLinkTag(
        {
            'rel':'icon',
            'href':'/filefly/api?action=stream&path=%2Fbrand%2Ffavicon%2Ffavicon.ico'
        }
    ) }}


## Google-Analytics example


    {# Google Analytics Code #}
    {% set trackingCode %}
      ... paste your JavaScript here ...
    {% endset %}
    {{ this.registerJs(trackingCode) }}

___

## References

- [JSON Editor documentation](https://github.com/jdorn/json-editor)


