# Running Application Tests

This is the quick-start to CodeIgniter testing. Its intent is to describe what
it takes to set up your application and get it ready to run unit tests.
It is not intended to be a full description of the test features that you can
use to test your application. Those details can be found in the documentation.

## Resources

* [CodeIgniter 4 User Guide on Testing](https://codeigniter4.github.io/userguide/testing/index.html)
* [PHPUnit docs](https://phpunit.de/documentation.html)
* [Any tutorials on Unit testing in CI4?](https://forum.codeigniter.com/showthread.php?tid=81830)

## Requirements

It is recommended to use the latest version of PHPUnit. At the time of this
writing we are running version 9.x. Support for this has been built into the
**composer.json** file that ships with CodeIgniter and can easily be installed
via [Composer](https://getcomposer.org/) if you don't already have it installed globally.

```console
> composer install
```

If running under macOS or Linux, you can create a symbolic link to make running tests a touch nicer.

```console
> ln -s ./vendor/bin/phpunit ./phpunit
```

You also need to install [XDebug](https://xdebug.org/docs/install) in order
for code coverage to be calculated successfully. After installing `XDebug`, you must add `xdebug.mode=coverage` in the **php.ini** file to enable code coverage.

## Setting Up

A number of the tests use a running database.
In order to set up the database edit the details for the `tests` group in
**app/Config/Database.php** or **phpunit.xml**.
Make sure that you provide a database engine that is currently running on your machine.
More details on a test database setup are in the
[Testing Your Database](https://codeigniter4.github.io/userguide/testing/database.html) section of the documentation.

## Running the tests

The entire test suite can be run by simply typing one command-line command from the main directory.

```console
> ./phpunit
```

If you are using Windows, use the following command.

```console
> vendor\bin\phpunit
```

You can limit tests to those within a single test directory by specifying the
directory name after phpunit.

```console
> ./phpunit app/Models
```

## Generating Code Coverage

To generate coverage information, including HTML reports you can view in your browser,
you can use the following command:

```console
> ./phpunit --colors --coverage-text=tests/coverage.txt --coverage-html=tests/coverage/ -d memory_limit=1024m
```

This runs all of the tests again collecting information about how many lines,
functions, and files are tested. It also reports the percentage of the code that is covered by tests.
It is collected in two formats: a simple text file that provides an overview as well
as a comprehensive collection of HTML files that show the status of every line of code in the project.

The text file can be found at **tests/coverage.txt**.
The HTML files can be viewed by opening **tests/coverage/index.html** in your favorite browser.

## PHPUnit XML Configuration

The repository has a ``phpunit.xml.dist`` file in the project root that's used for
PHPUnit configuration. This is used to provide a default configuration if you
do not have your own configuration file in the project root.

The normal practice would be to copy ``phpunit.xml.dist`` to ``phpunit.xml``
(which is git ignored), and to tailor it as you see fit.
For instance, you might wish to exclude database tests, or automatically generate
HTML code coverage reports.

## Test Cases

Every test needs a *test case*, or class that your tests extend. CodeIgniter 4
provides a few that you may use directly:
* `CodeIgniter\Test\CIUnitTestCase` - for basic tests with no other service needs
* `CodeIgniter\Test\DatabaseTestTrait` - for tests that need database access

Most of the time you will want to write your own test cases to hold functions and services
common to your test suites.

## Creating Tests

All tests go in the **tests/** directory. Each test fil﻿<?xml version="1.0" encoding="utf-8" ?>
<Product
  xmlns="http://schemas.microsoft.com/developer/2004/01/bootstrapper"
  ProductCode="Microsoft.SqlServer.SQLSysClrTypes.12.0.x86"
>
  <RelatedProducts>
    <EitherProducts>
      <DependsOnProduct Code=".NETFramework,Version=v4.0,Profile=Client" />
      <DependsOnProduct Code=".NETFramework,Version=v4.0" />
      <DependsOnProduct Code="Microsoft.Net.Framework.3.5.SP1" />
    </EitherProducts>
  </RelatedProducts>

  <PackageFiles CopyAllPackageFiles="false">
    <PackageFile
      Name="SQLSysClrTypes.msi"
      HomeSite="SQLSysClrTypesMsi"
      PublicKey="3082010A0282010100C2DED6CFE2B77F1165FFB363A9F372B9F124EB5FA41CB24459EB6F9CFB70DB65699AAB90315EFFDE2B6411F5ED6CE9002182C390CC8219A3E39963658ABDD3D5FB20A3E0197FB88D3C6AFEC8128DE5D339EF4D4E3E86964C11B111849B2798883B2DD47D18F305E0AD4B043E437519E646C48C9DDB89D82487BEF44727BF6D8DDC78B9C365A16F37EABC71A69DAC8E8F8D88917EA83725D98124A988F46346EABB20C9012FD88E0CD9D9EDE036FB64684DFC422F9120A9089A284A47A8F0FED9B27AFDD8E83801BC8145AB3AE81A2ADD39833F07DBD8E18FFC392C369E019FEF6