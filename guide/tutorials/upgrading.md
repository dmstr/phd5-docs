# Upgrading instructions

To update application packages can be updated with

    make upgrade
    
which is a shorthand for `composer update` 

A **phd5-template** can be updated by changing its Docker `FROM` image.
After chaning the base version run

    make dist-upgrade
    
To get the base image, update packages and rebuild the application.

This action will apply updated configuration settings and new PHP images from the base **phd5-app**.



> If you can not build the image, ie. due to a broken `composer.lock` file, revert its changes
and run the update again.    