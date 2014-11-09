<?php

require_once 'Buzo.php';
require_once 'Cajon.php';
require_once 'Camisa.php';
require_once 'Cofre.php';
require_once 'Dinero.php';
require_once 'Media.php';
require_once 'Mueble.php';
require_once 'RopaInterior.php';

class Index
{

    public static function ejecutar()
    {

        $mueble = new Mueble();
        $cajon1 = new Cajon('cajonuno');
        $cajon2 = new Cajon('cajondos');
        $cajon3 = new Cajon('cajontres');
        $cajon4 = new Cajon('cajoncuatro');

        $buzo = new Buzo('Lana');
        $buzo1 = new Buzo('Lanas');
        $media = new Media('Blancas');
        $ropaInterior = new RopaInterior('Masculina');
        $camisa = new Camisa();
        $cofre = new Cofre();
        $cajon1->addBuzo($buzo);
        $cajon1->addBuzo($buzo1);
        $cajon2->addMedia($media);
        $cajon3->addRopaInterior($ropaInterior);
        $cajon4->addCamisa($camisa);
        $cajon2->addCofre($cofre);
        $dinero = new Dinero(500, 'PesosColombianos');
        $cofre->addDinero($dinero);
        $mueble->addCajones($cajon1);
        $mueble->addCajones($cajon2);
        $mueble->addCajones($cajon3);
        $mueble->addCajones($cajon4);

        $cajones = $mueble->getCajon();

        //var_dump($cajones);
        //print_r($cajones);

        print_r($cajon1);
        foreach ($cajon1 as $k => $v) {
            echo $k;
        }
        $conf['home'] = array(
            'archivo' => 'home.php',
            'layout' => LAYOUT_COMUN);
        $conf['noticias'] = array(
            'archivo' => 'news.php');
        $conf['leer libro'] = array(
            'archivo' => 'gbook_leer.php');
        $conf['articulo'] = array(
            'archivo' => 'art.php');
        $conf['imp_art'] = array(
            'archivo' => $conf['articulo']['archivo'],
            'layout' => 'imprimir.php');
        echo '<br>';
        print_r($conf);
        foreach ($conf as $nivel1 => $nivel2) {
            echo "<a href=\"?zona=" . $nivel1 . "\">" . $nivel1 . "</a><br>";
        }
    }

}

Index::ejecutar();
