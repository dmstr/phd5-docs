# Testing *Chrome*


Docker compose config:

    chrome:
        # 3.0.0-dubnium
        privileged: true
        image: selenium/standalone-chrome-debug:3.0.0-dubnium
        ports:
          - '4444'
          - '5900'
        # workaround for Docker Beta, see https://github.com/SeleniumHQ/docker-selenium/issues/227#issuecomment-224865735
        dns: 8.8.4.4
        environment:
          - no_proxy=localhost
        # workaround for https://github.com/elgalu/docker-selenium/issues/20#issuecomment-133011186
        volumes:
          - /dev/shm:/dev/shm
     
Makefile eg. `open-chrome`
     
	$(OPEN_CMD) vnc://x:secret@$(DOCKER_HOST_IP):$(shell $(DOCKER_COMPOSE) port chrome 5900 | sed 's/[0-9.]*://')
