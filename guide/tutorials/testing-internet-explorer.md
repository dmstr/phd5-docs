# Testing with Inernet Explorer

https://github.com/SeleniumHQ/selenium/wiki/InternetExplorerDriver

http://selenium-release.storage.googleapis.com/index.html

Extract driver to "Windows" or another `PATH`

    cmd
    cd Downloads
    java -jar selenium-server-standalone-2.53.1.jar

> Add Host-Only network
> Find IP with `ipconfig` in Windows command prompt

In elevated (as Administrator) command prompt

### 32 bit
REG ADD "HKLM\SOFTWARE\Microsoft\Internet Explorer\Main\FeatureControl\FEATURE_BFCACHE" /v iexplore.exe /t REG_DWORD /d 0

### 64 bit
REG ADD "HKLM\SOFTWARE\Wow6432Node\Microsoft\Internet Explorer\Main\FeatureControl" /v FEATURE_BFCACHE /t REG_DWORD /d 0



    config:
        WebDriver:
            host: 192.168.99.1
            port: 14444
            url: http://10.5.112.100:32898/
            browser: 'internet explorer'
            window_size: 1024x768
            restart: restart
            