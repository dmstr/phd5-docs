
HTML-Documentation
------------------

Generate application documentation

Enter container-bash

    docker-compose run --rm php bash

Run docs generator

    $ php -dmemory_limit=512M vendor/bin/apidoc api \
    --template=online \
    --exclude=yiisoft,Test,Tests,test,tests,ezyang,phpdocumentor,nikic,php_codesniffer,phptidy,php-cs-fixer,faker \
    src/,vendor/ \
    runtime/html
