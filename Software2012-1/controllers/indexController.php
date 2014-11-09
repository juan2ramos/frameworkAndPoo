<?php

/*
 * 
 * -------------------------------------
 * Description of indexController
 * Controlador inicial
 * @author juan2ramos
 * -------------------------------------
 * 
 */

class indexController extends Controller
{
    private $_login;
    
    public function __construct() {
        parent::__construct();//llamado al constructor padre el cual tiene como atributo  vista
        $this->_login = $this->loadModel('login');
    }    
    
    public function index()
    {
        if(Session::get('autenticado')){
            $this->redireccionar('principal');
            
        }
        
        $this->_view->titulo = 'Iniciar Sesion';
        
        if($this->getInt('enviar') == 1){
            $this->_view->datos = $_POST;
            
            if(!$this->getAlphaNum('usuario')){
                $this->_view->_error = 'Debe introducir su nombre de usuario';
                $this->_view->renderizar('index','login');
                exit;
            }
            
            if(!$this->getSql('pass')){
                $this->_view->_error = 'Debe introducir su password';
                $this->_view->renderizar('index','login');
                exit;
            }
            
            $row = $this->_login->getUsuario(
                    $this->getAlphaNum('usuario'),
                    $this->getSql('pass')
                    );
            
            if(!$row){
                $this->_view->_error = 'Usuario y/o password incorrectos';
                $this->_view->renderizar('index','login');
                exit;
            }          
            //$this->_login->getTipoUsuario();
            Session::set('autenticado', true);
            Session::set('level', $row['tipoUsuarios']); 
            Session::set('usuario', $row['usuario']);
            Session::set('id_usuario', $row['id_usuarios']);
            Session::set('tiempo', time());
            
            $this->redireccionar('principal');
        }
        
        $this->_view->renderizar('index','login',$menu);
        
    }
     public function cerrar() 
    {
        Session::destroy();
        $this->redireccionar();
    }
   
}

?>