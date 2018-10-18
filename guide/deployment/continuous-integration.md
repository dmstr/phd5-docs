Continuous integration
======================

*phd* is designed to easily run in various CI/CD tools supporting *Docker*.


## Introduction

### Workflow diagram

<div class="mermaid">

graph LR;
    build(Build)
    test(Testing)
    release(Release)
    image((Image))

    subgraph CI
        build
        test
        release
    end
    
subgraph Registry
image
end

build==>test
test==>release
test-->report
release-->image

</div>

- Clone application from local repository
- Start application `make all`
- Make changes in local development stack
- Run tests in isolated local testing stack `cd tests; make all run-tests`
- Commit (triggers CI)
- CI builds images
- CI starts isolated stacks (by setting custom `COMPOSE_PROJECT_NAME`s) from built images and performs setup operations
- CI runs tests (also acceptance tests with Selenium containers)
- CI creates reports
- CI performs cleanup of isolated stacks
- CI tags images and pushes them to a registry (if tests were successful)



## Configuration

During local development the images build for the application stack are named by `docker-compose`, if not specified otherwise. For testing they are by default named `registry/namespace/phd5` via setting the `STACK_PHP_IMAGE` variable used in `docker-compose.test.yml`.
In the CI we override this variable by setting it in the configuration to the actual image name we want to push later, eg. `registry.example.com/mycomany/the-project` for private registries or `vendor/image` for usage with *DockerHub*. 

---


## Usage

### Using *Git* branches to build releases and trigger deployments

Build, test and push a `:latest` image

```
make latest
```

Build, test and push a `:1.2.3-4-gfedcba98` image

```
make release
```

---

Setup ENv variables in roj PROJECT_TOKEN

---

Startup script with auto-migration.

```
command: "sh -c 'yii migrate --interactive=0 && forego start -r -f /root/Procfile'"
```


## Deployment

Variables:

- `PROJECT_TOKEN` - token from `stacks-staging` project
- `PROJECT_REF` - branch, usually `master`
- `PROJECT_DIR` - location of `docker-compose.yml`, eg. `auto/cusomter/www.example.com`


<div class="mermaid">

graph LR;
 deploy(Deployment)
 image((Image))

 image---server
 deploy-->server

subgraph CI
 deploy
end
subgraph Registry
 image
end

</div>

