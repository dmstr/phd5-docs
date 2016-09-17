Features
========

### Code

- minimalistic, environment variables based configuration
- Docker support, runs on *PHP* 5 or 7
- Support for efficient building and testing on *GitLab CI*
- using stable PHP package versions, embracing semver
- continuous integration support
- application versioning

### Frontend

- full responsive Bootstrap 3 theme

### Backend

- AdminLTE theme
- application backend dashboard ([screenshots](https://plus.google.com/+phd/posts/7y1TkmmsrcN?pid=6070967303804764434&oid=114873431066202526630))
- user management (dektrium/yii2-user)
- role-based access control (dektrium/yii2-rbac)
- runtime settings
- I18N
- (dmstr/yii2-pages-module)
- extended model & crud code generators (schmunk42/yii2-giiant)
- markdown documentation in application backend (schmunk42/yii2-markdocs-module)

### Console

- extended database migration support
- fully non-interactive deployment to work on PaaS
- CLI command for application maintenance tasks
- containerized Yii 2.0 Codeception test-suites 

### Docker images

- composer
- asset-plugin
- codeception
- fast builds through optimized Docker image layers and composer caches
- LESS-compiler and closure-compiler on PHP-CLI and PHP-FPM for seamless integration with Yii 2.0 Framework asset-bundles 
- xDebug
- APCu support
- npm 

### Extras

- shell file linting



### Comparision

| Template | src LOC | Services | Extensions |
|----------|---------|----------|------------|
| dmstr/yii2-app | ~100 | 0 | 0 
| dmstr/phd5-app | ~350 | 1 | 8
| dmstr/ee-app | ~450 | 4 | 20 
| codemix/ | ~1000 | 0 | 0 


Source
———

PHP Image für Yii2 (runtime only)
https://git.hrzg.de/dmstr/docker-php-yii2

Dockerized Yii2 App (100 lines, no db)
https://git.hrzg.de/dmstr/docker-yii2-app

Phundament 5 (nur Open-Source)
https://git.hrzg.de/dmstr/docker-phd-app

Entrprise-Edition (inkl. Closed Source)
https://git.hrzg.de/hrzg/docker-ee-app

Commercial/Closed source:
https://git.hrzg.de/groups/hrzg


---

https://git.hrzg.de/hrzg/yii2-widgets2-module

https://github.com/twbs/bootstrap/blob/master/less/variables.less

https://github.com/thomaspark/bootswatch

https://github.com/jdorn/json-editor