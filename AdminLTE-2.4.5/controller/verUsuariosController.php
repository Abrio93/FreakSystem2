<?php
    require_once("model/usuariosModel.php");

    $objeto_usuarios = new Usuarios();
    $usuarios = $objeto_usuarios->getUsuarios();

    require_once("view/verUsuarios.php");
?>