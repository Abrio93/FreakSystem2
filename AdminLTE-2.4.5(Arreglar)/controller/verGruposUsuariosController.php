<?php
    require_once("model/gruposUsuariosModel.php");

    if(isset($_POST['nuevo'])){
        $usuario = new GruposUsuarios();
        $usuario->usuario = $_POST['usuario'];
        $usuario->pass = $_POST['pass'];
        $usuario->correo = $_POST['correo'];
        $usuario->nombre = $_POST['nombre'];
        $usuario->apellidos = $_POST['apellidos'];
        $usuario->insertarUsuario();
    }

    if(isset($_POST['borrar'])){
        $usuario = new GruposUsuarios();
        $usuario->id_usuario = $_POST['id_usuario'];
        $usuario->borrarUsuario();
    }

    if(isset($_POST['ver'])){
        $usuario = new GruposUsuarios();
        $usuario->getUsuario($_POST['id_usuario']);

        require_once("view/modal/modificarUsuario.php");

        echo "<script>$(document).ready(function() {";
        echo "$('#modificar').modal({backdrop: 'static', keyboard: false}, 'show');";
        echo "});</script>";
    }

    if(isset($_POST['modificar'])){
        $usuario = new GruposUsuarios();
        $usuario->id_usuario = $_POST['id_usuario'];
        $usuario->usuario = $_POST['usuario'];
        $usuario->pass = $_POST['pass'];
        $usuario->correo = $_POST['correo'];
        $usuario->nombre = $_POST['nombre'];
        $usuario->apellidos = $_POST['apellidos'];
        $usuario->modificarUsuario();
    }

    $objeto_gruposUsuarios = new GruposUsuarios();
    $grupos = $objeto_gruposUsuarios->getGrupos();

    require_once("view/verGruposUsuarios.php");

    require_once("view/modal/nuevoUsuario.php");
?>