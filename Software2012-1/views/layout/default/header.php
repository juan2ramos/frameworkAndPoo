<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title><?php if(isset($this->titulo)) echo $this->titulo; ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf8" />
        <link href="<?php echo $_layoutParams['ruta_css']; ?>estilos.css" rel="stylesheet" type="text/css" />
        <script src="<?php echo BASE_URL; ?>public/js/jquery.js" type="text/javascript"></script>
        <script src="<?php echo BASE_URL; ?>public/js/jquery.validate.js" type="text/javascript"></script>
    
        <?php if(isset($_layoutParams['js']) && count($_layoutParams['js'])): ?>
        <?php for($i=0; $i < count($_layoutParams['js']); $i++): ?>
        
        <script src="<?php echo $_layoutParams['js'][$i] ?>" type="text/javascript"></script>
        
        <?php endfor; ?>
        <?php endif; ?>
    </head>

    <body>
        <body>
            <div id="top" <?php if (!Session::get('autenticado'))echo 'style = "display:none;"'?>>
                <div id="nombre">
                   <?php $this->titulo; ?> 
                </div>
                <div id="cerrarSesion">
                    <span class="cerrar"><a href="<?php echo BASE_URL . 'index/cerrar' ;?>">Cerrar Sesión</a></span>
                </div>
            </div>
            <div id="main">
                <div id="header">
                    <div id="logo">
                        <h1><?php echo APP_NAME; ?></h1>
                        
                    </div>
                    

                    <div id="menu">
                       <?php if (!Session::get('autenticado')) :?>
                        <div id="top_menu">
                            <ul>
                                <li class="nivel1"><a href="index" >Iniciar Sesion</a></li>
                                <li class="nivel1"><a href="usuario/ingresar" >Registrarse</a></li>
                            </ul>
                        </div> 
                       <?php else: ?> 
                       
                        <div id="top_menu">
                            <ul>
                            <?php if(isset($_layoutParams['menu'])): 
                                $menu = $_layoutParams['menu'];
                                $k = 0;
                            ?>
                                
                            <?php for($i = 0; $i < sizeof($menu) ; $i++): ?>
                            <?php 
                                        $tam = count($menu[$i]);
                                        if($item && $menu[$i][$k]['menu'] == $item ){ 
                                            $_item_style = 'current'; 
                                        } else {$_item_style = '';}
                            ?>
                            <li class="nivel1"><a href="#" class="<?php echo $_item_style; ?> nivel1"><?php  echo $menu[$i][$k]['menu']; ?></a> 
                            <ul>
                            <?php                                    
                               for ($j = 0; $j < $tam; $j++):
                            ?>
                                    
                                        <li><a class="<?php echo $_item_style; ?>" href="<?php echo $menu[$i][$k]['enlace'] ?>"><?php  echo $menu[$i][$k]['submenu'] ?></a></li>
                                      
                             <?php
                                    $k++;
                                endfor;
                            ?>         
                            </ul> 
                                </li>  
                            <?php endfor; ?>
                                
                            <?php endif; ?>
                            </ul>
                           
                        </div>
                         <?php endif; ?> 
                    </div>
                </div>

                <div id="content">
                    <noscript><p>Para el correcto funcionamiento debe tener el soporte de javascript habilitado</p></noscript>
                    
                    <?php if(isset($this->_error)): ?>
                    <div id="error"><?php echo $this->_error; ?></div>
                    <?php endif; ?>

                     <?php if(isset($this->_mensaje)): ?>
                    <div id="mensaje"><?php echo $this->_mensaje; ?></div>
                    <?php endif; ?>