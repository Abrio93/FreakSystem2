<?php
    require_once "model/usuarioModel.php";
    require_once "model/sesionModel.php";
    require_once "model/logModel.php";

    
    $sesion = new Sesion();

    if(isset($_POST['usuario']) AND isset($_POST['pass'])){
        if($usuario = Usuario::comprobarUsuario($_POST['usuario'], $_POST['pass'])){
            $sesion->loguearse($usuario);
            $log = new Log();
            $log->id_usuario = $usuario->id_usuario;
            $log->accion = "El usuario ha iniciado sesión";
            Log::insertar($log);
        }else{
            header("Location: login.php?error");
        }
    }else{
        if(!$sesion->esta_logueado()){
            header("Location: login.php");
        }
    }
?>