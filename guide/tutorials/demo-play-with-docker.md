# Play with phd

There are many way to try out *phd*, a really slick one is starting a stack

Head over to http://labs.play-with-docker.com/ and create a new instance.

Download a *phd* application definition (see ../../../resources/play-with-docker/docker-compose.yml)

    curl -Lo docker-compose.yml https://raw.githubusercontent.com/dmstr/phd5-docs/master/resources/play-with-docker/docker-compose.yml

Run the application setup

    docker-compose run --rm php yii app/setup
    
And start the application
    
    docker-compose up -d
    
Your services will be available on their mapped port, just click the label right next to the node IP address.

Happy *phd*ing!