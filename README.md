# Blockee

Blockee is a blockchain built in PHP. 

I did this as a quick experiment to see if i could build some basic functionality of a blockchain in PHP in a small timeframe. I took as little inspiration as possible by trying not to look at other people's implementations of a blockchain. Therefore, i may have built this in a non traditional way. The sources i used as full or partial inspiration are in the resources section of this file.

## Requirements

* PHP 7

## Features

* A PHP blockchain
    * Blocks can be added to a chain
    * Blocks can contain data
    * Blocks have a data limit
    * Blocks can be locked
    * The next block in the chain contains the hash of the previous block as its first data entry
    * The chain can be verified for integrity
    * The chain is stored in memory for the lifetime of the object
    * It does not use a database
    * Built in an OOP fashion
    * The main class is essentially a facade to the rest of the library and can be easily changed or adapted.

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