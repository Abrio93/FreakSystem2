<?php

    require_once "../model/usuarioModel.php";
    require_once "../model/sesionModel.php";
    
    if(isset($_POST['ver_usuario'])){
        $usuario = Usuario::consultarId($_POST['id']);
        $jsondata = array();
        $jsondata['success'] = true;
        $jsondata['datos'] = $usuario;
        echo json_encode($jsondata);
    }

    if(isset($_POST['editar_usuario'])){
    $anterior = Usuario::consultarId($_POST['id_usuario']);
    $usuario = new Usuario();
    $usuario->id_usuario = $_POST['id_usuario'];
    $usuario->nombre = $_POST['nombre'];
    $usuario->apellidos = $_POST['apellidos'];
    $usuario->correo = $_POST['correo'];
    $usuario->usuario = $_POST['usuario'];
    $usuario->avatar = $anterior->avatar;
    $usuario->password = $anterior->password;
    $usuario->fecha_registro = $anterior->fecha_registro;

    Usuario::modificar($usuario);

    $log = new Log();
    $log->id_usuario = $sesion->id_usuario;
    $log->accion = "El usuario ha cambiado los ajustes del id_usuario: $usuario->id_usuario";
    Log::insertar($log);
    
    }

    if(isset($_POST['ver_usuarios'])){
        $usuarios = Usuario::consultarTodos();
        $JSON = json_encode($usuarios);
        $JSON = str_replace("[", "", $JSON);
        $JSON = str_replace("]", "", $JSON);
        echo '{"data":['.$JSON.']}';
    }

?>