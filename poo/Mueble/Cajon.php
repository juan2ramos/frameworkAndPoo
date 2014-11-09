<?php

/**
 * Description of Cajon
 *
 * @author juan2ramos
 */
require_once 'Cajon.php';

class Cajon
{
    private $_nombre;
    private $_contenido = array();
    
    public function __construct($nombre)
    {
        $this->_nombre = $nombre;
    }

    public function addBuzo(Buzo $buzo)
    {
        $this->_contenido[] = $buzo;
    }
    public function addMedia(Media $media)
    {
        $this->_contenido[] = $media;
    }
    public function addRopaInterior(RopaInterior $ropaInterior)
    {
        $this->_contenido[] = $ropaInterior;
    }
    public function addCamisa(Camisa $camisa)
    {
        $this->_contenido[] = $camisa;
    }
    public function addCofre(Cofre $cofre)
    {
        $this->_contenido[] = $cofre;
    }
    
    public function __toString()
    {
        $retorno = '';

        foreach ($this->_contenido as $contenido) {
            $retorno .= $contenido . ' ';
            /*
             * Es lo mismo que decir
             *
             * $retorno .= $alumno->__toString() .' ';
             *
             * solo que el objeto sabe cómo convertirse en
             * String, tema que detecta cuando se hace
             * una operación  de suma de cadenas
             * con el punto ".".
             */
        }
        return $retorno;

    }
    
}

