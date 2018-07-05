# wkhtmltopdf

### Debian

Install system packages

```dockerfile
RUN apt-get update && \
    apt-get \
        install -y \
            wkhtmltopdf \
            xvfb && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*
```
Mandatory confiugration for PHP wrapper command

```
$pdf = new Pdf([
    ...
    'commandOptions' => [
        'enableXvfb' => true,
    ]
]);
```
