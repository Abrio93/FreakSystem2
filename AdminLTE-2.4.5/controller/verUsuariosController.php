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

    if(isset($_POST['ver'])){
        $usuario = new Usuarios();
        $usuario->getUsuario($_POST['id_usuario']);

        require_once("view/modal/modificarUsuario.php");

        echo "<script>$(document).ready(function() {";
        echo "$('#modificar').modal({backdrop: 'static', keyboard: false}, 'show');";
        echo "});</script>";
    }

    if(isset($_POST['modificar'])){
        $usuario = new Usuarios();
        $usuario->id_usuario = $_POST['id_usuario'];
        $usuario->usuario = $_POST['usuario'];
        $usuario->pass = $_POST['pass'];
        $usuario->correo = $_POST['correo'];
        $usuario->nombre = $_POST['nombre'];
        $usuario->apellidos = $_POST['apellidos'];
        $usuario->modificarUsuario();
    }

    $objeto_usuarios = new Usuarios();
    $usuarios = $objeto_usuarios->getUsuarios();

    require_once("view/verUsuarios.php");

    require_once("view/modal/nuevoUsuario.php");
?>