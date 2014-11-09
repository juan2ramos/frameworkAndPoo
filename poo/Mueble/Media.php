<?php

/**
 * Description of Media
 *
 * @author juan2ramos
 */
class Media
{
    private $_color;
    
    
    public function __construct($color)
    {
        $this->_color = $color;
    }
    public function __toString()
    {
        return $this->_color;
    }
}

