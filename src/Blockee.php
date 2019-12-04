<?php

namespace artbyrab\blockee;

use artbyrab\blockee\Block;
use artbyrab\blockee\Transaction;
use artbyrab\blockee\Hash;
use artbyrab\blockee\GenesisBlock;

/**
 * Blockee
 * 
 * This is the main class in the Blockee package and represents the blockchain
 * in total. 
 * 
 * This is essentially a facade and a builder class as it hides the 
 * complexity of the child classes behind a few functions.
 * 
 * The main function of this class is to add data. The addition of the data
 * to the blockchain is then passed down to the chain class.
 *
 * @author artbyrab
 */
class Blockee
{
    /**
     * @var object $chain An instance of the Chain class and the main chain
     * for a Blockee blockchain.
     * 
     * By having this currently as a separate object and attribute it will 
     * allow easier scaling to multiple chains later if we need it.
     */
    private $chain;

    /**
     * @var object $genesisBlock An instance of the Genesis class and the first
     * block in the chain
     */
    private $genesisBlock;
    
    /**
     * Construct
     * 
     * @return object An instance of this class.
     */
    public function __construct()
    {
        $this->chain = new Chain();
        $this->genesisBlock = new GenesisBlock();
        $this->chain->addBlock($this->genesisBlock->getBlock());

        return $this;
    }

    /**
     * Get the chain
     * 
     * @return object An instance of the Chain class.
     */
    public function getChain()
    {
        return $this->chain;
    }

    /**
     * Get the genesis block
     * 
     * @return object An instance of the GenesisBlock class.
     */
    public function getGenesisBlock()
    {
        return $this->genesisBlock;
    }

    /**
     * Add data
     * 
     * @param string $data
     */
    public function addData($data)
    {
        $this->chain->addData($data);
    }

    /**
     * Get block count
     * 
     * @return integer
     */
    public function getBlockCount()
    {
        return $this->chain->getBlockCount();
    }

    /**
     * Get size
     * 
     * This will get the size of all the blocks in the chain.
     * 
     * @return integer
     */
    public function getBlockSize()
    {
        return $this->getChain()->getBlockSize();
    }
}