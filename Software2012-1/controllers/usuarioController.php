<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of usuariosController
 *
 * @author juan2ramos
 */
class usuarioController extends Controller
{

    private $_usuario;

    public function __construct()
    {
        parent::__construct();
        $this->_usuario = $this->loadModel('usuario');
    }

    public function index()
    {
        parent::menu();
        if (session::get('level') != 'Administrador') {
            $this->redireccionar("usuario/ingresar/" . session::get('id_usuario'));
            exit();
        }

        $this->_view->titulo = 'Actualizar Usuarios';
        $this->_view->usuarios = $this->_usuario->getUsuarios();
        $this->_view->renderizar('index', 'usuarios', $this->_menu);
    }

    public function ingresar($id = false)
    {
        if (Session::get('autenticado'))
            parent::menu();

        $this->_view->titulo = 'usuario';


        if ($this->getInt('guardar') == 1) {

            $this->validaciones();
            if (!$id) :

                $numeroUsuario = $this->_usuario->obtenerUsuario($this->getTexto('cedula'), $this->getTexto('email'));

                if ($numeroUsuario):
                    $this->_view->_error = 'este usuario ya existe ';
                    $this->_view->datos = $_POST;
                    $this->_view->renderizar('actualizar', 'usuario', $this->_menu);
                    exit();
                endif;
                if (!Session::get('autenticado')&&(Session::get('level') == 1)):
                    $_POST['id_tipo_usuarios'] = 2;
                endif;
                $this->_usuario->insertarUsuario($this->getPostParam('nombre'), $this->getPostParam('apellido'), $this->getPostParam('cedula'), $this->getPostParam('fecha_nacimiento'), $this->getPostParam('email'), $this->getPostParam('nombreusuario'), $this->getPostParam('pass'), $this->getPostParam('id_tipo_usuarios'));

            else:

                $this->_usuario->actualizarUsuario($id, $this->getPostParam('nombre'), $this->getPostParam('apellido'), $this->getPostParam('cedula'), $this->getPostParam('fecha_nacimiento'), $this->getPostParam('email'), $this->getPostParam('nombreusuario'), $this->getPostParam('pass'), $this->getPostParam('id_tipo_usuarios'));
            endif;

            if (!Session::get('autenticado')&& (Session::get('level') == 1)) {
                $this->_view->_error = 'Usuario Registrado con exito POR FAVOR INICIE SESION ';
                $this->_view->renderizar('actualizar', 'usuario', $this->_menu);
                exit();
            }
            $this->redireccionar('usuario');
        }
        if ($id)
            $this->_view->datos = $this->_usuario->getUsuario($id);
        $this->_view->renderizar('actualizar', 'usuario', $this->_menu);
    }

    public function eliminar($id = false)
    {
        $this->_usuario->eliminarUsuario($id);
        $this->redireccionar('usuario');
    }

    private function validaciones()
    {


        if (!$this->getTexto('nombre')) {
            $this->_view->_error = 'Debe introducir el nombre  ';
            $this->_view->datos = $_POST;
            $this->_view->renderizar('actualizar', 'usuario', $this->_menu);
            exit;
        }

        if (!$this->getTexto('apellido')) {
            $this->_view->_error = 'Debe introducir el apellido  ';
            $this->_view->datos = $_POST;
            $this->_view->renderizar('actualizar', 'usuario', $this->_menu);
            exit;
        }

        if (!$this->getTexto('cedula')) {
            $this->_view->_error = 'Debe introducir la cedula  ';
            $this->_view->datos = $_POST;
            $this->_view->renderizar('actualizar', 'usuario', $this->_menu);
            exit;
        }

        if (!$this->validarFecha('fecha_nacimiento')) {
            $this->_view->_error = 'Debe introducir la fecha de nacimiento valida ';
            $this->_view->datos = $_POST;
            $this->_view->renderizar('actualizar', 'usuario', $this->_menu);
            exit;
        }

        if (!$this->getTexto('email')) {
            $this->_view->_error = 'Debe introducir el email  ';
            $this->_view->datos = $_POST;
            $this->_view->renderizar('actualizar', 'usuario', $this->_menu);
            exit;
        }

        if (!$this->validarEmail('email')) {
            $this->_view->_error = 'email no valido ';
            $this->_view->datos = $_POST;
            $this->_view->renderizar('actualizar', 'usuario', $this->_menu);
            exit;
        }


        if (!$this->getTexto('nombreusuario')) {
            $this->_view->_error = 'Debe introducir el Nombre Usuario';
            $this->_view->datos = $_POST;
            $this->_view->renderizar('actualizar', 'usuario', $this->_menu);
            exit;
        }


        if (!$this->getTexto('pass')) {
            $this->_view->_error = 'Debe introducir la Contraseña ';
            $this->_view->datos = $_POST;
            $this->_view->renderizar('actualizar', 'usuario', $this->_menu);
            exit;
        }
        if (Session::get('autenticado')&&(Session::get('level') == 1)) :

            if (!$this->getSelect('id_tipo_usuarios')) {
                $this->_view->_error = 'Debe introducir un tipo de usuario ';
                $this->_view->datos = $_POST;
                $this->_view->renderizar('actualizar', 'usuario', $this->_menu);
                exit;
            }
        endif;
    }

}

