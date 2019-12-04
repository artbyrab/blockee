<?php

use PHPUnit\Framework\TestCase;
use artbyrab\composy\Composy;

/**
 * Composy Test
 *
 * To run this test class only:
 *  - Navigate to: artbyrab/composy
 *  - Type: vendor/bin/phpunit --filter ComposyTest tests/ComposyTest.php
 *
 * @author artbyrab
 */
class ComposyTest extends TestCase
{
    public $composy;

    /**
     * Set up
     *
     * Performed before every test.
     */
    protected function setUp()
    {
        $this->composy = new Composy();
    }

    /**
     * Tear down
     *
     * Performed after every test.
     */
    protected function tearDown()
    {
        unset($this->composy);
    }

    /**
     * Test the get title function
     */
    public function testGetTitle()
    {
        $this->assertEquals($this->composy->getTitle(), "Composy");
    }

    /**
     * Test the get title function
     */
    public function testGetDescription()
    {
        $this->assertEquals($this->composy->getDescription(), "Composy is a base composer package template for PHP. You can use Composy to easily build new composer compatible packages.");
    }
}
