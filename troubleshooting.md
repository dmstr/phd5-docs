### GitLab CI

### Disk full

-> run cleanup


## Windows

Running `docker-compose` on Windows can be painfully, because at least up to version `1.8.0-RC2` there's no interactive mode for commands like `exec` or `run` which renders them pretty unusable for development.

As a workaround you can use `docker exec -it appname_php_1 bash` to start a bash in a PHP container.

We recommend to run Docker CLI tools from a Linux VM on Windows.