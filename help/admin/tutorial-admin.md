
## :construction_worker: Initial backend setup with `admin` user

## Accessing the application backend

After starting the application stack and opening it in your browser, you can access the web-application backend via `/backend`.

![login](./images/login.png)

Login with `admin` / `admin1` and change the admin password.

### :construction_worker: Create users and assign roles

![user-admin](../images/user-admin.png)

- admin
- dev (Developer)
- editor (Editor)
- preview (Frontend)

> :bulb: The user `admin` is very similar to a root-user, by default it has every permission, or speaking in Yii terms `can()` always returns `true`.

### :construction_worker: Activate prototyping asset bundle

- `/settings`

![settings](../images/settings.png)


Logout as admin.

## General information

You will find the current application identifier (`APP_NAME`) and version in the footer of the backend.


----


