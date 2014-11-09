<?php

/**
 * Description of Cofre
 *
 * @author juan2ramos
 */

require_once 'Dinero.php';

class Cofre
{
    private $_contenido = array();

    public function addDinero(Dinero $dinero)
    {
        $this->_contenido[] = $dinero;
    }
}

