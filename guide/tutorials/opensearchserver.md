# Opensearchserver integration

TBD

https://github.com/dmstr/yii2-opensearch-module


```
opensearchserver:
    image: alexandretoyer/opensearchserver
    ports:
        - 9090
    volumes:
        - "/host-volume/opensearchserver-dmstr/srv:/srv"
    environment:
        - MEMORY=2g
```

