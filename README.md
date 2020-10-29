# RemotelabzMessageBundle

![GitHub Workflow Status (branch)](https://img.shields.io/github/workflow/status/crestic-urca/remotelabz-network-bundle/Tests/master) [![codecov](https://img.shields.io/codecov/c/github/crestic-urca/remotelabz-network-bundle)](https://codecov.io/gh/crestic-urca/remotelabz-network-bundle)

RemotelabzMessageBundle is a bundle used by RemoteLabz to share messages between remotelabz components.

Installation
============

Make sure Composer is installed globally, as explained in the
[installation chapter](https://getcomposer.org/doc/00-intro.md)
of the Composer documentation.

Applications that use Symfony Flex
----------------------------------

Open a command console, enter your project directory and execute:

```console
$ composer require crestic-urca/remotelabz-network-bundle
```

Applications that don't use Symfony Flex
----------------------------------------

### Step 1: Download the Bundle

Open a command console, enter your project directory and execute the
following command to download the latest stable version of this bundle:

```console
$ composer require crestic-urca/remotelabz-network-bundle
```

### Step 2: Enable the Bundle

Then, enable the bundle by adding it to the list of registered bundles
in the `config/bundles.php` file of your project:

```php
// config/bundles.php

return [
    // ...
    Remotelabz\Message\RemotelabzMessageBundle::class => ['all' => true],
];
```