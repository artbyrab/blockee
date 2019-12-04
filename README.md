# Blockee

This is a brief description of Blockee

## Requirements

* PHP 7

## Features

* A PHP blockchain

## Installation

The reccomended way to install is via Composer.
Either install in the project via terminal
```
$ composer require artbyrab/blockee:~1.0
```

or add it to your composer.json file
```
"artbyrab/blockee": "~1.0"
```

## Usage

Using your

### 1) Include Blockee into your app:
```
use artbyrab\blockee\Blockee;
```

# Resources

* [Extending Guide](documents/extending.md)
* [Running Tests](documents/running-tests.md)
* [Code Checks](documents/code-checks.md)
* Tutorial on creating a blockchain in Java by IvanOnTech
    * https://www.youtube.com/watch?v=baJYhYsHkLM
* Tutorial on blockchain giving me ideas as to how it is actually built
    * https://jeiwan.net/posts/building-blockchain-in-go-part-4/
* Video on blockchain
    * https://www.youtube.com/watch?v=fNRq07He7m8
* A good tutorial
    * https://www.youtube.com/watch?v=fNRq07He7m8
* Finding the size of a PHP array without any loops
    * https://stackoverflow.com/questions/9018651/php-get-arrays-data-size

## Coding a simple blockchain

* Blockchain
    * Blocks are added
    * This affects the overall hash of the blockchain
    * The first hash in a new block is the total hash of the previous block
    * But it could be that a single transaction
    * 