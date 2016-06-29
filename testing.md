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
