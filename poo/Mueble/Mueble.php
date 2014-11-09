<?php

/**
 * Description of Mueble
 *
 * @author juan2ramos
 */
require_once 'Cajon.php';

class Mueble
{

    private $_colCajones = array();

    public function addCajones(Cajon $cajon)
    {
        $this->_colCajones[] = $cajon;
    }

    public function getCajon()
    {
       return $this->_colCajones ;
    }

}

