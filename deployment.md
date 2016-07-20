## Staging/Production

### Virtual-host

- CAN USE a wildcard OR CAN USE a comma separated virtual-host list
- SHOULD use `www.` as default

### Export database

    make bash
    
    $ yii db/x-dump-data

### Import database

#### Manually

#### Via migrations