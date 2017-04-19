Tutorial
========

---

## Frontend

Login as `dev` or `editor`.

### :pencil2: Create sitemap with the `pages` module

- `/pages`

Make sure you have selected your desired language.

![pages](./images/pages.png)


## :pencil2: Choose a theme for content prototyping

Update 

```
// available themes: 
// cerulean,cosmo,cyborg,darkly,flatly,journal,lumen,paper,readable,
// sandstone,simplex,slate,spacelab,superhero,united,yeti
@theme: 'cyborg';
```

- see also https://github.com/twbs/bootstrap/blob/master/less/variables.less
- see also http://bootswatch.com
- see also ../guide/tutorials/asset-bundles.md


### :pencil2: Add basic layout Twigs

```
{{ use ('hrzg/widget/widgets') }}
{{ cell_widget({id: 'main'}) }}
```

see also [module prototype](module-prototype-twig.md)


### :pencil2: Add content through widgets

![widgets-frontend.png](./images/widgets-frontend.png)

![widgets-backend-create.png](./images/widgets-backend-create.png)

see also [module prototype](module-widgets-twig.md)

---
