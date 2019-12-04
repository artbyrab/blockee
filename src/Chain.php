<?php

namespace artbyrab\blockee;

use artbyrab\blockee\GenesisBlock;

/**
 * Chain
 * 
 * The actual chain part of the blockchain. The chain is made up from blocks 
 * that get added to it.
 * 
 * @author artbyrab
 */
class Chain
{
    /**
     * @var array
     */
    public $blocks = array();

    /**
     * Construct
     * 
     * @return object An instance of this class.
     */
    public function __construct()
    {
        return $this;
    }

    /**
     * Verify the blockchain
     */
    public function verifyChain()
    {
        // @TODO i need to verify all the hashes match.
    }

    /**
     * Add block
     * 
     * @param object $block
     */
    public function addBlock($block)
    {
        array_push($this->blocks, $block);
    }

    /**
     * Create new block
     * 
     * @param string $previousBlockHash
     */
    public function createNewBlock($previousBlockHash)
    {
        $block = new Block($previousBlockHash);

        return $block;
    }

    /**
     * Add data
     * 
     * This will add a new piece of data to the last block or if the last block
     * is either locked or full it will create a new block.
     * 
     * @param string $data
     * @throws exception If the error message from the addData function is not
     * one we expect then we will re-throw the error.
     */
    public function addData($data)
    {
        $lastBlock = $this->getLastBlock();

        try {
            $lastBlock->addData($data);
        } catch (\Exception $e) {
            if ($e->getMessage() == Block::ERROR_BLOCK_LOCKED or $e->getMessage() == Block::ERROR_BLOCK_FULL) {

                $lastBlock->lock();
                $newBlock = $this->createNewBlock(
                    $lastBlock->getHash()
                );

                $this->addBlock($newBlock);
                $this->adddata($data);

            } 
            if ($e->getMessage() !== Block::ERROR_BLOCK_LOCKED && $e->getMessage() !== Block::ERROR_BLOCK_FULL) {
                throw new \Exception($e->getMessage());
            }
        }
    }

    /**
     * Get the last block
     * 
     * @return object
     */
    public function getLastBlock()
    {
        $lastBlock = end($this->blocks);
        reset($this->blocks);

        return $lastBlock;
    }

    /**
     * Get block count
     * 
     * @return integer
     */
    public function getBlockCount()
    {
        return count($this->blocks);
    }

    /**
     * Get block size
     * 
     * @return integer
     */
    public function getBlockSize()
    {
        $total = 0; 

        foreach ($this->blocks as $block)
        {
            $total = $total + $block->getSize();
        }

        return $total;
    }

}