<?php

namespace artbyrab\blockee;

/**
 * Data
 * 
 * Data is what is put into a block. 
 * 
 * By keeping the data in its own class we can keep the rest of the models 
 * clean and tidy.
 * 
 * @author artbyrab
 */
class Data
{
    /**
     * Construct
     * 
     * @param string $data
     */
    public function __construct($data)
    {
        return $this;
    }
}