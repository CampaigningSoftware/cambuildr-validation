# CamBuildr Validation Rules

[![Latest Version on Packagist](https://img.shields.io/packagist/v/spatie/laravel-validation-rules.svg?style=flat-square)](https://packagist.org/packages/spatie/laravel-validation-rules)
[![Code coverage](https://scrutinizer-ci.com/g/spatie/laravel-validation-rules/badges/coverage.png)](https://scrutinizer-ci.com/g/spatie/laravel-validation-rules)
[![Build Status](https://img.shields.io/travis/spatie/laravel-validation-rules/master.svg?style=flat-square)](https://travis-ci.org/spatie/laravel-validation-rules)
[![StyleCI](https://github.styleci.io/repos/152587206/shield?branch=master)](https://github.styleci.io/repos/152587206)

Validation rules that are used by the CamBuildr

## Installation

Installation is possible via composer

```bash
composer require campaigningbureau/cambuildr-validation
```

The package will automatically register itself.

## Available Validation Rules

- [`EmailCambuildr`](#emailcambuildr)

### `EmailCambuildr`

Determine if the given email address is valid for the CamBuildr.

## Testing

```bash
composer test
```