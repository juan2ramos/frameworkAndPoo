<?php

/**
 * Description of AmigoImaginario
 *
 * @author juan2ramos
 */
class AmigoImaginario
{

    private $_nombre;
    private $_tipoAnimal;
    private $_dientes;
    private $_brazos;
    private $_color;
    private $_habilidad;

    public function __construct($nombre, $tipoAnimal)
    {
        $this->_nombre = $nombre;
        $this->_tipoAnimal = $tipoAnimal;
    }
    

    public function setColor($color)
    {
        $this->_color = $color;
    }

    public function setDientes($cantidad)
    {
        $this->_dientes = $cantidad;
    }

    public function setBrazos($cantidad)
    {
        $this->_cantidad = $cantidad;
    }

    public function setHabilidad($habilidad)
    {
        $this->_habilidad = $habilidad;
    }

    public function hacerMalavaresConpelota()
    {
        return 'Haciendo malavares';
    }

    /*public function getNombre()
    {        
        return $this->_dientes;
    }*/

}

