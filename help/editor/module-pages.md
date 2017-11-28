Pages
-----
##  <p><span style="color:darkorange">For Client & Editor Users</span></p>

### <p><span style="color:orange">Create a new page</span></p>

Go to `cms` and choose `page tree` in the left sidebar in your application backend

- create a root node, if there is none already (tree symbol)*
- select root-node and add a new page by clicking on the :heavy_plus_sign:
- General: set the `Menu name` which will be displayed in the navigation
- Route: choose a acces domain, select route `/pages/default/pages`, select view `@vendor/dmstr/yii2-widgets2-module/src/views/test/single.twig`
- SEO: add a `page titel` (it will apear in the URL) and add `keywords` and a `description` 
- `save` new page
- visit page in application frontend

*the root is not an actual page, it's also not your home, it just a folder for you navigation

### <p><span style="color:orange">Hide a page</span></p>

- click on page
- open options 
- uncheck visible

___

## <p><span style="color:dodgerblue">For Admin Users</span></p>

###  <p><span style="color:cornflowerblue">Twig (Cells)</span></p>

**ATTENTION:** There has to be a  **twig** (cell) on the page before you can add widgets.

If you choose the `view` **@vendor/dmstr/yii2-widgets2-module/src/views/test/single.twig** it should create a twig automatically, if not please contact support.

If there is no **twig** on the page, you will see a flash message saying `+ de/site/index Twig` to create a twig.

For more infos about **twigs** please go to [Twig Layouts](../frontdev/twig.md)


### <p><span style="color:cornflowerblue">Add a route</span></p>

- login and go to `settings` in the left sidebar in application backend
- create or edit `pages`, key `availableRoutes`
- add one route per line, eg. `/docs`, which should render the default action of the default controller of the module
  registered as `docs`.
- save


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



## Dashboard & Backend pages

To create a page for the backend and dashboard, add the desired route, eg. `/crud` to pages' settings.
Go to **Settings** and add `/crud` to the list in `pages.availableGlobalRoutes`.
Next add a page to the *Backend* node and select `/crud` as its route.
Authorizations are automatically checked via *route permissions*.

---

:blue_book: [Extension README](https://github.com/dmstr/yii2-pages-module/blob/master/README.md)
