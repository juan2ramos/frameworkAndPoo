<?php

/**
 * Description of RopaInterior
 *
 * @author juan2ramos
 */
class RopaInterior
{

    private $_tipo;

    public function __construct($tipo)
    {
        $this->_tipo = $tipo;
    }

    public function __toString()
    {
        return $this->_tipo;
    }

}

