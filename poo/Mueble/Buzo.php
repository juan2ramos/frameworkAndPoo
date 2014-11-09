<?php

/**
 * Description of Buzo
 *
 * @author juan2ramos
 */
class Buzo
{
    private $_material;
    
    
    public function __construct($material)
    {
        $this->_material = $material;
    }
    public function __toString()
    {
        return $this->_material;
    }
}

