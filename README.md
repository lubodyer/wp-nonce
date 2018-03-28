# wp-nonces
This package provides OOP functionality for WordPress nonce creation and verification.

## Installation

Clone the package from github:

```sh
$ git clone https://github.com/lubodyer/wp-nonces.git
```

Install with the composer:

```sh
$ cd wp-nonces
$ composer install
```

## Usage
For information on WordPress Nonces see the [Codex](https://codex.wordpress.org/WordPress_Nonces).

```php
<?php

use \LuboDyer\WpNonces\WpNonce;

$nonce = new WpNonce('action');
$value = (string) $nonce;
$url = $nonce->toURL();
$inputs = $nonce->toHTML();
$is_valid = $nonce->validate($value);
```


## Run the tests
To run the tests execute:

```sh
$ vendor/bin/phpunit
```
