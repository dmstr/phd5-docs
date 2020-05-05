Backend
=======

The application backend is accessible via `/backend` or by clicking on the **gear** icon, after you are logged in.

Only users with permission `backend_default` can access the backend dashboard.

### Access restricitions

> :bangbang: By default all controllers of the application are only accessible to the `admin` user.

You can make a page or controller publicly available, when you add the corresponding permission to the `Public` role.
It is recommended to setup an user with role `Editor` for managing the contents in the backend.

User authentication and authorization is provides by the extension `dektrium/yii2-user`, you can find its 
[documentation](https://github.com/dektrium/yii2-user/blob/master/docs/README.md) on GitHub.

### Language Selection

You can switch the application language by choosing another language under the flag icon on the top right menu bar.

### Routes

*Usually available in `pages.availableGlobalRoutes`*

`/audit`

Overwiew

`/audit/mail`

E-Mails sent from the application

`/audit/trail`

Database changes

`/audit/error`

Error log

`/backend`

Application management Dashboard

`/backend/default/view-config`

Application configuration

`/backend/default/show-auth`

Auth items for the current user

`/debug` (only available in `YII_ENV_DEBUG`) :warning:	

Debugging tool

`/docs`

Online application help

`/filefly`

Filemanager

`/filefly/api`

Filemanager REST Endpoint

`/pages`

Menu manager

`/prototype`

CMS base

`/publication`

Blog

`/redirects`

URL redirects

`/resque`

Jobs

`/setings`

Settings (key-value store)

`/translatemanager`

Manage application translations for different languages

`/user`

User and Permission management

`/user/login`

Authentication form

`/widgets`

CMS building blocks





