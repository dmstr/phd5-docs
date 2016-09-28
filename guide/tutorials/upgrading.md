# Upgrading instructions

A **phd** PHP version can be updated by changing its Docker `FROM` image.
Running `composer update` updates the application packages.

Adjust `migrationPaths` if needed.

Run `yii migrate`.
