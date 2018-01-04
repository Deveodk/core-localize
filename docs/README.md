[![Coverage Status](https://travis-ci.org/Deveodk/core-localize.svg?branch=master)](https://travis-ci.org/Deveodk/core-localize.svg?branch=master)
[![Coverage Status](https://coveralls.io/repos/github/Deveodk/core-localize/badge.svg?branch=master)](https://coveralls.io/github/Deveodk/core-localize?branch=master)
[![Coding Standards](https://img.shields.io/badge/cs-PSR--2--R-yellow.svg)](https://github.com/php-fig-rectified/fig-rectified-standards)
[![Latest Stable Version](https://poser.pugx.org/deveodk/core-localize/v/stable)](https://packagist.org/packages/deveodk/core-localize)
[![Total Downloads](https://poser.pugx.org/deveodk/core-localize/downloads)](https://packagist.org/packages/deveodk/core-localize)
[![License](https://poser.pugx.org/deveodk/core-localize/license)](https://packagist.org/packages/deveodk/core-localize)

## core-localize

> To be used explicitly with Core by Deveo

## Requirements

This package requires the following:

* Composer
* Core by Deveo
* Laravel 5.5+
* PHP 7.1+

## Installation

Installation via Composer:

```bash
composer require deveodk/core-localize
```

Setup the ``` LocalizationMiddleware ``` in kernel HTTP to automaticly localize using browser headers.


## Disclaimer

Core components are an opinionated approach to designing modern Application Programming Interfaces (APIs). Every component is specifically designed to be used with Core by Deveo and is therefore not compatible with other frameworks such as standard Laravel.

## What it does


This package helps us by localizing datetime stamps and setting the correct language for the user.


## DateTime Localization

The package includes an helper to automaticly convert database ``` UTC ``` dates into the default or given locale.


```php
$localizedDateTime = localize(new DateTime());
```

It also supports hard setting timestamp

```php
$localizedDateTime = localize(new DateTime, 'Europe\Copenhagen');
```

## Manually setting language

When requesting an endpoint with the middleware simply set an ```accept-language```


[![Deveo footer](https://s3-eu-west-1.amazonaws.com/rk-solutions/github_footer.png)](https://deveo.dk)