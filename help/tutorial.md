Backend
====

You can access the web-application backend via `/backend`

Login with `admin` / `admin1` and change the admin password.

Adjust basic settings, eg. `app.assets.registerPrototypeAssetKey`

## Settings

- `pages.availableRoutes`
- `pages.availableViews`
- `pages.availableGlobalRoutes`
- `widgets.availablePhpClasses`
- `backend.adminltes.skin`
- `registerPrototypeAssetKey`
- `registerPatchAssetKey`
- `<markdocs>.markdownUrl`
- `<markdocs>.forkUrl`
- `<markdocs>.defaultIndexFile`
- `<markdocs>.cachingTime`
- `<markdocs>.htmlUrl`

## Twig

`extra.menuItems`

## Parameters

- `context.menuItems`


## User

### Create editor user

- p.review0
- dev / !dev.1
- editor / editor-1234
- preview / preview1

> Note: The user `admin` is very similar to a root-user, by default it has every permission, or speaking in Yii terms `can()` always returns `true`.


### Assign permissions

Create an user and assign `Editor` role

## Pages

### Create sitemap

- `/pages`

## Prototype

- Twig templates
- Semantic HTML
- Variables LESS

### LESS

- https://github.com/twbs/bootstrap/blob/master/less/variables.less

## Widgets :credit_card:

- Übersetzungen
- Widgets, Editor
  - Tipps & Tricks
  - https://git.hrzg.de/hrzg/yii2-widgets2-module


### Staging Content

- Create "hidden node" in pages
