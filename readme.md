# CamBuildr Validation Rules

[![Latest Version on Packagist](https://img.shields.io/packagist/v/campaigningbureau/cambuildr-validation?style=flat-square)](https://img.shields.io/packagist/v/campaigningbureau/cambuildr-validation?style=flat-square)

Validation rules that are used by the CamBuildr ([https://www.cambuildr.com](https://www.cambuildr.com))

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

## API Routes

The package provides GET-Routes to perform validation through API calls.
Route prefix and middleware can be configured when publishing the config:

```bash
php artisan vendor:publish --provider="CampaigningBureau\CambuildrValidation\CambuildrValidationServiceProvider" --tag="config"
```

## Testing

```bash
composer test
```