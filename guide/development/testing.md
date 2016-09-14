Testing
=======

### Running in isolated Docker stacks

Creating and running a test environment can be a cumbersome task, like executing your tests in an isolated database. 

Therefore the phd 4 Docker images contain pre-installed Codeception binaries for running  Yii 2.0 Framework unit-, functional- and acceptance-test-suites.


### With `make`

Or one-by-one via `Makefile` targets, make sure to build your images first, if you have made changes to `src`.

    make build

> :information_source: It is possible to use host-volumes during local testing/debugging, but running containers without host-volumes is usually much closer to the final production setup.

Next step is to get a clean stack selected and configured by using `TEST` target.  

    make TEST clean
    
Before the test-suites can be run, we need to setup the application, like during development setup, but in the test-stack.
    
    make TEST setup up 

Enter the `tester` container    
    
    make TEST bash

Run codeception directly *(container bash)*

    $ codecept run acceptance allow_fail


### Advanced usage
    
Running test suites from a different location

     make TEST run-tests OPTS='-c src/extensions/hrzg/resque-tests'

With additional migrations
   
     make TEST setup APP_MIGRATION_LOOKUP='@ext/onebase/core/migrations/data'

To run specific tests you can use the `OPTS` environment variable

    make TEST run-tests OPTS='acceptance dev/MyCept --steps'


> TODO: - VNC settings (Test-Selenium)


### Functional vs. acceptance tests
   
Due to limitations functional-testing should only be used for basic tests, see codeception.com
   
For Login, JavaScript, Cookies, Session, ... use acceptance tests. See commands `wait(1)`, `waitForElement(1)`.

   
### Codeception development and update commands

If you add a new module to a suite or after Codeception updates, you may need to update your Codeception classes

    make TEST bash
    
Re-build in container

    $ codecept build

Run tests from a custom location *(container-bash)*  

    $ codecept run -c src/extensions/<MODULE_ID>


### Grouping tests

See http://codeception.com/docs/07-AdvancedUsage#Groups

Required tests for production

    // @group mandatory

Features or tests currently in development
    
    // @group optional

----

# Testing

## TL;dr

	cd tests
	make all

## About

*phd* uses a separate stack for running tests, since testing an application requires some changes in the stack setup and should be run isolated from your development or production stack.

For acceptance or end-to-end tests for example you might want to use a "real" Selenium browser.
	
## Setup


Console vs. Web config

    $applicationType
    
## Structure

### Configuration

- codeception.yml
- docker-compose.test.yml (Test-Stack)
- .env (Test-Stack ENV variables)

### Data

Data-migration for running test should be placed into `tests/codection/_migrations`.

### Tests

tests/codeception

As a basic convention we use two test groups `mandatory` and `optional`. While the former have to pass in the CI the latter ones are allowed to fail.

Re-run failed tests

	codecept run -g failed

#### Unit

#### CLI

#### Functional

#### E2E (acceptance)

> Note: In Codeception acceptance tests checks are performed *as seen* in the browser, for example you have to check for `MYLINK` if there's a `text-transform: uppercase` or a link `mylink`.

### Code-coverage

```
$ docker-php-ext-enable xdebug
$ codecept run unit --coverage --coverage-html
$ codecept run functional --coverage --coverage-html
```
