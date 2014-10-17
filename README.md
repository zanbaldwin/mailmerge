Mail Merge
==========

<!--
    Guidelines for a Successful README
    ==================================
    - Name of the projects and all sub-modules and libraries (sometimes they are
      named different and very confusing to new users).
    - Descriptions of all the project, and all sub-modules and libraries.
    - 5-line code snippet on how its used (if it's a library).
    - Copyright and licensing information (or "Read LICENSE").
    - Instruction to grab the documentation.
    - Instructions to install, configure, and to run the programs.
    - Instruction to grab the latest code and detailed instructions to build it
      (or quick overview and "Read INSTALL").
    - List of authors or "Read AUTHORS".
    - Instructions to submit bugs, feature requests, submit patches, join
      mailing list, get announcements, or join the user or dev community in
      other forms.
    - Other contact info (email address, website, company name, address, etc).
    - A brief history if it's a replacement or a fork of something else.
    - Legal notices (crypto stuff).
-->

What is Mail Merge?
-------------------

Mail Merge is a PHP library for document generation with mail-merge support (using data-providers such as a database
entities, CSV files, spreadsheets, etc). It utilizes template providers, transformers, placeholder collections, and
parser/generator engines.


Requirements
------------

Only PHP versions 5.4 and above are supported.

Installation
------------

The recommended installation method is through [Composer](https://getcomposer.org), a dependency management library for PHP. If you have [cURL](http://curl.haxx.se) and [PHP](http://php.net/) installed, getting Composer is as easy as:

```bash
curl -s https://getcomposer.org/installer | php
```

Next, require [`mynameiszanders/mailmerge`](https://packagist.org/mynameiszanders/mailmerge) as a dependency of your project by running:

```bash
php composer.phar require mynameiszanders/mailmerge:*
```

Or adding it manually to your `composer.json` file:

```json
{
    "require": {
        "mynameiszanders/mailmerge": "*"
    }
}
```

Quick Start
-----------

For the current `dev-develop` version of this library, an example script can be found at [`docs/example.php`](docs/example.php).
The example script is *not* valid PHP but provides commentary on how the library is envisioned.

Running Tests
-------------

Run [PHPUnit](https://phpunit.de/ "Programmer-oriented testing framework for PHP.") from the project's root directory.

```bash
$ php ./vendor/bin/phpunit
```
