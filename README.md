# Blockee

![Image](files/graphics/exports/blockee-logo.png?raw=true)

Blockee is a experimental blockchain built in PHP. 

Blockee is an experiment to see if i could build some basic functionality of a blockchain in PHP in a small time frame. I took as little inspiration as possible by trying not to look at other people's implementations of a blockchain. Therefore, i may have built this in a non traditional way or wholly misunderstood basic concepts. The sources i used as full or partial inspiration are in the resources section of this file.

## Requirements

* PHP 7

## Features

* A PHP blockchain
    * Blocks can be added to a chain
    * Blocks can contain data
    * Blocks have a data limit
    * Blocks can be locked
    * The next block in the chain contains the hash of the previous block as its first data entry
    * The chain can be verified for integrity utilizing the hashes of the previous block
    * The chain is stored in memory for the lifetime of the object
    * It does not use a database
    * Built in an OOP fashion
    * The main class is essentially a facade to the rest of the library and can be easily changed or adapted.
    * The chain is a separate object to allow for future chain functionality

## Installation

You will need to git clone to install Blockee:

```
git clone https://github.com/artbyrab/blockee
```

## Usage

### Run composer in the Blockee folder /artbyrab/blockee

```
$ composer install
```

### Include composers autoload and autoload Blockee

```
require ('../vendor/autoload.php');
use artbyrab\blockee\Blockee;
```

### 2) Create a new Blockee

```
$blockee = new Blockee();
```

### 3) Add data to your Blockee

```
$blockee->addData("Transfer $10 from wallet a to wallet b");
$blockee->addData("Transfer $20 from wallet a to wallet b");
$blockee->addData("Transfer $10 from wallet c to wallet d");
$blockee->addData("Transfer $5 from wallet a to wallet d");
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
* Another video on blockchain
    * https://www.youtube.com/watch?v=fNRq07He7m8
* Finding the size of a PHP array without any loops
    * https://stackoverflow.com/questions/9018651/php-get-arrays-data-size
* Measure byte size in PHP
    * https://stackoverflow.com/questions/7568949/measure-string-size-in-bytes-in-php