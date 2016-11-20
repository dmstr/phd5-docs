
Module: Pages
-----

### Settings

- pages root node `backend` (Access domain `GLOBAL`)
 - use *setting* `pages` `availableGlobalRoutes` for backend menu items

The `pages` module is a manager for sitemap trees.

### Create a new page

- login and go to `pages` in the left sidebar in application backend
- create a root node, if there is none already
- select root-node and add a new page by clicking on the :heavy_plus_sign:
 - add a unique `Name ID` and set the `Menu name` which will be displayed in the navigation
 - select a route to define which action should be executed, eg. `site/index`
 - save new page
- visit page in application frontend

### Add a route

- login and go to `settings` in the left sidebar in application backend
- create or edit `pages`, key `availableRoutes`
- add one route per line, eg. `/docs`, which should render the default action of the default controller of the module
  registered as `docs`.
- save

### Staging Content

- Create "hidden node" in pages

---

:blue_book: [Extension README](https://github.com/dmstr/yii2-pages-module/blob/master/README.md)
