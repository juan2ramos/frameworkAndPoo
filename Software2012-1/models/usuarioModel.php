<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of usuarioModel
 *
 * @author juan2ramos
 */
class usuarioModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getUsuarios()
    {
        $i = 0;
        $sql = 'SELECT
                    usuarios.id_usuarios,
                    usuarios.nombre AS nombredeusuario,
                    usuarios.apellido,
                    usuarios.email,
                    usuarios.nombreusuario,
                    usuarios.id_tipo_usuarios,
                    tipo_usuarios.nombre AS nombretipousuarios ,
                    usuarios.fecha_ingreso
                FROM 
                    usuarios 
                LEFT JOIN 
                    tipo_usuarios ON usuarios.id_tipo_usuarios = tipo_usuarios.id_tipo_usuarios  
                WHERE 
                    usuarios.activo = 1';
        $post = $this->_dbc->ejecutar($sql);
        while ($x = $this->_dbc->obtener_fila($post, 0)) {
            $a[$i] = $x;
            $i++;
        }
        return $a;
    }

    public function insertarUsuario($nombre, $apellido, $cedula, $fecha_nacimiento, $email, $nombreusuario, $pass, $id_tipo_usuarios)
    {
        $sql = ("insert into usuarios
            (nombre, apellido, cedula, fecha_nacimiento,email, nombreusuario, contrasenia,activo, id_tipo_usuarios)values
            ('$nombre', '$apellido', '$cedula', '$fecha_nacimiento','$email', '$nombreusuario', '$pass',1,$id_tipo_usuarios)");
        $this->_dbc->ejecutar($sql);
    }

    public function obtenerUsuario($cedula,$email)
    {
        $sql = ("select * from usuarios where cedula = '$cedula' or email = '$email'");
        $post = $this->_dbc->ejecutar($sql);
        $numero = $this->_dbc->obtenerNumeroConsulta($post);
        
        if($numero == 0)
            return false;
        return true;
        
    }
    public function getUsuario($id)
    {
        $sql = ("select * from usuarios where id_usuarios = $id ");
        $post = $this->_dbc->ejecutar($sql);
        $x = $this->_dbc->obtener_fila($post, 0); 
        return $x;
    
    }
    public function actualizarUsuario($id, $nombre, $apellido, $cedula, $fecha_nacimiento, $email, $nombreusuario, $pass, $id_tipo_usuarios)
    {
        $sql = ("UPDATE usuarios SET 
                nombre = '$nombre', 
                apellido = '$apellido', 
                cedula = '$cedula', 
                fecha_nacimiento = '$fecha_nacimiento', 
                email = '$email',
                nombreusuario = '$nombreusuario', 
                contrasenia = '$pass',
                id_tipo_usuarios = '$id_tipo_usuarios'
                WHERE (id_usuarios = $id) LIMIT 1 ");
        $this->_dbc->ejecutar($sql);
    }
    public function eliminarUsuario ($id)
    {
        $sql = ("update usuarios SET activo = '0' WHERE (id_usuarios = $id) LIMIT 1 ");
        $this->_dbc->ejecutar($sql);
    }
    

}

