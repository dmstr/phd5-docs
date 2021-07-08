# Debugging with XDebug, PHPStorm and Docker

To use the full features of debugging tools, you can enable **Xdebug** in the `php` containers.

Since the application runs in Docker containers and the debugging tools on the host and Docker isolates the stacks by default, you need a special network setup.

### Setup

Allow traffic from Docker private IPs in firewall, eg.

    sudo ufw allow from 172.16.0.0/12 proto tcp to any

Create a network which is reserved for debug data.

    docker network create --subnet 192.168.222.0/24 xdebug

To output of the command will be the full ID of the newly created network.

To obtain the ID used for the corresponding bridge device run

    docker network ls | grep xdebug

Accept connections for this interface on your host
    
    sudo iptables -A INPUT -i br-<NETWORK_ID_SHORT> -j ACCEPT

> It is not recommended to run this operation against the `default` network of the stack, since this might interfere with other networking operations.

To attach the `php` container to this network, define it in the `docker-composer.override.yml` file and attach it to the service.

    networks:
      xdebug:
        external:
          name: xdebug
    
    services:
      php:
        networks:
          - default
          - xdebug

To enable **Xdebug** in the container and to set configuration values for debugging add the following environment variables to the `php` service

    services:
      php:
        environment:
          - PHP_ENABLE_XDEBUG=1
          - PHP_IDE_CONFIG=serverName=phd5
          - XDEBUG_CONFIG=remote_connect_back=0 remote_enable=1 remote_host=192.168.222.1 profiler_enable_trigger=1



You can now active listening for debug connections in PHPstorm.
Restart your application and check if you are able to connect from your container

    make bash
    $ curl -v 192.168.222.1:9000

If everything is set up correctly you should see a line like `Connected to 192.168.222.1 (192.168.222.1) port 9000 (#0)` in the output.    

For PHPstorm you need to setup path mappings.

> If you have issues with Xdebug on the CLI during setup, stop listening for debug connections in PHPStorm and restart when the web-server is fully up and running.

### Links

- https://www.jetbrains.com/phpstorm/marklets/
- Kcachegrind    
