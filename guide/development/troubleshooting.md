Troubleshooting
===============

For more frequently asked questions (FAQ) see [GitHub](https://github.com/dmstr/docker-phd5-app/issues) and [Stackoverflow](http://stackoverflow.com/questions/tagged/phundament)

Yii
---

#### Debug toolbar visible with `YII_DEBUG=0`

**Solution** Set `YII_ENV=dev` which is the variable responsible for the debug toolbar.

#### AssetManager warning

```
PHP Warning – yii\base\ErrorException

Cannot use a scalar value as an array
1. in /app/vendor/yiisoft/yii2/web/AssetManager.php
```
:warning:
**Fix** Check your application for missing asset files or configuration.

## composer

#### Slow or hanging updates

If you're experiencing slow updates, check what's going on in detail with

    composer -vvv update

#### Can't use `@dev` or `dev-master` packages

You need to use https://getcomposer.org/doc/articles/aliases.md, see also https://github.com/dmstr/yii2-cms-metapackage/issues/1


#### `config` settings

    "asset-pattern-skip-version": "(-build|-patch)"



Docker
------


#### Port is already allocated

    ERROR: Cannot start container 88b754d7e46aca58961ef0a049216f0e7331e35ba905d84fab01016a4797a779: failed to create endpoint appdev_mariadb_1 on network bridge: Bind for 0.0.0.0:43306 failed: port is already allocated

Remove or change your port mapping.

#### Can't push to private registry

See also [issue on GitHub]()

**Solution** Add the nameserver on your `boot2docker` vm 

```
echo "nameserver 8.8.8.8" > /etc/resolv.conf && sudo /etc/init.d/docker restart
```

#### VM harddisk out of space

See https://github.com/chadoe/docker-cleanup-volumes

    docker run -v /var/run/docker.sock:/var/run/docker.sock -v /var/lib/docker:/var/lib/docker --rm martin/docker-cleanup-volumes


#### Service 'php' failed to build

    Pulling repository docker.io/phundament/php-one
    ERROR: Service 'php' failed to build: Network timed out while trying to connect to https://index.docker.io/v1/repositories/phundament/php-one/images. You may want to check your internet connection or if you are behind a proxy.
    make: *** [build] Error 1

#### MySQL connection takes more than 5 seconds

Check your DNS settings, restart VM with `docker-machine`.

#### Can not connect to hosts on private networks

May be caused by overlapping subnets, as workaround is to remove networks with `docker network ls -q |  xargs docker rnetwork rm`.

#### Cleanup volumes

see https://github.com/chadoe/docker-cleanup-volumes 

#### Cleanup images and containers

```
docker run \
	-it \
	-v /var/run/docker.sock:/var/run/docker.sock \
	yelp/docker-custodian \
		dcgc --max-image-age=30d --max-container-age=1d --dry-run
```

#### Registry Login

Interactive login
    
    docker login your-registry.example.com

Login docker CLI
    
    docker login --username=${YOUR_USER} --password=${YOUR_PASS} your-registry.example.com

> Note! Check if Docker saves the credentials locally in `~/.docker`



### Gitlab CI Server

#### General

In case of weird errors you have the following workaround options, which you should try from to bottom:

- Retry
- Run a clean-script from time to time.
- Use a different `COMPOSE_PROJECT_NAME` name for the `CI` jobs.
- Clean project build folder via NAS
- Clean project build folder via SSH to runner host and `docker exec -it runner-x bash`
- Restart Docker daemon (`sudo service docker restart` and `docker start runner-a runner-b ...`
- Move the project to another runner
- Create a new runner
- Reboot the runner-host (runners should have `restart=always` policy)
- Recreate the runner-host (**last resort**)

#### Pushing

    $ bash build/scripts/deploy.sh
    Username: EOF
    
Build variables like `REGISTRY_USER` not set.



### SSH protocol error
  
  > fatal: protocol error: bad line length character: No s
  
Check SSH key and correct spelling.

> Todo: How to allow artifacts? ... cp to tmp and cp from tmp (EXPERIMENTAL!)




## Windows

Running `docker-compose` on Windows can be painfully, because at least up to version `1.8.0-RC2` there's no interactive mode for commands like `exec` or `run` which renders them pretty unusable for development.

As a workaround you can use `docker exec -it appname_php_1 bash` to start a bash in a PHP container.

We recommend to run Docker CLI tools from a Linux VM on Windows.