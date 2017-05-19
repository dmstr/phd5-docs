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

Cells with custom request params 

    {{ use ('hrzg/widget/widgets') }}
    {{ cell_widget(
        {
            id: 'result',
            requestParam: 'schema'
        }
    ) }}


## Meta-Tags

You can register meta tags or link tags in global Twig widgets

    {{ this.registerLinkTag(
        {
            'rel':'icon',
            'href':'/filefly/api?action=stream&path=%2Fbrand%2Ffavicon%2Ffavicon.ico'
        }
    ) }}


## JavaScript snippet

    
    {% set js %}
      ... paste your JavaScript here ...
    {% endset %}
    {{ this.registerJs(js) }}

___

## References

- [JSON Editor documentation](https://github.com/jdorn/json-editor)




----


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

### Filemanager
    
    {{ use ('hrzg/filemanager/widgets') }}
    {{ file_manager_widget_widget(
        {
            "handlerUrl": "/#{app.language}/filefly/api"
        }
    ) }}

    
### NavBar

Enable **setting** `app.layout.enableTwigNavbar` and create a **prototype/twig** `_navbar`.
   
> :warning: Be careful, when changing the navbar, see the **audit** module for your latest changes   
    
    {{ use('dmstr/modules/pages/models') }}
    {{ use('rmrevin/yii/fontawesome') }}
    {{ use('yii/helpers') }}
    {{ use('yii/bootstrap') }}
    
    {% set frontendItems = Tree.getMenuItems('root', true) %}
    {% set backendItems = Tree.getMenuItems('backend', true) %}
    
    
    {{ nav_bar_begin(
        {
            'brandLabel': FA.i('cog'),
        }
    ) }}
    
        {{ nav_widget(
            {
                'options': {
                    'class': 'navbar-nav navbar-right',
                },
                'items': [
                    {
                        'label': 'Backend',
                        'items': backendItems,
                        'visible': app.user.can('backend_default_index')
                    }
                ]
            }
        ) }}
    
        {{ nav_widget(
            {
                'options': {
                    'class': 'navbar-nav navbar-right',
                },
                'items': frontendItems
            }
        ) }}
        
        {{ nav_widget(
            {
                'options': {
                    'class': 'navbar-nav navbar-right',
                },
                'items': [
                    {
                    'label': 'Logout',
                    'url': ['/user/security/logout'],
                    'linkOptions': {'data-method':'post'},
                    'visible': (app.user.isGuest == false)
                    }
                ]
            }
        ) }}
    
    {{ nav_bar_end() }}

#### Lanuage Menu

    {% set languageItems = [
        {
            'label': FA.i('globe'),
            'items': [
                {'label':'中文', 'url': '/zh'},
                {'label':'English', 'url': '/en'}
            ]
        },
    ] %}

---

    {{ nav_widget(
        {
            'encodeLabels': false,
            'items': languageItems
        }
    ) }}

#### Items from application params

    {% set contextItems = app.params['context.menuItems'] %}
    
    {{ nav_widget(
        {
            'encodeLabels': false,
            'items': [
                {
                    'label': FA.i('edit'),
                    'items': contextItems,
                    'visible': app.user.can('backend_default_index')
                }
            ]
        }
    ) }}

#### Cookie Buuton
    
    {{ use ('dmstr/cookiebutton') }}
    {{ cookie_button_widget(
        {
            'label': 'View',
            'cookieName': 'hrzg-widget_view-mode',
            'cookieValue': 'on',
            'cookieOptions': {
                'path': '/',
                'http': true,
                'expires': 7
            },
            'options': {
                'class': 'btn-default',
            }
        }
    ) }}

    
### Links

- [Yii 2 Twig documentation](https://github.com/yiisoft/yii2-twig/blob/master/docs/guide/README.md)
- [Convert PHP arrays to JSON](http://php.fnlist.com/php/json_encode)