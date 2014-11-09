<?php

/*
 * 
 * -------------------------------------
 * Description of Controller
 * Controlador Principal, Padre de todas los demas controladores
 * @author juan2ramos
 * -------------------------------------
 * 
 */

abstract class Controller
{

    protected $_view; //
    protected $_menu;

    public function __construct()
    {
        $this->_view = new View(new Request); //instancia el objeto request lo envia a nueva instacia de la clase vista
    }

    abstract public function index(); //obliga  a que todas las clase q hereden de esta implementen un metodo index(metodo por defecto cuando no se envie ningun metodo o un error)

    protected function menu()
    {
        if (!Session::get('autenticado')) {
            $this->redireccionar();
            exit();
        }
        $rutaModelo = ROOT . 'models' . DS . 'UsuarioFactoryModel' . '.php';
        require_once $rutaModelo;
        $tipoUsuarios = Session::get('level');
        $usuariosFactory = new UsuarioFactoryModel();
        $Usuario = $usuariosFactory->crearUsuario($tipoUsuarios);
        $this->_menu = $Usuario->crearMenu();
    }

    protected function redireccionar($ruta = false)
    {
        if ($ruta) {
            header('location:' . BASE_URL . $ruta);
            exit;
        } else {
            header('location:' . BASE_URL);
            exit;
        }
    }

    protected function loadModel($modelo)//
    {
        $modelo = $modelo . 'Model';
        $rutaModelo = ROOT . 'models' . DS . $modelo . '.php';

        if (is_readable($rutaModelo)) {
            require_once $rutaModelo;
            $modelo = new $modelo;
            return $modelo;
        } else {
            throw new Exception('Error de modelo');
        }
    }
    protected function loadClass($class)//
    {
        $rutaClass = ROOT . 'models' . DS . $class . '.php';

        if (is_readable($rutaClass)) {
            require_once $rutaClass;
            $class = new $class;
            return $class;
        } else {
            throw new Exception('Error de modelo');
        }
    }

    protected function getLibrary($libreria)
    {
        $rutaLibreria = ROOT . 'libs' . DS . $libreria . '.php';

        if (is_readable($rutaLibreria)) {
            require_once $rutaLibreria;
        } else {
            throw new Exception('Error de libreria');
        }
    }

    protected function getTexto($clave)
    {
        if (isset($_POST[$clave]) && !empty($_POST[$clave])) {
            $_POST[$clave] = htmlspecialchars($_POST[$clave], ENT_QUOTES);
            return $_POST[$clave];
        }

        return '';
    }

    protected function getInt($clave)
    {
        if (isset($_POST[$clave]) && !empty($_POST[$clave])) {
            $_POST[$clave] = filter_input(INPUT_POST, $clave, FILTER_VALIDATE_INT);
            return $_POST[$clave];
        }

        return 0;
    }

    protected function filtrarInt($int)
    {
        $int = (int) $int;

        if (is_int($int)) {
            return $int;
        } else {
            return 0;
        }
    }

    protected function getPostParam($clave)
    {
        if (isset($_POST[$clave])) {
            return $_POST[$clave];
        }
    }

    protected function getSql($clave)
    {
        if (isset($_POST[$clave]) && !empty($_POST[$clave])) {
            $_POST[$clave] = strip_tags($_POST[$clave]);

            if (!get_magic_quotes_gpc()) {
                $_POST[$clave] = mysql_escape_string($_POST[$clave]);
            }

            return trim($_POST[$clave]);
        }
    }

    protected function getAlphaNum($clave)
    {
        if (isset($_POST[$clave]) && !empty($_POST[$clave])) {
            $_POST[$clave] = (string) preg_replace('/[^A-Z0-9_]/i', '', $_POST[$clave]);
            return trim($_POST[$clave]);
        }
    }

    public function validarEmail($email)
    {
        $email = $_POST[$email];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        return true;
    }

    public function getSelect($clave)
    {
        if (isset($_POST[$clave]) && $_POST[$clave] > 0) {
            $_POST[$clave] = filter_input(INPUT_POST, $clave, FILTER_VALIDATE_INT);
            return $_POST[$clave];
        }
    }

    public function validarFecha($clave)
    {
        if (isset($_POST[$clave]) && $this->datecheck($_POST[$clave]) == false) {
            return false;
        }
        return true;
    }

    private function datecheck($input )
    {
        $separator_type= array(
            "/",
            "-",
            "."
        );
        foreach ($separator_type as $separator) {
            $find= stripos($input,$separator);
            if($find<>false){
                $separator_used= $separator;
            }
        }
        $input_array= explode($separator_used,$input);        
        return checkdate($input_array[1],$input_array[2],$input_array[0]); 
    }

}

?>
