Set admin password

```
docker-compose run --rm php yii user/password admin admin1
```

Create initial users

    $ yii user/create dev@example.com dev Passw0rd
    $ yii rbac/assign FrontendDeveloper dev
    $ yii user/create editor@example.com editor Passw0rd
    $ yii rbac/assign Editor editor
    
    
    
## Naming conventions

For RBAC items

- `RoleName`
- `permissionName`
- `parentName.permissionName`
- `permissionName:value`
- `module`
- `module_controller`
- `module_another-controller_action`