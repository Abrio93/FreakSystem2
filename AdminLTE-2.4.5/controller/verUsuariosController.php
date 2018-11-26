<?php
    require_once("model/usuariosModel.php");

    $objeto_usuarios = new Usuarios();
    $usuarios = $objeto_usuarios->getUsuarios();

    if(isset($_POST['usuario'])){
        $usuario = new Usuarios();
        $usuario->usuario = $_POST['usuario'];
        $usuario->pass = $_POST['pass'];
        $usuario->correo = $_POST['correo'];
        $usuario->nombre = $_POST['nombre'];
        $usuario->apellidos = $_POST['apellidos'];
    }

    require_once("view/verUsuarios.php");

    require_once("view/modal/nuevoUsuario.php");
?>