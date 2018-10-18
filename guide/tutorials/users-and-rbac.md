# Users and role-based access control

Set admin password

```
docker-compose run --rm php yii user/password admin admin1
```

Create initial users and assign roles

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
- `name-module` (combined permission)
- `module` (route permission)
- `module_controller` (route permission)
- `module_another-controller_action` (route permission)

Do not attach children to route permissions, create a new permission `my-module` instead.