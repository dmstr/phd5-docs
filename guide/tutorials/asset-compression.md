Asset compression
-----------------

phd bundles the assets in the `:development` Docker container, which comes pre-installed with all required
tools, to make use of Yii 2.0 Framework asset compresssion.

    docker-compose run --rm php bash

Bundle the assets from the container-bash
    
    $ mkdir -p web/assets-prod/js web/assets-prod/css       
    $ yii asset src/config/assets-prod.php src/config/bundle-prod.php
    
> Note! Make sure not to use a backlash `\` at the beginning of your asset-bundle name, since it may conflict with
> the `className()` which returns values without a starting backslash


Application Asset Bundle
------------------------

- [[app\assets\AppAsset]]


### Asset bundles

By default *phd* runs with the default bootstrap asset bundle from Yii.
To enable asset customization, edit `src/assets/AppAsset.php` and uncomment `'less/app.less',`.

There are three files included by default:

 - `app.less` main LESS file for application
 - `bootstrap.less` includes for bootstrap LESS files
 - `variables.less` bootstrap settings
 
Initial adjustment to the style settings of the application should be made in `variables.less`

> When developing assets you can set `APP_ASSET_FORCE_PUBLISH=1` in your local `.env` file, this improves detection of
changes for included files.
> Note: This feature is only available in the `AppAsset` bundle for the application.

For bundling assets for production usage, see tutorial about [asset compression](../6-tutorials/asset-compression.md).

