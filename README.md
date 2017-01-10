- [Introduction](#a0)
- [License](#a1)
- [Installation](#a2)
- [Synopsis](#a3)


# <a name="a0"></a>Introduction

This package contains (PHPUnit)[https://phpunit.de/] assertions for the [Slim framework](https://www.slimframework.com/).

> Please note that this package is a work in progress, since new utilities will be added.

# <a name="a1"></a>License

This code is published under the following license:

[Creative Commons Attribution 4.0 International Public License](https://creativecommons.org/licenses/by/4.0/legalcode)

See the file [LICENSE.TXT](LICENSE.TXT)

# <a name="a2"></a>Installation

From the command line:

    composer require dbeurive/slim-phpunit

Or, from within the file `composer.json`:

    "require": {
        "dbeurive/slim-phpunit": "*"
    }

# <a name="a3"></a>Synopsis

```php
class YourClassTest extends \dbeurive\Slim\PHPUnit\TestCase
{
    ...
}
```

See the following files for a complete list of assertions:

* [TraitAssertResponse](src/PHPUnit/TraitAssertResponse.php)

See the [unit tests](tests/TraitAssertResponseTest.php) for examples.
