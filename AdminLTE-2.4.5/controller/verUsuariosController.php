<?php
    require_once("model/usuariosModel.php");

    $objeto_usuarios = new Usuarios();
    $usuarios = $objeto_usuarios->getUsuarios();

    $usuario = new Usuarios();
    $usuario->getUsuario(1);
    $usuario->nombre = "Javier";
    $usuario->modificarUsuario();

    require_once("view/verUsuarios.php");
?>