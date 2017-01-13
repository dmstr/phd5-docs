## Development

Edit `.env-dist`, `app.env-dist`, `tests/.env-dist`, sane defaults


### Update a single package

When you want to update a single package without having all packages updated, you should first check the constraints of the installed package.

	$ composer why dmstr/yii2-pages-module                            

Which should give you something similar to

```
dmstr/yii2-backend-module   0.4.11      requires  dmstr/yii2-pages-module (~0.16)                    
dmstr/yii2-cms-metapackage  5.0.0       requires  dmstr/yii2-pages-module (~0.16)                    
```

Let's assume we want to use an `alpha` version, but the above constraints and your `minimum-stability` setting are restricting you from doing so.

You can overcome this restricting by specifying a version alias for the package, which installs the requested `alpha` version with a 'stable' alias. Please note that we are not updating the packages with this command.

	$ composer require --no-update "dmstr/yii2-pages-module:0.19.0-alpha1 as 0.18.99"

The above command only updates the `composer.json` file, you can now dry-run an update for the package.
	
	$ composer update --dry-run dmstr/yii2-pages-module

Which should give you the package to be updated...

	- Updating dmstr/yii2-pages-module (0.18.0-beta4) to dmstr/yii2-pages-module (0.19.0-alpha1)

 and in some cases also dependent packages, like underlying libraries.
 
You can now update the package with
	
	$ composer update dmstr/yii2-pages-module


### Add a single package

	$ composer require --no-update --sort-packages "bedezign/yii2-audit"
	$ composer update --dry-run bedezign/yii2-audit
	$ composer update bedezign/yii2-audit


### Source code repositories

- see `composer.json` section `config`, edit `preferred-install`.

#### Switching from `dist` to `source`

:warning: Beware of data loss for the following actions

- check and **backup your changes** in `vendor`
- delete folders from `vendor` you want as source
- edit `composer.json` like described above

Run update in container

	$ composer install

> Note: As an alternative to editing `preferred-install`, you can also run `composer install  --prefer-source`, but be aware that this will clone all outdated or missing repos.

### Update composer or global packages

In some cases you need to update globally installed tools like `composer`, `codeception` or `fxpio/composer-asset-plugin`.

    $ composer self-update
    $ composer global update
