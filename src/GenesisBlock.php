<?php

namespace artbyrab\blockee;

use artbyrab\blockee\Block;
use artbyrab\blockee\Hash;

/**
 * Genesis block
 * 
 * This is a class for the main genesis block of any chain.
 * 
 * @author artbyrab
 */
class GenesisBlock
{
    /** 
     * @var object An instance of the Block class.
     */
    private $block;

    /**
     * Construct
     * 
     * As the genesis block is just that 
     * 
     * @param string $data
     */
    public function __construct($data = "Initial genesis block data")
    {
        $hash = Hash::stringHash($data);
        $this->block = new Block($hash);
        $this->block->addData($data);
        $this->block->lock();

        return $this->block;
    }

    /**
     * Get block
     * 
     * @return object An instance of the Block class
     */
    public function getBlock()
    {
        return $this->block;
    }
}