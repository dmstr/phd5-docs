# Testing *Chrome*


Docker compose config:

    chrome:
        # 3.0.0-dubnium
        privileged: true
        image: selenium/standalone-chrome-debug:3.0.0-dubnium
        ports:
          - '4444'
          - '5900'
        # workaround for Docker Beta, see https://github.com/SeleniumHQ/docker-selenium/issues/227#issuecomment-224865735
        dns: 8.8.4.4
        environment:
          - no_proxy=localhost
        # workaround for https://github.com/elgalu/docker-selenium/issues/20#issuecomment-133011186
        volumes:
          - /dev/shm:/dev/shm
     
Makefile eg. `open-chrome`
     
	$(OPEN_CMD) vnc://x:secret@$(DOCKER_HOST_IP):$(shell $(DOCKER_COMPOSE) port chrome 5900 | sed 's/[0-9.]*://')


# Testing with Internet Explorer or Edge

## Download

- Download Windows VM from http://modern.ie
- Download and install *Java* in Windows VM https://java.com/de/download/
- Download *selenium-standalone* and `IEDriver.exe` from http://selenium-release.storage.googleapis.com/index.html
 - Extract driver to "Windows" or another directory `PATH`

## Setup

> ### Virtualbox
> Add Host-Only network and find your IP with `ipconfig` in Windows command prompt

For IE11, add registry keys

### 32 bit

    REG ADD "HKLM\SOFTWARE\Microsoft\Internet Explorer\Main\FeatureControl\FEATURE_BFCACHE" /v iexplore.exe /t REG_DWORD /d 0

### 64 bit

    REG ADD "HKLM\SOFTWARE\Wow6432Node\Microsoft\Internet Explorer\Main\FeatureControl" /v FEATURE_BFCACHE /t REG_DWORD /d 0

See also http://elgalu.github.io/2014/run-protractor-against-internet-explorer-vm/ for setting IE options in GUI.

## Usage

Run in elevated (as Administrator) command prompt to start to selenium server

    cmd
    cd Downloads
    java -jar selenium-server-standalone-2.53.1.jar

### Selenium config for Codeception

    config:
        WebDriver:
            host: 192.168.99.1
            port: 14444
            url: http://192.168.99.1:10081/
            browser: 'internet explorer'
            window_size: 1024x768
            restart: restart

> :bulb: Example uses forwarded ports on the host machine to Selenium on the Windows VM and the web server used for testing in Docker.

## Examples

Use locator to find elements in e2e tests

        $node = Locator::contains('span', $this->uniqid);
        $I->click($node, '.kv-tree-container');


## Resources

- https://github.com/SeleniumHQ/selenium/wiki/InternetExplorerDriver
            
