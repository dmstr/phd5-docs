# Requirements

## On your host-system

- [`docker >=1.10.0`](https://docs.docker.com)
- [`docker-compose >=1.8.0`](https://github.com/docker/compose) *included in Docker for Mac and Windows*
- `git` (optional)
- `make` (optional)

You can create your Docker environment with *Docker for Mac/Windows* or with `docker-machine` from *Docker Toolbox*.

To test if your environment is ready, simply run the following status commands, if you do not see any errors, you are good to go!

	docker version
	docker-compose version
	docker info
	docker ps

## Non-dockerized installation

> :warning: Running **phd** without Docker *should work*, but is not actively supported. 

See [tutorials](../tutorials/installation-composer.md).