# Logging

## Application log component

You can get the logs of your application with

    docker-compose logs
    
You may also add several params to the `logs` command

    docker-compose logs -f --tail 100 php
    
### Logging on console
     
It may also be required to get log output when running CLI commands.
By default messages of log levels `error` and `warning` are also shown on `stderr://`.
See also [config/common.php](https://github.com/dmstr/phd5-app/blob/master/src/config/common.php)

There is also a `runtime/log/console.log`, you can access it from a running containerwith

    docker-compose exec php tail -n 100 runtime/logs/console.log
    
Or enter a container with `make bash` and run a command there    
    
    $ yii migrate
    $ tail -n 100 runtime/logs/console.log

> :information_source: Since this file is written into the container filesystem, it is different for the running application and a one-off `run` container.
> You can set a (host-)volume for `/app/runtime` for development.

## Audit module logs

Logs are also available via the backend module *Audit*, please visit `/audit` in your browser.

