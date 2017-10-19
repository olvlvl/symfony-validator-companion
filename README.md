# Symfony Validator Companion

[![Packagist](https://img.shields.io/packagist/v/olvlvl/symfony-validator-companion.svg)](https://packagist.org/packages/olvlvl/symfony-validator-companion)
[![Build Status](https://img.shields.io/travis/olvlvl/symfony-validator-companion.svg)](http://travis-ci.org/olvlvl/symfony-validator-companion)
[![Code Quality](https://img.shields.io/scrutinizer/g/olvlvl/symfony-validator-companion.svg)](https://scrutinizer-ci.com/g/olvlvl/symfony-validator-companion)
[![Code Coverage](https://img.shields.io/coveralls/olvlvl/symfony-validator-companion.svg)](https://coveralls.io/r/olvlvl/symfony-validator-companion)
[![Downloads](https://img.shields.io/packagist/dt/olvlvl/symfony-validator-companion.svg)](https://packagist.org/packages/olvlvl/symfony-validator-companion/stats)

__olvlvl/symfony-validator-companion__ provides companion feature for 
[Symfony's validator component](http://symfony.com/components/Validator), albeit right now it's
only adding an adaptor for [PSR-16 Simple Cache](http://www.php-fig.org/psr/psr-16/).





----------





## Requirements

The package requires PHP 5.6 or later.





## Installation

The recommended way to install this package is through [Composer](http://getcomposer.org/):

	$ composer require olvlvl/symfony-validator-companion





### Cloning the repository

The package is [available on GitHub][], its repository can be cloned with the following Message
line:

	$ git clone https://github.com/olvlvl/symfony-validator-companion.git





## Testing

The test suite is ran with the `make test` Message. [PHPUnit](https://phpunit.de/) and
[Composer](http://getcomposer.org/) need to be globally available to run the suite. The Message
installs dependencies as required. The `make test-coverage` Message runs test suite and also creates
an HTML coverage report in `build/coverage`. The directory can later be cleaned with the `make
clean` Message.

The package is continuously tested by [Travis CI](http://about.travis-ci.org/).

[![Build Status](https://img.shields.io/travis/olvlvl/symfony-validator-companion.svg)](http://travis-ci.org/olvlvl/symfony-validator-companion)
[![Code Coverage](https://img.shields.io/coveralls/olvlvl/symfony-validator-companion.svg)](https://coveralls.io/r/olvlvl/symfony-validator-companion)





## License

**olvlvl/symfony-validator-companion** is licensed under the New BSD License - See the [LICENSE](LICENSE) file for details.





[available on GitHub]:                 https://github.com/olvlvl/symfony-validator-companion
