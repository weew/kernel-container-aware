# Kernel container integration

[![Build Status](https://img.shields.io/travis/weew/php-kernel-container-aware.svg)](https://travis-ci.org/weew/php-kernel-container-aware)
[![Code Quality](https://img.shields.io/scrutinizer/g/weew/php-kernel-container-aware.svg)](https://scrutinizer-ci.com/g/weew/php-kernel-container-aware)
[![Test Coverage](https://img.shields.io/coveralls/weew/php-kernel-container-aware.svg)](https://coveralls.io/github/weew/php-kernel-container-aware)
[![Dependencies](https://img.shields.io/versioneye/d/php/weew:php-kernel-container-aware.svg)](https://versioneye.com/php/weew:php-kernel-container-aware)
[![Version](https://img.shields.io/packagist/v/weew/php-kernel-container-aware.svg)](https://packagist.org/packages/weew/php-kernel-container-aware)
[![Licence](https://img.shields.io/packagist/l/weew/php-kernel-container-aware.svg)](https://packagist.org/packages/weew/php-kernel-container-aware)

## Table of contents

- [Installation](#installation)
- [Introduction](#introduction)
- [Usage](#usage)

## Installation

`composer require weew/php-kernel-container-aware`

## Introduction

This package integrates [weew/php-kernel](https://github.com/weew/php-kernel) with [weew/php-container](https://github.com/weew/php-container) and allows providers to rely on dependency injection and sharing of data trough the container.

## Usage

Simply create an instance of container aware `Kernel` and pass in an instance of `IContainer`.

```php
$kernel = new Weew\Kernel\ContainerAware\Kernel(new Container());
```

Note: Kernel will automatically share instances of providers in the container.
