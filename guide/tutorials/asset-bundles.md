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

#### Cleanup

    yii app/clear-assets

#### Export from database

>  see also *Exporting database-dumps*

Register command if needed.

Export files with `yii prototype`.

Move files to `project/resources`. Commit.

Refactor files. Commit.

Use the files by `@import (/app/project/resources/default.less)` them from DB-Less.

Remove imported code from DB-Less records.

