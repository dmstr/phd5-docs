Container bash
==============


### Inside the PHP container

- `yii` application console
- `composer` PHP package manager
- `npm` JavaScript package manager
- `codecept` testing
- `linkchecker` qa

## Usage

```
make bash
```

> :book: If a line in the documentation is prefixed with `$` it means that this command needs to be run inside the container.

    $ composer update

#### Help 

Get information for available commands

    $ yii help

#### Examples
    
##### Show environment variables (container bash)

    $ env | sort
    
##### Show environment variables (application)
    
    $ yii app/env
        
> Note, there may are additional ENV variables available in an applications loaded from `src/app.env`

### Permissions

All `yii` commands are run with the same permissions as the webserver by default.

If want a `yii` command to run with root-permissions, you can prepend the command like so

    PHP_USER_ID=0 yii ...

