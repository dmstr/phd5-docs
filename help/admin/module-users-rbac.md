
Module: Users
-------------

By default *phd5* creates an admin user which user full access to the application.



Module: RBAC
--------

/rbac/role/update?name=Public


User & Roles
----

Here you can manage the particular users roles and authorizations or create new users.

There are 4 different kinds of Users:

<code>Client:</code> 

Has full access to the CMS, but limited backend access

___
<code>Editor:</code>

For Prototype work.

___
<code>Master:</code>

Has full backend access.

___
<code>Public:</code>

Is an unauthenticated user


Authorizations should combined in roles and those should be assigned to users.
Depending on the module, you need to use *permissions* and/or *route Access*.

