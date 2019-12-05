<?php

use PHPUnit\Framework\TestCase;
use artbyrab\blockee\Hash;

/**
 * Hash Test
 *
 * To run this test class only:
 *  - Navigate to: artbyrab/blockee
 *  - Type: vendor/bin/phpunit --filter HashTest tests/HashTest.php
 *
 * @author artbyrab
 */
class HashTest extends TestCase
{
    /**
     * Test the stringHash function
     */
    public function testStringHash()
    {
        $string = "test string to hash";

        $this->assertEquals(
            Hash::stringHash($string), 
            "f20da89ff9c8ffe8590ecbf0996ba347"
        );
    }
}
