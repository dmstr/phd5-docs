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
    
Replace Widget Edit Button e.g.

    {{ cell_widget(
        {
            id: 'top',
            positionWidgetControls: 'bottom',
            positionContainerControls: 'bottom' 
        }
    ) }}

Cells with custom request params 

    {{ use ('hrzg/widget/widgets') }}
    {{ cell_widget(
        {
            id: 'result',
            requestParam: 'schema'
        }
    ) }}

Custom layout

    {{ set(this.context, 'layout', '@backend/views/layouts/box') }}   
   

## Meta-Tags

You can register meta tags or link tags in global Twig widgets

    {{ this.registerLinkTag(
        {
            'rel':'icon',
            'href':'/filefly/api?action=stream&path=%2Fbrand%2Ffavicon%2Ffavicon.ico'
        }
    ) }}

## Twig Example Favicon

    {# Header Link Tags #}

    {{ this.registerLinkTag({'rel':'icon','href':'/filefly/api?action=stream&path=%2Fbrand%2Ffavicon%2Ffavicon.ico'}) }}
    {{ this.registerLinkTag({'rel':'apple-touch-icon','size':'180x180','href':'/filefly/api?action=stream&path=%2Fbrand%2Ffavicon%2Fapple-touch-icon.png'}) }}
    {{ this.registerLinkTag({'rel':'icon','type':'image/png','href':'/filefly/api?action=stream&path=%2Fbrand%2Ffavicon%2Ffavicon-32x32.png'}) }}
    {{ this.registerLinkTag({'rel':'icon','type':'image/png','href':'/filefly/api?action=stream&path=%2Fbrand%2Ffavicon%2Ffavicon-16x16.png'}) }}
    {{ this.registerLinkTag({'rel':'manifest','href':'/filefly/api?action=stream&path=%2Fbrand%2Ffavicon%2Fmanifest.json'}) }}
    {{ this.registerLinkTag({'rel':'mask-icon','href':'/filefly/api?action=stream&path=%2Fbrand%2Ffavicon%2Fsafari-pinned-tab.svg','content':'#7a0727'}) }}
    {{ this.registerMetaTag({'name':'theme-color','content':'#FFFFFF'}) }}


## Twig Example Open Graph

    {# Open Graph Tags #}

    {{ this.registerMetaTag({'property':'og:title','content':'Neue Spinnerei - Restaurant & Bar'}) }}
    {{ this.registerMetaTag({'property':'og:description','content':'Neues Leben ist erwacht in den Räumen der ehemaligen Baumwollspinnerei Aathal. Im Restaurant mit 150 Sitzplätzen servieren wir Ihnen ein kreatives Angebot an frisch gekochten Speisen.'}) }}
    {{ this.registerMetaTag({'property':'og:url','content':'http://www.neue-spinnerei.ch.staging-2.oneba.se/de'}) }}
    {{ this.registerMetaTag({'property':'og:image','content':'//www.neue-spinnerei.ch.staging-2.oneba.se/de/filefly/api?action=stream&path=%2Fbrand%2Fopengraph%2Ffacebook-img.jpg'}) }}
    {{ this.registerMetaTag({'property':'og:image:width','content':'600'}) }}
    {{ this.registerMetaTag({'property':'og:image:height','content':'337'}) }}
    {{ this.registerMetaTag({'property':'og:image:type','content':'image/jpeg'}) }}


## JavaScript snippet

    
    {% set js %}
      ... paste your JavaScript here ...
    {% endset %}
    {{ this.registerJs(js) }}

---

___

## Twig Example Favicon

    {# Header Link Tags #}

    {{ this.registerLinkTag({'rel':'icon','href':'/filefly/api?action=stream&path=%2Fbrand%2Ffavicon%2Ffavicon.ico'}) }}
    {{ this.registerLinkTag({'rel':'apple-touch-icon','size':'180x180','href':'/filefly/api?action=stream&path=%2Fbrand%2Ffavicon%2Fapple-touch-icon.png'}) }}
    {{ this.registerLinkTag({'rel':'icon','type':'image/png','href':'/filefly/api?action=stream&path=%2Fbrand%2Ffavicon%2Ffavicon-32x32.png'}) }}
    {{ this.registerLinkTag({'rel':'icon','type':'image/png','href':'/filefly/api?action=stream&path=%2Fbrand%2Ffavicon%2Ffavicon-16x16.png'}) }}
    {{ this.registerLinkTag({'rel':'manifest','href':'/filefly/api?action=stream&path=%2Fbrand%2Ffavicon%2Fmanifest.json'}) }}
    {{ this.registerLinkTag({'rel':'mask-icon','href':'/filefly/api?action=stream&path=%2Fbrand%2Ffavicon%2Fsafari-pinned-tab.svg','content':'#7a0727'}) }}
    {{ this.registerMetaTag({'name':'theme-color','content':'#FFFFFF'}) }}


## Twig Example Open Graph

    {# Open Graph Tags #}

    {{ this.registerMetaTag({'property':'og:title','content':'Neue Spinnerei - Restaurant & Bar'}) }}
    {{ this.registerMetaTag({'property':'og:description','content':'Neues Leben ist erwacht in den Räumen der ehemaligen Baumwollspinnerei Aathal. Im Restaurant mit 150 Sitzplätzen servieren wir Ihnen ein kreatives Angebot an frisch gekochten Speisen.'}) }}
    {{ this.registerMetaTag({'property':'og:url','content':'http://www.neue-spinnerei.ch.staging-2.oneba.se/de'}) }}
    {{ this.registerMetaTag({'property':'og:image','content':'//www.neue-spinnerei.ch.staging-2.oneba.se/de/filefly/api?action=stream&path=%2Fbrand%2Fopengraph%2Ffacebook-img.jpg'}) }}
    {{ this.registerMetaTag({'property':'og:image:width','content':'600'}) }}
    {{ this.registerMetaTag({'property':'og:image:height','content':'337'}) }}
    {{ this.registerMetaTag({'property':'og:image:type','content':'image/jpeg'}) }}


## Twig Example Google Analytics

    {# Google Analytics Code #}
    
    {% set trackingCode %}
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
    
      ga('create', 'UA-50480922-1', 'auto');
      ga('send', 'pageview');
    {% endset %}
    
    {{ this.registerJs(trackingCode) }}



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
    
    {# Importing widgets namespaces and classes #}
    {{ use('dmstr/modules/pages/models') }}
    {{ use('rmrevin/yii/fontawesome') }}
    {{ use('yii/helpers') }}
    {{ use('yii/bootstrap') }}
    
    {# Prepare menu variables #}
    {% set frontendItems = Tree.getMenuItems('root', true) %}
    {% set backendItems = Tree.getMenuItems('backend', true) %}
    
    {# Navigation #}
    {{ nav_bar_begin(
        {
            'brandLabel': FA.i('cog'),
        }
    ) }}
    
        {# Backend items #}
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
    
        {# Frontend items #}
        {{ nav_widget(
            {
                'options': {
                    'class': 'navbar-nav navbar-right',
                },
                'items': frontendItems
            }
        ) }}
        
        {# Logout #}
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

#### Language Menu

    {% set languageItems = [
        {
            'label': FA.i('globe'),
            'items': [
                {'label':'中文', 'url': '/zh'},
                {'label':'English', 'url': '/en'}
            ]
        },
    ] %}

    {{ nav_widget(
        {
            'encodeLabels': false,
            'items': languageItems,
            'options': {
                'class': 'navbar-nav navbar-right',
            },
        }
    ) }}


### Cookie Consent

    {{ use('cinghie/cookieconsent/widgets') }}
    {{ cookie_widget_widget() }}

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

#### Cookie Button

The following cookie button widget can be added to the Twig layout `frontend.extra.menuItems` to switch between admin and view mode.
    
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
    
> Note: Since `dmstr/yii2-backend-module:>=1.0.0-beta3` the cookie button is included in the `Toolbar` widget

### Filemanager


    {{ use ('hrzg/filemanager/widgets') }}
    {{ file_manager_widget_widget(
        {
            "handlerUrl": "/#{app.language}/filefly/api"
        }
    ) }}

### Set a layout

    {{ set(app.controller, 'layout', '@backend/views/layouts/main') }}
    
### Links

- [Yii 2 Twig documentation](https://github.com/yiisoft/yii2-twig/blob/master/docs/guide/README.md)
- [Convert PHP arrays to JSON](http://php.fnlist.com/php/json_encode)
