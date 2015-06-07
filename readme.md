# Acme version 0.0.0

Dependencies:

- nodejs
- php5
- php5-curl
- php5-xsl
- composer

To provision:

- ./provision.sh

To build:

- node_modules/.bin/gulp

To bump the version:

- node_modules/.bin/gulp version

To generate documentation:

- vendor/bin/phpdox