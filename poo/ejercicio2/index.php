<?php

require_once "Persona.php";
require_once "AmigoImaginario.php";
/**
 * Description of index
 *
 * @author juan2ramos
 */
class Index
{
    public function ejecutar()
    {
        
        $persona = new Persona('Dora',10);
        $amigoimaginario = new AmigoImaginario('Roberto','cocodrilo');        
        $amigoimaginario->setColor('verde');
        $amigoimaginario->setDientes(101);
        $amigoimaginario->setHabilidad('Cantar desafinado');
        
        //echo $amigoimaginario->getNombre().'</br>';
        
    }
}


$index = new Index();
$index->ejecutar();