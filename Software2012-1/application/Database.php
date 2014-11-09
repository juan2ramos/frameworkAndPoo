<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Db
{

    private $servidor;
    private $usuario;
    private $password;
    private $base_datos;
    private $link;
    private $stmt;
    private $array;
    private $numero;
    static $_instance;

    /* La función construct es privada para evitar que el objeto pueda ser creado mediante new */

    private function __construct()
    {
        $this->setConexion();
        $this->conectar();
    }

    /* Método para establecer los parámetros de la conexión */

    private function setConexion()
    {
//$conf = Conf::getInstance();
        $this->servidor = DB_HOST;
        $this->base_datos = DB_NAME;
        $this->usuario = DB_USER;
        $this->password = DB_PASS;
    }

    /* Evitamos el clonaje del objeto. Patrón Singleton */

    private function __clone()
    {
        
    }

    /* Función encargada de crear, si es necesario, el objeto. Esta es la función que debemos llamar desde fuera de la clase para instanciar el objeto, y así, poder utilizar sus métodos */

    public static function getInstance()
    {
        if (!(self::$_instance instanceof self)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /* Realiza la conexión a la base de datos. */

    private function conectar()
    {
        $this->link = mysql_connect($this->servidor, $this->usuario, $this->password);
        mysql_select_db($this->base_datos, $this->link);
        @mysql_query("SET NAMES 'utf8'");
    }

    /* Método para ejecutar una sentencia sql */

    public function ejecutar($sql)
    {
        $this->stmt = mysql_query($sql, $this->link);
        return $this->stmt;
    }
    
    public function up($sql)
    {
         mysql_query($sql, $this->link);
        
    }

    /* Método para obtener una fila de resultados de la sentencia sql */

    public function obtener_fila($stmt, $fila)
    {
        if ($fila == 0) {
            $this->array = mysql_fetch_assoc($stmt);
        } else {
            mysql_data_seek($stmt, $fila);
            $this->array = mysql_fetch_array($stmt);
        }
        return $this->array;
    }
public function obtenerNumeroConsulta($stmt)
    {
        $this->numero = mysql_num_rows($stmt);
        return $this->numero;
    }
//Devuelve el último id del insert introducido
    public function lastID()
    {
        return mysql_insert_id($this->link);
    }

}

?>
