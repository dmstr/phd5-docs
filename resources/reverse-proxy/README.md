Start proxy stack

    docker-compose up -d

Since compose v2 uses networks by default, you need to 

    networks:
      proxy:
        external:
          name: reverse_default
          
> As alternative you could run all your stacks in `v1` syntax or on the network `bridge`
          
"Web-facing" stack

    networks:
      - default
      - proxy