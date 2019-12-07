<?php

use PHPUnit\Framework\TestCase;
use artbyrab\blockee\Block;

/**
 * Block Test
 *
 * To run this test class only:
 *  - Navigate to: artbyrab/blockee
 *  - Type: vendor/bin/phpunit --filter BlockTest tests/BlockTest.php
 *
 * @author artbyrab
 */
class BlockTest extends TestCase
{
    /**
     * @var string
     */
    public $previousBlockHash = "8978343ljdfdf34334";

    /**
     * @var object
     */
    public $block;

    /** 
     * @var string
     */
    public $data = "Initial data added for the addData test";

    /**
     * Set up
     *
     * Performed before every test.
     */
    protected function setUp()
    {
        $this->block = new Block($this->previousBlockHash);
        $this->block->addData($this->data);
    }

    /**
     * Tear down
     *
     * Performed after every test.
     */
    protected function tearDown()
    {
        unset($this->block);
    }

    /**
     * Test the __construct function
     */
    public function testConstruct()
    {
        $this->assertEquals("Result", "Result");
    }

    /**
     * Test the getPreviousBlockHash function
     */
    public function testGetPreviousBlockHash()
    {
        $this->assertEquals("8978343ljdfdf34334", $this->block->getPreviousBlockHash());
    }

    /**
     * Test the addData function
     */
    public function testAddData()
    {
        $this->block->addData("Some data added for the addData test");

        $this->assertEquals(
            "Some data added for the addData test", 
            $this->block->getData()[2]
        );
    }

    /**
     * Test the getData function
     */
    public function testGetData()
    {
        $this->assertEquals(
            "Initial data added for the addData test", 
            $this->block->getData()[1]
        );
    }

    /**
     * Test the getHash function
     */
    public function testGetHash()
    {
        $hash = $this->block->getHash();

        $this->assertEquals(
            "8d4d5b7f82b2507d56bbb07c67a0ffbc", 
            $hash
        );
    }

    /**
     * Test the lock function
     */
    public function testLock()
    {
        $this->block->lock();

        $this->assertEquals(
            Block::LOCKED_TRUE, 
            $this->block->isLocked()
        );
    }

    /**
     * Test the isLocked function
     */
    public function testIsLocked()
    {
        $this->testLock();
    }

    /**
     * Test the getSize function
     */
    public function testGetSize()
    {
        $size = $this->block->getSize();

        $this->assertEquals(57, $size);
    }

    /**
     * Test the getSpaceAvailable function
     */
    public function testGetSpaceAvailable()
    {
        $spaceAvailable = $this->block->getSpaceAvailable();

        $this->assertEquals(143, $spaceAvailable);
    }

    /**
     * Test the calculateSize function
     */
    public function testCalculateSize()
    {
        $calculatedSize = $this->block->calculateSize();

        $this->assertEquals(57, $calculatedSize);
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

