<?php

use PHPUnit\Framework\TestCase;
use artbyrab\blockee\GenesisBlock;
use artbyrab\blockee\Block;

/**
 * GenesisBlock Test
 *
 * To run this test class only:
 *  - Navigate to: artbyrab/blockee
 *  - Type: vendor/bin/phpunit --filter GenesisBlockTest tests/GenesisBlockTest.php
 *
 * @author artbyrab
 */
class GenesisBlockTest extends TestCase
{
    /**
     * @var object
     */
    public $genesisBlock;

    /**
     * Set up
     *
     * Performed before every test.
     */
    protected function setUp()
    {
        $this->genesisBlock = new GenesisBlock();
    }

    /**
     * Tear down
     *
     * Performed after every test.
     */
    protected function tearDown()
    {
        unset($this->genesisBlock);
    }

    /**
     * Test the __construct function
     */
    public function testConstruct()
    {
        $this->assertInstanceOf(GenesisBlock::class, $this->genesisBlock);
        $this->assertInstanceOf(Block::class, $this->genesisBlock->getBlock());
        $this->assertEquals(Block::LOCKED_TRUE, $this->genesisBlock->getBlock()->isLocked());
        $this->assertEquals("0be057dceb143b8f1a14d76ed6738009", $this->genesisBlock->getBlock()->getData()[0]);
        $this->assertEquals("Initial genesis block data", $this->genesisBlock->getBlock()->getData()[1]);
    }

    /**
     * Test the __construct function with the data parameter set.
     */
    public function testConstructWithDataParam()
    {
        $genesisBlock = new GenesisBlock("Unique Inital Data");

        $this->assertInstanceOf(GenesisBlock::class, $genesisBlock);
        $this->assertInstanceOf(Block::class, $genesisBlock->getBlock());
        $this->assertEquals(Block::LOCKED_TRUE, $this->genesisBlock->getBlock()->isLocked());
        $this->assertEquals("f204f22e612b5812c0c9cf3341de2fc9", $genesisBlock->getBlock()->getData()[0]);
        $this->assertEquals("Unique Inital Data", $genesisBlock->getBlock()->getData()[1]);
    }

    /**
     * Test the getBlock function
     */
    public function testGetBlock()
    {
        $this->assertInstanceOf(Block::class, $this->genesisBlock->getBlock());
    }
}
