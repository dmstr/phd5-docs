Testing
=======

## TL;dr

    cd tests
    make all run-tests

## Introduction

*phd* uses a separate stack for running tests, since testing an application requires some changes in the stack setup and should be run isolated from your development or production stack.

For acceptance or end-to-end tests for example you might want to use a "real" Selenium browser.

### Running in isolated Docker stacks

Creating and running a test environment can be a cumbersome task, like executing your tests in an isolated database. 

Therefore the phd Docker images contain pre-installed Codeception binaries for running Yii 2.0 Framework unit-, functional- and acceptance-test-suites.

## Configuration

- codeception.yml
- docker-compose.test.yml (Test-Stack)
- .env (Test-Stack ENV variables)
- Data-migrations for tests should be placed into `tests/codection/_migrations`.


## Usage
 
### Switching to the test environment

Or one-by-one via `Makefile` targets, make sure to build your images first, if you have made changes to `src`.

    cd tests

> :information_source: It is possible to use host-volumes during local testing/debugging, but running containers without host-volumes is usually much closer to the final production setup.

Next step is to get a clean stack selected and configured by using `TEST` target.  

    make clean
    
Before the test-suites can be run, we need to setup the application, like during development setup, but in the test-stack.
    
    make up setup 

Enter the `tester` container    
    
    make run-tests

Run codeception directly in the container

    $ codecept run

> :bulb: Basically tests should be independent from each other. But depending on your setup `cli` tests can be used to initialize the test environment for the application. 

### Writing tests

    $ codecept generate:cest e2e Feature

### Advanced usage
    
If you add a new module to a suite or after Codeception updates, you may need to re-build tester classes

    $ codecept build

Running test suites from a different location

    $ codecept run -c path/to/tests

To run specific tests

    $ codecept run acceptance extensions --steps

To stop at breakpoints added with `$I->pauseExecution()`

    $ codecept run -d

Watch acceptance tests via VNC viewer

    make open-vnc


### Code-coverage

    make run-coverage

To run code-coverage while testing Xdebug must be enabled in the PHP container. This is done automatically, when setting `PHP_ENABLE_XDEBUG=1`, make sure to 

```
$ docker-php-ext-enable xdebug
$ codecept run unit --coverage --coverage-html
$ codecept run functional --coverage --coverage-html
```


#### Grouping tests

See http://codeception.com/docs/07-AdvancedUsage#Groups

Required tests for production

    // @group mandatory

Tests, which run in CI, but do not trigger a failure

    // @group essential

Features or tests currently in development
    
    // @group optional

You can add arbitrary groups to your tests.


### FAQ

#### Functional vs. acceptance tests
   
Due to limitations functional-testing should only be used for basic tests, see codeception.com
   
For Login, JavaScript, Cookies, Session, ... use acceptance tests. See commands `wait(1)`, `waitForElement(1)`.

> Note: In Codeception acceptance tests checks are performed *as seen* in the browser, for example you have to check for `MYLINK` if there's a `text-transform: uppercase` or a link `mylink`.

#### Detecting application type

Console vs. Web config

    $applicationType

#### Re-run failed tests

	codecept run -g failed

### Speedup MySQL

    db:
      tmpfs:
        - /var/lib/mysql


## Resources

- [Codeception Page load helper](https://gist.github.com/schmunk42/d0a388bc3562bf9bb8eafe153b9b7870)
