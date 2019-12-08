<?php

use PHPUnit\Framework\TestCase;
use artbyrab\blockee\Chain;
use artbyrab\blockee\GenesisBlock;
use artbyrab\blockee\Block;

/**
 * Chain Test
 *
 * To run this test class only:
 *  - Navigate to: artbyrab/blockee
 *  - Type: vendor/bin/phpunit --filter ChainTest tests/ChainTest.php
 *
 * @author artbyrab
 */
class ChainTest extends TestCase
{
    /**
     * @var object
     */
    public $chain;

    /**
     * @var object
     */
    public $genesisBlock;

    /**
     * @var string
     */
    public $dataA = "Unde nihil nisi excepturi velit. Enim sunt eos ipsa quibusdam vero quas dicta non.";

    /**
     * @var string
     */
    public $dataB = "Quaerat itaque quisquam distinctio tenetur iste.";

    /**
     * @var string
     */
    public $dataC = "Aut iusto velit fugiat eum recusandae sed. Quibusdam nihil rem voluptatem distinctio et excepturi similique.";

    /**
     * @var string
     */
    public $dataD = "Voluptatum tempore nobis velit iure est. Earum aut praesentium et deserunt hic voluptas nemo eos.";


    /**
     * Set up
     *
     * Performed before every test.
     */
    protected function setUp()
    {
        $this->chain = new Chain();
        $this->genesisBlock = new GenesisBlock();
        $this->chain->addBlock($this->genesisBlock->getBlock());
    }

    /**
     * Tear down
     *
     * Performed after every test.
     */
    protected function tearDown()
    {
        unset($this->chain);
        unset($this->genesisBlock);
    }

    /**
     * Test the verifyChain function
     * 
     * To ensure the chain has integrity we can simply add some data to it,
     * this will create new blocks and then we can verify each of the blocks
     * validates the previous block hash.
     */
    public function testVerifyChain()
    {
        $this->chain->addData($this->dataA);
        $this->chain->addData($this->dataB);
        $this->chain->addData($this->dataC);

        $this->assertEquals(true, $this->chain->verifyChain());
    }

    /**
     * Test the addBlock function
     * 
     * To test this we need to get the hash from the last block to add to the 
     * new block. Then we add the new block to the chain and verify there are
     * 2 blocks, the genesis block and the block we just added.
     */
    public function testAddBlock()
    {
        $block = new Block($this->genesisBlock->getBlock()->getHash());
        $this->chain->addBlock($block);

        $this->assertEquals(2, count($this->chain->getBlocks()));
    }

    /**
     * Test the createNewBlock function
     */
    public function testCreateNewBlock()
    {
        $newBlock = $this->chain->createNewBlock(
            $this->genesisBlock->getBlock()->getHash()
        );

        $this->assertInstanceOf(Block::class, $newBlock);
        $this->assertEquals($this->genesisBlock->getBlock()->getHash(), $newBlock->getData()[0]);
    }

    /**
     * Test the addData function
     */
    public function testAddData()
    {
        $this->chain->addData($this->dataA);

        $this->assertContains($this->dataA, $this->chain->getAllBlockData());
    }

    /**
     * Test the getBlocks function
     */
    public function testGetBlocks()
    {
        $this->assertEquals("Result", "Result");
    }

    /**
     * Test the getLastBlock function
     */
    public function testGetLastBlock()
    {
        $this->assertEquals("Result", "Result");
    }

    /**
     * Test the getBlockCount function
     */
    public function testGetBlockCount()
    {
        $this->assertEquals("Result", "Result");
    }

    /**
     * Test the getBlockSize function
     */
    public function testGetBlockSize()
    {
        $this->assertEquals("Result", "Result");
    }

    /**
     * Test the getAllBlockData() function
     */
    public function testGetAllBlockData()
    {
        $this->assertEquals("Result", "Result");
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
