<?php

/**
 * @created 16-abr-2012 10:50:24 p.m
 * @author juan2ramos
 */
class Persona
{

    private $_nombre;
    private $_apellido;
    private $_fechaNacimiento;

    public function __construct($nombre, $apellido, $fechaNacimiento)
    {
        $this->_nombre = $nombre;
        $this->_apellido = $apellido;
        $this->_fechaNacimiento = $fechaNacimiento;
    }

    public function edad()
    {

        return $this->_edadCalculada();
    }

    private function _edadCalculada()
    {

        $diaActual = date('j');
        $mesActual = date('n');
        $añoActual = date('y') + 2000;
        list($dia, $mes, $año) = explode("/", $this->_fechaNacimiento);
        if (($mes == $mesActual) && ($dia > $diaActual)) {
            $añoActual = $añoActual - 1;
        }
        if ($mes > $mesActual) {
            $añoActual = $añoActual - 1;
        }
        $edad = ($añoActual - $año);

        return $edad;
    }

    public function lavarAmigo($objeto, $lugar)
    {

        return $objeto->lavar($lugar);
    }

    public function PedirCantar($objeto)
    {

        return $objeto->cantar();
    }

    public function enviarObjeto($objeto, $elemento)
    {

        return $objeto->recibir($elemento);
    }

}
