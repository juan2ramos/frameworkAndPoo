<?php

/**
 * @author juan2ramos
 * @created 17-abr-2012 12:31:08 a.m.
 */
class Cocodrilo
{

    private $_nombre;
    private $_dientes;
    private $_color;

    public function __construct($nombre, $dientes, $color)
    {

        $this->_nombre = $nombre;
        $this->_dientes = $dientes;
        $this->_color = $color;
    }

    public function lavar($lugar)
    {

        if ($lugar == 'dientes') {

            $retorno = $this->_lavarDientes();
        } else {
            $retorno = $lugar . ' estan limpios';
        }

        return $retorno;
    }

    private function _lavarDientes()
    {

        return 'Dientes aun siguen amarillos';
    }

    public function cantar()
    {

        return 'canto de forma desafinada';
    }

}

