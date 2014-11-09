<?php

/**
 * @created 16-abr-2012 10:50:24 p.m
 * @author juan2ramos
 */
class Persona
{

    private $_nombre;
    private $_edad;

    public function __construct($nombre, $edad)
    {
        $this->_nombre = $nombre;
        $this->_edad = $edad;
    }  

}
