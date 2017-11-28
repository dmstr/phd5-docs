## Less Themes


If you start with your new Website, you will find these two less files:

`doro-main`

`doro-widgets`

---

<div class="mermaid">
graph TD
  AppAsset
  SettingsAsset
  
  SettingsAsset-->DbAsset
  SettingsAsset-->FontAwesomeAsset
  
  DbAsset-.-registerPrototypeAssetKey
  registerPrototypeAssetKey-.-default_main.less
  
  default_main.less-->widgets.less
  default_main.less-->variables.less
  
  AppAsset---Source_Code 
  
</div>

---

## Doro Main

Use this less for global CSS 

### <p><span style="color:orange">Listing all Less Files</span></p>

The Main Less is to bring together all used less files

```
@import "/app/vendor/bower/bootstrap/less/bootstrap.less";
@import "/app/vendor/thomaspark/bootswatch/@{theme}/variables.less";
@import "/app/vendor/thomaspark/bootswatch/@{theme}/bootswatch.less";
@import "//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css";
@import "doro-widgets";
```

### <p><span style="color:orange">Theme</span></p>

Doro uses a **bootswatch** theme for basic looks, you can alter this as u like.
Choose one of these themes:

Example http://bootswatch.com

Available themes: 
cerulean,cosmo,cyborg,darkly,flatly,journal,lumen,paper,readable,sandstone,simplex,slate,spacelab,superhero,united,yeti


### <p><span style="color:orange">Define your global style</span></p>

Define your global CSS, e.g.

```
h1 {
    font-size: 50px;
}
```


## Doro Widgets

Use this less for Widget CSS

### <p><span style="color:orange">Define your widget style</span></p>

Define your widget CSS, e.g.

```
.widget-content {
    padding: 3em 0;
}
```

----

### Examples

    @import (inline) "/app/vendor/thomaspark/bootswatch/cyborg/bootstrap.css";
    @import (reference) "/app/vendor/bower/bootstrap/less/bootstrap.less";


-----



Module: Prototype
--------

This module has very limited features and has been mainly developed to create tiny static sites. It basically allows
you to add HTML and LESS files to your site. 

### Create asset bundle for LESS from the database

See [Online help](https://github.com/dmstr/phd5-docs/blob/master/help/frontend-less.md)

- go to `/prototype/less`
- create key `main`
 - add example LESS content
- save
