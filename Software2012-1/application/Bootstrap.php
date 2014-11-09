<?php

/*
 * 
 * -------------------------------------
 * Description of Bootstrap
 * LLama a los controladores y metodos 
 * @author juan2ramos
 * -------------------------------------
 * 
 */


class Bootstrap
{
    public static function ejecutar(Request $peticion)
    {
        $controller = $peticion->getControlador() . 'Controller';//Obtiene el contrador 
        $rutaControlador = ROOT . 'controllers' . DS . $controller . '.php';//ruta fisica de controlador
        $metodo = $peticion->getMetodo();//Obtiene el metodo
        $args = $peticion->getArgs();//Obtiene los argumentos
        
        if(is_readable($rutaControlador)){// busca si el archivo existe y si es leible
            require_once $rutaControlador;
            $controller = new $controller;
            
            if(is_callable(array($controller, $metodo))){// revisa si el metodo es valido
                $metodo = $peticion->getMetodo();
            }
            else{
                $metodo = 'index';
            }
            
            if(isset($args)){//revisa si los argumentos existen
                call_user_func_array(array($controller, $metodo), $args);//llamamos al metodo de la clase y le pasamos los argumentos
            }
            else{
                call_user_func(array($controller, $metodo));//llama la clase y el metodo
            }
            
        } else {
            header('location:' . BASE_URL . '404.shtml');
            exit;
            //throw new Exception('no encontrado');//lanzamos la excepcion en el caso de no encontrar el metodo
            
        }
    }
}

?>