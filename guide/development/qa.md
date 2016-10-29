QA
==

TL;dr
-----

    make lint

Linkchecker
-----------
    
    $ linkchecker http://web -r 3       

Sitemap    
    
    $ linkchecker http://web --threads 2 --file-output sitemap -o none

"Warm caches"

:warning: Be careful with these commands, they may generate a lot of load on your server.
        
    docker run phundament/php-one:5.6 linkchecker -t 5 -r 1 http://www.my-app.com/
    docker run phundament/php-one:5.6 linkchecker -t 4 -r 1 http://www.my-app.com/products
    docker run phundament/php-one:5.6 linkchecker -t 2 -r 2 http://www.my-app.com/
    
    
HTML-Validator
--------------

    validator:
      image: magnetikonline/html5validator
      entrypoint: ["java", "-jar", "/root/build/validator.nu/vnu.jar"]

Index page

    docker-compose run validator http://web/en

Login page

    docker-compose run validator http://web/en

From bash in validator

    docker-compose exec validator bash
    $ java -jar validator.nu/vnu.jar


Lint
----
    
https://github.com/redcoolbeans/dockerlint
    
    docker run -it --rm -v "$PWD/Dockerfile":/Dockerfile:ro redcoolbeans/dockerlint
    
https://github.com/projectatomic/dockerfile_lint
    
    docker run -it --rm --privileged -v $PWD:/root/ projectatomic/dockerfile-lint dockerfile_lint -f Dockerfile
    


Explorative Testing
-------------------

docker-acception

