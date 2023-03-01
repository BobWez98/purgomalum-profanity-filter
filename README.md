# Laravel PurgoMalum Client

[![Latest Version on Packagist](https://img.shields.io/packagist/v/bobwez98/purgomalum-profanity-filter.svg?style=flat-square)](https://packagist.org/packages/bobwez98/purgomalum-profanity-filter)
[![Total Downloads](https://img.shields.io/packagist/dt/bobwez98/purgomalum-profanity-filter.svg?style=flat-square)](https://packagist.org/packages/bobwez98/purgomalum-profanity-filter)

## Installation

You can install the package via composer:

```bash
composer require bobwez98/purgomalum-profanity-filter
```

## Usage

```php
use Bobwez98\ProfanityFilter\Facades\ProfanityFilter;

ProfanityFilter::json($text);

ProfanityFilter::plain($text);

ProfanityFilter::xml($text);

ProfanityFilter::containsprofanity($text);
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
