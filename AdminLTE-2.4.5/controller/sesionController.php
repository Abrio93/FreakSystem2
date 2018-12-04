<?php
    require_once "model/usuarioModel.php";
    require_once "model/sesionModel.php";

    
    $sesion = new Sesion();

    if(isset($_POST['usuario']) AND isset($_POST['pass'])){
        if($usuario = Usuario::comprobarUsuario($_POST['usuario'], $_POST['pass'])){
            $sesion->loguearse($usuario);
        }else{
            header("Location: login.php");
        }
    }else{
        if(!$sesion->esta_logueado()){
            header("Location: login.php");
        }
    }
?>