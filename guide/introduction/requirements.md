# Requirements

To run **phd** you need Docker, on your host-system. While older versions should also work, here are the minimum versions which are actively tested and supported.

- [`docker >=1.11.0`](https://docs.docker.com)
- [`docker-compose >=1.8.0`](https://github.com/docker/compose)

Optional but recommended

- `git`
- `make`
- `composer`

> :bangbang: Due to disk performance issues like ... it's currently a recommended workaround to run composer from your host system for
> updates.
>
> `composer global require fxp/composer-asset-plugin wikimedia/composer-merge-plugin`


### Docker

You can create your *Docker* environment with 

- *Docker for Mac/Windows* or a package-manager on Linux | [Docs](https://docs.docker.com)
- `docker-machine` from *Docker Toolbox* as a VM or cloud-based host | [Docs](https://docs.docker.com)
- *Vagrant* with a customized VM setup | [Source-Code](https://github.com/dmstr/vado-ligure)

### Compose

On Linux the fastest way to get it is probably `sudo pip install docker-compose`.


## Testing your requirements

To test if your environment is ready, simply run the following status commands, if you do not see any errors, you are good to go!

	docker version
	docker-compose version
	docker info
	docker ps


## Non-dockerized installation

> :warning: Running **phd** without Docker *should work*, but is not actively supported. 

See [tutorials](../tutorials/installation-composer.md).
