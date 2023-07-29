# laravel tagging package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/designbycode/laravel-taggable.svg?style=flat-square)](https://packagist.org/packages/designbycode/laravel-taggable)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/designbycode/laravel-taggable/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/designbycode/laravel-taggable/actions?
query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/designbycode/laravel-taggable/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.
com/designbycode/laravel-taggable/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/designbycode/laravel-taggable.svg?style=flat-square)](https://packagist.org/packages/designbycode/laravel-taggable)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.


## Installation

You can install the package via composer:

```bash
composer require designbycode/laravel-taggable
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="laravel-taggable-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-taggable-config"
```

This is the contents of the published config file:

```php
return [
];
```


## Usage

### Add Tags to Model
```php
$tag = new Designbycode\Taggable\Tag::create(['name' => 'Indigo']);

$post->tag($tag);

```

### Retrieve tags from model
```php
$post->tags();
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Claude Myburgh](https://github.com/designbycode)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
