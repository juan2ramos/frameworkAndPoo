<?php

require_once "Persona.php";
require_once "Cocodrilo.php";
require_once "Pulpo.php";

class Index
{

    public function ejecutar()
    {
        $persona = new Persona('Dora', 'ja', '1990');
        $cocodrilo = new Cocodrilo('Roberto', 101, 'Verde');
        $pulpo = new Pulpo('Elvis', 1, 8, 'Purpura');
        echo $persona->edad();
        echo '</br>';
        echo $persona->lavarAmigo($cocodrilo, 'dientes');
        echo '</br>';
        echo $persona->PedirCantar($cocodrilo);
        echo '</br>';
        echo $persona->enviarObjeto($pulpo, 'pelota');
    }

}

$index = new Index();
$index->ejecutar();
?>