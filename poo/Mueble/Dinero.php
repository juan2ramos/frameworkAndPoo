<?php

/**
 * Description of Dinero
 *
 * @author juan2ramos
 */
class Dinero
{
    
    private $_monto;
    private $_moneda;

    public function __construct($monto,$moneda)
    {
        $this->_monto = $monto;
        $this->_moneda = $moneda;
    }

    public function __toString()
    {
        return $this->_monto;
    }
}

