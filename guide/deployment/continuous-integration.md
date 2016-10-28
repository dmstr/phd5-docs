Continuous integration
======================

> TODO: build -> version only in test

## Using *Git* branches to build releases and trigger deployments
 
    make latest
    
    make release


Example: Gitlab CI

- build
- test
- report
- deploy
- cleanup

> http://docs.gitlab.com/ce/ci/yaml/README.html

### GitLab CI

Example trigger for [`stacks-staging`](https://git.hrzg.de/dangerzone/stacks-staging)

    deploy:latest:
      stage: deploy
      script:
        - curl -X POST -F token=${PROJECT_TOKEN} -F ref=${PROJECT_REF} -F "variables[REDEPLOY_STACK_DIR]=${STACK_DIR}"  https://git.hrzg.de/api/v3/projects/256/trigger/builds
      only:
        - latest

Variables:

- `PROJECT_TOKEN` - token from `stacks-staging` project
- `PROJECT_REF` - branch, usually `master`
- `PROJECT_DIR` - location of `docker-compose.yml`, eg. `auto/cusomter/www.example.com`

### Setup

Set **Variables**

- `PHP_IMAGE_NAME`	registry.example.com/namespace/project_php
- `GITHUB_API_TOKEN`	abcd1234

### Workflow

1. Clone application from local repository
2. Start application `make all`
3. Make changes in local development stack
4. (optional) Run tests in isolated local testing stack `make TEST up setup run-tests`
5. Commit (triggers CI)
6. CI builds images
7. CI starts isolated stacks (by setting custom `COMPOSE_PROJECT_NAME`s) from built images and performs setup operations
8. CI runs tests (also acceptance tests with Selenium containers)
9. CI creates reports
10. CI performs cleanup of isolated stacks
11. CI tags images and pushes them to a registry (if tests were successful)


Run the test suites from build scripts

    $ sh build/scripts/build.sh
    $ sh build/scripts/test.sh


#### Building the `:production` image

Adjust your `Dockerfile` and build `FROM phundament/app:production`.

    make build

### Travis

Push example

```
after_success: |
  docker login -u="$REGISTRY_USER" -p="$REGISTRY_PASS" $REGISTRY_HOST
  if [ "${TRAVIS_BRANCH}" = "release" ]; then
    docker tag ${STACK_PHP_IMAGE} ${STACK_PHP_IMAGE_LATEST}
    docker-compose push || exit 1
    docker push ${STACK_PHP_IMAGE_LATEST} || exit 1
  fi
  docker logout
```

Production
----------

- All images MUST BE tagged


Push to branch `foo` results in Docker image `appsrc:foo`.