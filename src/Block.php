<?php

namespace artbyrab\blockee;

use artbyrab\blockee\Hash;

/**
 * Block
 * 
 * This is the class for a single block in the chain.
 * 
 * @author artbyrab
 */
class Block
{
    const LOCKED_FALSE = 0;
    const LOCKED_TRUE = 1;

    const ERROR_BLOCK_LOCKED = 'The block has been locked you cannot add any further data to it. Do you need to create a new block instead?';
    const ERROR_BLOCK_FULL = 'The block does not have enough space left to store the data. Do you need to create a new block instead?';

    /**
     * @var string
     */
    private $previousBlockHash;

    /**
     * @var array $data will hold the blocks pieces of data, they can be 
     * anything from transactions to messages or whatever you define them to be
     * as long as they are a string.
     */
    private $data = array();

    /**
     * @var boolean $isLocked Is the block locked. A block gets locked when it
     * is full or it has been defined as locked.
     */
    private $isLocked = self::LOCKED_FALSE;

    /**
     * @var integer $maximumSizeBytes The maximum size of the 
     */
    private $maximumSizeBytes = 200;

    /**
     * @var integer $sizeBytes The current size of the blocks data in bytes.
     */
    private $sizeBytes = 0;

    /**
     * Construct
     * 
     * @TODO consider changing this so you have to pass the previous block hash separated - RAB
     * @TODO consider adding the option to set the maximum size bytes as a parameter in a factory of some kind - RAB
     * 
     * @return Object An instance of this Block object.
     */
    public function __construct($previousBlockHash)
    {
        $this->previousBlockHash = $previousBlockHash;

        $this->addData($previousBlockHash);

        return $this;
    }

    /**
     * Get previous block hash
     * 
     * @return string
     */
    public function getPreviousBlockHash()
    {
        return $this->previousBlockHash;
    }

    /** 
     * Add data
     * 
     * This will add a piece of data to the block if the block is not locked.
     * 
     * After adding a piece of data it will re-calculate the totals of the 
     * block so that we can do a total in the chain if required.
     * 
     * @param string $data
     * @throws exception If the block is locked we cannot add any more data 
     * to it.
     */
    public function addData($data)
    {
        if ($this->isLocked == True) {
            throw new \Exception(self::ERROR_BLOCK_LOCKED);
        }

        if (mb_strlen($data, '8bit') > $this->getSpaceAvailable()) {
            throw new \Exception(self::ERROR_BLOCK_FULL);
        }

        array_push($this->data, $data);

        $this->calculateSize();
    }

    /**
     * Get data
     * 
     * @return array 
     */
    public function getData()
    {
        return $this->data;
    }

    /** 
     * Get hash
     * 
     * @return string
     */
    public function getHash()
    {
        return Hash::stringHash($this->getHashableString());
    }

    /**
     * Get hashable string
     * 
     * This string is the data we hash before creating a new block. This will 
     * be constructed from a combination of the previous block hash and the 
     * data in the block.
     * 
     * @return string
     */
    private function getHashableString()
    {
        $hashableString = 
            self::dataWrapper($this->previousBlockHash) . 
            $this->getAllDataAsString();

        return $hashableString;
    }

    /**
     * Get all data as string
     * 
     * This merges all the data strings in the data array into one string which
     * we can then hash.
     * 
     * @return string 
     */
    private function getAllDataAsString()
    {
        $string = '';

        foreach ($this->data as $data) {
            $string = $string . self::dataWrapper($data);
        }

        return $string;
    }

    /**
     * Data wrapper
     * 
     * For wrapping data when converting it to a string so it is still readable
     * this can be whatever you want it to be.
     * 
     * @return string The $data wrapped.
     */
    private static function dataWrapper($data)
    {
        return '"' . $data . '",';
    }

    /**
     * Lock 
     * 
     * Lock the block so no more data can be added.
     */
    public function lock()
    {
        $this->isLocked = self::LOCKED_TRUE;
    }

    /**
     * Is locked
     * 
     * Is the block locked or not.
     * 
     * @return boolean;
     */
    public function isLocked()
    {
        return $this->isLocked;
    }

    /**
     * Get size
     * 
     * This will get the size attribute and return it.
     * 
     * @return integer 
     */
    public function getSize()
    {
        return $this->sizeBytes;
    }

    /**
     * Get the space available
     * 
     * Get the amount of space available left in the block.
     * 
     * @return integer 
     */
    public function getSpaceAvailable()
    {
        $spaceLeft = ($this->maximumSizeBytes - $this->calculateSize());

        if ($spaceLeft < 0) {
            return 0;
        }

        return $spaceLeft;
    }

    /**
     * Calculate the size 
     * 
     * This will calculate the total block size in bytes by iterating over each
     * piece of data. As a string is 1 byte for every character we are simply
     * counting the number of characters in the total block.
     * 
     * @return integer The calculated size which is placed in the sizeBytes 
     * attribute.
     */
    public function calculateSize()
    {
        $total = 0;

        foreach ($this->data as $data) {
            $total = $total + mb_strlen($data, '8bit');
        }

        $this->sizeBytes = $total;

        return $this->sizeBytes;
    }
}