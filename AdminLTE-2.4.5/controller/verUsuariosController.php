<?php
    require_once("model/usuariosModel.php");

    if(isset($_POST['nuevo'])){
        $usuario = new Usuarios();
        $usuario->usuario = $_POST['usuario'];
        $usuario->pass = $_POST['pass'];
        $usuario->correo = $_POST['correo'];
        $usuario->nombre = $_POST['nombre'];
        $usuario->apellidos = $_POST['apellidos'];
        $usuario->insertarUsuario();
    }

    if(isset($_POST['borrar'])){
        $usuario = new Usuarios();
        $usuario->id_usuario = $_POST['id_usuario'];
        $usuario->borrarUsuario();
    }

    $objeto_usuarios = new Usuarios();
    $usuarios = $objeto_usuarios->getUsuarios();

    require_once("view/verUsuarios.php");

    require_once("view/modal/nuevoUsuario.php");
?>