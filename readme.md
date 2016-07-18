# Kernel container integration

[![Build Status](https://img.shields.io/travis/weew/kernel-container-aware.svg)](https://travis-ci.org/weew/kernel-container-aware)
[![Code Quality](https://img.shields.io/scrutinizer/g/weew/kernel-container-aware.svg)](https://scrutinizer-ci.com/g/weew/kernel-container-aware)
[![Test Coverage](https://img.shields.io/coveralls/weew/kernel-container-aware.svg)](https://coveralls.io/github/weew/kernel-container-aware)
[![Version](https://img.shields.io/packagist/v/weew/kernel-container-aware.svg)](https://packagist.org/packages/weew/kernel-container-aware)
[![Licence](https://img.shields.io/packagist/l/weew/kernel-container-aware.svg)](https://packagist.org/packages/weew/kernel-container-aware)

## Table of contents

- [Installation](#installation)
- [Introduction](#introduction)
- [Usage](#usage)

## Installation

`composer require weew/kernel-container-aware`

## Introduction

This package integrates [weew/kernel](https://github.com/weew/kernel) with [weew/container](https://github.com/weew/container) and allows providers to rely on dependency injection and sharing of data trough the container.

## Usage

To create a container aware `Kernel` simply pass in an instance of `IContainer`.

```php
$kernel = new Weew\Kernel\ContainerAware\Kernel(new Container());
```

Note: Kernel will automatically share instances of providers in the container.
