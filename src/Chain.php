<?php

namespace artbyrab\blockee;

use artbyrab\blockee\GenesisBlock;

/**
 * Chain
 * 
 * The actual chain part of the blockchain. The chain is made up from blocks 
 * that get added when the previous block is full.
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
     * 
     * @return boolean If the chain is correct.
     * @throws exception if the chain is broken.
     */
    public function verifyChain()
    {
        $previousBlockHash = '';
        $count = 0;

        foreach ($this->blocks as $block) {

            if ($count > 0) {
                $blockHash = $block->getPreviousBlockHash();
                if ($blockHash !== $previousBlockHash) {
                    throw new \Exception("The hashes do not match for block number {$count} whose hash is {$blockHash} compared to the previousBlockHash of {$previousBlockHash}");
                }
            }
            $previousBlockHash = $block->getHash();

            $count = $count + 1;
        }

        return true;
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
     * Get the blocks
     * 
     * @return array An array of Block objects.
     */
    public function getBlocks()
    {
        return $this->blocks;
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

    /**
     * Get all the block data
     * 
     * @return array
     */
    public function getAllBlockData()
    {
        $chainData = array();

        foreach ($this->blocks as $block) {
            foreach ($block->getData() as $data) {
                array_push($chainData, $data);
            }
        }

        return $chainData;
    }

}