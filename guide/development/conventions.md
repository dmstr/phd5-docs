## Code conventions

Branches
--------

The phd repository contains the following main branches:

- master (development, unstable)
- 4.0 (alpha, beta, RC, stable releases)
- 3.0 (alpha, beta, RC, stable releases)


- DO not add secrets....

### Source-Code

- all code, variables, tables, databases, constants - everything in the source code **MUST BE** written and named in English

#### PHP

- PSR-2

##### Console

end of command:

    $this->stdout("Done.\n");    


#### LESS

- CSS framework core classes, eg. `container`, `row`, `col-*` **MUST NOT** be modified

#### docker-compose

##### Production

- nginx web services in production **SHOULD** define a `VIRTUAL_HOST` environment variable, which is used by the reverse-proxy


### Documentation

- `README.md` in project root (max. 300 lines)
- `docs/` detailed project documentation
  - `docs/README.md` index
  - `docs/troubleshooting.md` "Esoteric features"
- Source-code docblocks
