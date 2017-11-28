# Upgrading instructions

A **phd** PHP version can be updated by changing its Docker `FROM` image.
Running `composer update` updates the application packages.

Adjust `migrationPaths` if needed.

Run `yii migrate`.

----

    update base image

check composer.json merge

    make upgrade
    
----

If you can not build the image, ie. due to a broken `composer.lock` file, revert its changes
and run the update again.    