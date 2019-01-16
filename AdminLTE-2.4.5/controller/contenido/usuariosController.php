<?php
    require_once "model/usuarioModel.php";
    require_once "model/sesionModel.php";
    require_once "model/swalModel.php";

    $silebar = "usuarios"; //? VARIABLE DECLARADA PARA SEÑALAR EN EL SILEBAR DONDE ESTAMOS

    if(isset($_POST['eliminar'])){
        if($_POST['id_usuario'] == 1){
            echo Swal::alerta("No se puede eliminar este usuario", "error", "", "1000");
        }else{
            Usuario::borrar($_POST['id_usuario']);
        }
    }

    if(isset($_POST['editar_usuario'])){
        if($_POST['id_usuario'] == 1){
            echo Swal::alerta("No se puede editar este usuario", "error", "", "1000");
        }else{
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

            echo Swal::alerta("Datos guardados correctamente", "success", "", "1500");
        }
    }
    
    if(isset($_POST['datos'])){
        $usuario = Usuario::consultarId($_POST['id']);
        $jsondata = array();
        $jsondata['success'] = true;
        $jsondata['datos'] = $usuario;
        echo json_encode($jsondata);
    }

    $usuarios = Usuario::consultarTodos();

    require_once "view/contenido/usuarios.phtml";
?>