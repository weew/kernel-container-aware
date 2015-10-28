# Kernel container integration

[![Build Status](https://travis-ci.org/weew/php-kernel-container-aware.svg?branch=master)](https://travis-ci.org/weew/php-kernel-container-aware)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/weew/php-kernel-container-aware/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/weew/php-kernel-container-aware/?branch=master)
[![Coverage Status](https://coveralls.io/repos/weew/php-kernel-container-aware/badge.svg?branch=master&service=github)](https://coveralls.io/github/weew/php-kernel-container-aware?branch=master)
[![License](https://poser.pugx.org/weew/php-kernel-container-aware/license)](https://packagist.org/packages/weew/php-kernel-container-aware)

## Table of contents


## Introduction

This package integrates [weew/php-kernel](https://github.com/weew/php-kernel) with [weew/php-container](https://github.com/weew/php-container) and and allows providers to rely on dependency injection and sharing of data trough the container.

## Usage

Simply create an instance of `ContainerAwareKernel` instead of the `Kernel` and pass in an instance of `IContainer`.

```php
$kernel = new ContainerAwareKernel(new Container());
```
