#### cleanup

```
docker run -ti -v /var/run/docker.sock:/var/run/docker.sock yelp/docker-custodian dcgc --max-container-age 1days --max-image-age 7days

docker images -f dangling=true -q | xargs docker rmi

docker run -v /var/run/docker.sock:/var/run/docker.sock -v /var/lib/docker:/var/lib/docker --rm martin/docker-cleanup-volumes

docker images buildref* | awk '{print $3}' | xargs docker rmi -f
```

https://github.com/chadoe/docker-cleanup-volumes

