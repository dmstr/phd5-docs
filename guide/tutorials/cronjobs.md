# Cronjobs

Cron runs in the PHP container, and the Docker enviornment is exported to a file `/root/export-env` on container startup.

Example job:

```
#!/bin/bash
. /root/export-env
sleep $(unique-number.sh 600) && /usr/local/bin/php /app/yii audit/cleanup --interactive=0 --entry --age=7
```