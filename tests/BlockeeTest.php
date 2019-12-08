<?php

use PHPUnit\Framework\TestCase;
use artbyrab\blockee\Blockee;

/**
 * Blockee Test
 *
 * To run this test class only:
 *  - Navigate to: artbyrab/blockee
 *  - Type: vendor/bin/phpunit --filter BlockeeTest tests/BlockeeTest.php
 *
 * @author artbyrab
 */
class BlockeeTest extends TestCase
{
    public $blockee;

    /**
     * Set up
     *
     * Performed before every test.
     */
    protected function setUp()
    {
        $this->blockee = new Blockee();
    }

    /**
     * Tear down
     *
     * Performed after every test.
     */
    protected function tearDown()
    {
        unset($this->blockee);
    }

    /**
     * Test the A function
     */
    public function testA()
    {
        $this->assertEquals("Result", "Result");
    }

    /**
     * Test the B function
     */
    public function testB()
    {
        $this->assertEquals("Result", "Result");
    }
}
