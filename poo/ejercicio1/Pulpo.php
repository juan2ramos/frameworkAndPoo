<?php

/**
 * @author juan2ramos
 * @created 17-abr-2012 12:31:11 a.m.
 */
class Pulpo
{

    private $_nombre;
    private $_ojos;
    private $_brazos;
    private $_color;

    public function __construct($nombre, $ojos, $brazos, $color)
    {

        $this->_nombre = $nombre;
        $this->_ojos = $ojos;
        $this->_brazos = $brazos;
        $this->_color = $color;
    }

    public function recibir($elemento)
    {

        if ($elemento == 'pelota') {

            $retorno = $this->_hacerMalabares();
        } else {
            $retorno = 'recibo ' . $elemento;
        }

        return $retorno;
    }

    private function _hacerMalabares()
    {
        return 'estoy haciendo malabares';
    }

}

