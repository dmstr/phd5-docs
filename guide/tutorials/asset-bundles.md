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

