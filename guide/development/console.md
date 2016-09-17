CLI tools
=========


### Inside the PHP container

- `composer` package manager
- `yii` application console
- `codecept` testing
- `linkchecker` qa

```
make bash
```

> If a line in the documentation is prefixed with `$` it means that this command needs to be run inside the container.

    $ composer update

#### Examples
    
##### Show environment variables (for bash)

    $ env | sort
    
> Note, there may be additional ENV variables available in an application loadedfrom `src/app.env`