# idkollen
[![License](https://img.shields.io/badge/license-MIT-blue.svg)](https://github.com/elseifab/idkollen.git)
[![Build Status](https://travis-ci.org/elseifab/idkollen.svg?branch=develop)](https://travis-ci.org/elseifab/idkollen)
[![GitHub release](https://img.shields.io/github/release/elseifab/idkollen.svg)](https://github.com/elseifab/idkollen/archive/develop.zip)

Tillägg för att underlätta integration IDkollen mot WordPress-konton för inloggning via BankID

**WORK IN PROGRESS**

## Versioner
Inga releaser/versioner av detta tillägg finns ännu...

### Utvecklingsmiljö
Roots Bedrock i repo elseifab/idkollen-dev används som utvecklingsmiljö för detta tillägg.

## Tester

Automatiska tester görs via Travis här: [https://travis-ci.org/elseifab/idkollen](https://travis-ci.org/elseifab/idkollen)

### PHPUnit
Obs! `composer update` före enhetstestning!

We run docker containers to unit tests in real WordPress (no mock).
[https://github.com/frozzare/docker-wptest](https://github.com/frozzare/docker-wptest)
[https://github.com/wpup/test-suite](https://github.com/wpup/test-suite)
Special thanks to Frozzare!

To initialize tests with docker, run: `docker run --name mysql -e MYSQL_ALLOW_EMPTY_PASSWORD=true -d mysql:5.7`

To run tests, in the plugin folder, eg: `docker run -e WP_VERSION=4.9 --rm -v $(pwd):/opt --link mysql frozzare/wptest:5.6 vendor/bin/phpunit`

PHPUnit testing with docker:
[https://youtu.be/9CEoapNrrSc](Video)
