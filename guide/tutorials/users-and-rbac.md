Set admin password

```
docker-compose run --rm php yii user/password admin admin1
```

Create initial users

    $ yii user/create dev@example.com dev Passw0rd
    $ yii rbac/assign FrontendDeveloper dev
    $ yii user/create editor@example.com editor Passw0rd
    $ yii rbac/assign Editor editor