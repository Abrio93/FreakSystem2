<?php

    require_once("model/sesionModel.php");
    
    $sesion = new Sesion();
    
    if(!$sesion->esta_logueado()){
        header("Location: login.php");
    }
    
    
    $sesion->desloguearse();
    header("Location: login.php");

?>