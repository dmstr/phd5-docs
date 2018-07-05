# Image proxy

TBD

## docker-compose.yml

> @since 5.1.0-rc2

{{ image(image_url, ‚x200‘) }}

https://github.com/willnorris/imageproxy#examples

----

`IMAGEPROXY_SIGNATURE_KEY`

----

    /img/{{ app.settings.get('imgBaseUrl', 'app.frontend') }}/1600x,q60/{{ app.settings.get('imgHostPrefix', 'app.frontend') }}{{ imageSource }}{{ app.settings.get('imgHostSuffix', 'app.frontend') }}

