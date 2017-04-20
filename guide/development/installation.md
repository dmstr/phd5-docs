Installation
============

> Note: Examples in this guide are run in the dockerized setup. 
> You can run phd also  with [composer](../6-tutorials/installation-composer.md) 
> for example within a Vagrant VM. 

## phd5-app

When starting a new project it is recommended to **download the [latest release](https://github.com/dmstr/phd5-app/releases)**
and create a fresh repository from it.

    cd myapp
    git init    
    git add .
    git commit -m "inital commit"
  
> :bulb: It is recommended to create an initial commit from the unmodified template code, before making the first changes.

---

## phd5-template

The *planck* template contains a development environment for building and testing web applications with Docker, PHP and Yii 2.0 Framework. 

It follows a strictly modular approach, which means that custom source-code added to a *planck* application does not interfere
with the sources contained on the *phd5* base-image, which features a full-featured application platform.

Compare to other web application templates a *planck* template does not contain the full-source code of the application.
Which makes it super-small, in fact the only source-code contained by default is an empty array - the place to add your custom
configuration.

A key feature of *planck* is that its base application image can be updated. Therefore it is possible to deliver fixes 
or security updates for the underlying application. It also makes the process of creating your custom tailed application template
very easy.


---
    
    composer install --ignore-platform-reqs -o


---

Related topics:

- [Configure](configuration.md) the environment & application
