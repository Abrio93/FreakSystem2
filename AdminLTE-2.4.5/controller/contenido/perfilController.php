<?php
    require_once "model/usuarioModel.php";
    require_once "model/imagenModel.php";
    require_once "model/sesionModel.php";
    require_once "model/swalModel.php";

    $silebar = "panel"; //? VARIABLE DECLARADA PARA SEÑALAR EN EL SILEBAR DONDE ESTAMOS

    if(isset($_POST['ajustes'])){
        $anterior = Usuario::consultarId($_POST['id_usuario']);
        $usuario = new Usuario();
        $usuario->id_usuario = $_POST['id_usuario'];
        $usuario->nombre = $_POST['nombre'];
        $usuario->apellidos = $_POST['apellidos'];
        $usuario->correo = $_POST['correo'];
        $usuario->usuario = $_POST['usuario'];

        if(empty($_FILES['avatar']['tmp_name'])){
            $usuario->avatar = $anterior->avatar;
            $usuario->password = $anterior->password;
            $usuario->fecha_registro = $anterior->fecha_registro;

            Usuario::modificar($usuario);
            $sesion->loguearse($usuario);

            $log = new Log();
            $log->id_usuario = $usuario->id_usuario;
            $log->accion = "El usuario ha cambiado sus ajustes";
            Log::insertar($log);

            echo Swal::alerta("Datos guardados correctamente", "success", "", "1500");

        }else{
            Imagen::eliminar_imagen($anterior->avatar);
            $imagen = new Imagen();
            $imagen->adjuntar_imagen($_FILES['avatar'], $_POST['id_usuario']);
        
            if($imagen->crear_imagen()){
                $usuario->avatar = $imagen->ruta_imagen();
                $usuario->password = $anterior->password;
                $usuario->fecha_registro = $anterior->fecha_registro;
        
                Usuario::modificar($usuario);
                $sesion->loguearse($usuario);

                $log = new Log();
                $log->id_usuario = $usuario->id_usuario;
                $log->accion = "El usuario ha cambiado sus ajustes";
                Log::insertar($log);

                echo Swal::alerta("Datos guardados correctamente", "success", "", "1500");

            }else{
                $mensaje = implode("<br />", $imagen->errores);

                echo Swal::alerta("$mensaje", "error", "", "0", "true");
            }
        }
    }

    if(isset($_POST['cambio_password'])){
        $anterior = Usuario::consultarId($_POST['id_usuario']);
        $usuario = new Usuario();
        $usuario->id_usuario = $_POST['id_usuario'];
        $usuario->nombre = $anterior->nombre;
        $usuario->apellidos = $anterior->apellidos;
        $usuario->correo = $anterior->correo;
        $usuario->usuario = $anterior->usuario;
        $usuario->avatar = $anterior->avatar;
        $usuario->fecha_registro = $anterior->fecha_registro;
        if($_POST['password'] == $_POST['password_repetida']){
            $usuario->password = $_POST['password'];
            if($usuario->comprobarPassword()){
                Usuario::modificar($usuario);
                $sesion->loguearse($usuario);
                $log = new Log();
                $log->id_usuario = $usuario->id_usuario;
                $log->accion = "El usuario ha cambiado su contraseña";
                Log::insertar($log);
                echo Swal::alerta("Contraseña cambiada correctamente", "success", "", "1500");
            }else{
                echo Swal::alerta("La contraseña no cumple con los criterios", "error", "", "0", "true");
            }
        }else{
            echo Swal::alerta("Las contraseñas no coinciden", "error", "", "0", "true");
        }
    }

    $usuario = Usuario::consultarId($_SESSION['usuario']->id_usuario);

    require_once "view/contenido/perfil.phtml";
?>