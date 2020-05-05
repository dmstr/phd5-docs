# Upgrading instructions

> The term `upgrade` is primarily used in `Makefile` targets, it usually includes a `composer update`, but may also contain other actions, such as `docker build`.

## Upgrading application vendor packages

To update application packages can be updated with

    make upgrade

which is a shorthand for running `composer update` in the PHP container.

> Note: If you have made changes to `composer.phd5.json` you need to run `dist-upgrade` to rebuild the image before upgrading.

## Upgrading application base-images

A **phd5-template** can be updated by changing its Docker `FROM` image.
After chaning the base version run

    make dist-upgrade

To get the base image, update packages and rebuild the application.

This action can apply updated configuration settings, vendor package constraints and new PHP version from the base-image, i.e. **phd5-app**.

### Upgrading database

Create a SQL-dump of the running system you want to upgrade.

To import the dump into a locally running application run

    yii db/destroy
    yii db/create
    yii db/import /dumps/project.sql
    yii migrate

You may also update the admin password locally

    yii user/password admin admin1

## Troubleshooting

- https://github.com/dmstr/phd5-app/blob/master/UPGRADING.md
- https://github.com/dmstr/phd5-app/blob/master/CHANGELOG.md

If you can not build the image, ie. due to a broken `composer.lock` file, revert its changes
and run the update again.

If you can not build the image, because you have locked packages which do not match a newer PHP version, it's recommended to comment the composer installation in the Dockerfile and run `make upgrade`.