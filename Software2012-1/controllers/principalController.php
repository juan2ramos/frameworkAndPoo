<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of principalController
 *
 * @author juan2ramos
 */
class principalController extends Controller
{
    private $_principal;


    public function index(){
        
        parent::__construct();//llamado al constructor padre el cual tiene como atributo  vista
        $this->_view->usuario = Session::get('usuario');
        parent::menu();
        $this->_view->renderizar('index','principal',$this->_menu);
    }
}

