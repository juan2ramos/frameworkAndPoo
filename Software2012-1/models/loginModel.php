<?php

class loginModel extends Model
{
    

    public function __construct()
    { 
        parent::__construct();
        
    }

    public function getUsuario($user,$pass)
    {
        
        $sql = "SELECT usuarios.id_usuarios,
                tipo_usuarios.nombre as tipoUsuarios,
                usuarios.nombreusuario as usuario 
                FROM usuarios Inner Join tipo_usuarios ON usuarios.id_tipo_usuarios = tipo_usuarios.id_tipo_usuarios where nombreusuario = '$user' and contrasenia = '$pass'";
        $usuario = $this->_dbc->ejecutar($sql);
        $usuario = $this->_dbc->obtener_fila($usuario,0); 
        return $usuario;
       
    }
    
}


