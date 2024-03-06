# PHP Bergen 2024 How to get started with PHPUnit testing in PHP

## demo application

Example of how little you actually need to run unit tests in PHP. `/demo` is a stand alone example and needs nothing more that what this directory contains to run. Copy this directory out of the repository to do your stand-alone tests.

To run:
```bash
cd demo
./vendor/bin/phpunit CalculatorTest.php
```

For a better looking test run, try:

```bash
./vendor/bin/phpunit CalculatorTest.php --color --testdox
```

## Member application

More real application example, have a database, adds a member every time the application is run.

```shell
./vendor/bin/phpunit
```
