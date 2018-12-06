<?php

    require_once("model/sesionModel.php");
    require_once("model/logModel.php");
    
    $sesion = new Sesion();

    $log = new Log();
    $log->id_usuario = $_SESSION['usuario']->id_usuario;
    $log->accion = "El usuario ha cerrado sesion";
    Log::insertar($log);
    
    if(!$sesion->esta_logueado()){
        header("Location: login.php");
    }
    
    
    $sesion->desloguearse();
    header("Location: login.php");

?>