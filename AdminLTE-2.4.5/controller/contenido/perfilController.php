<?php
    require_once "model/usuarioModel.php";
    require_once "model/imagenModel.php";
    require_once "model/sesionModel.php";

    if(isset($_POST['id_usuario']) && isset($_POST['nombre']) && isset($_POST['apellidos']) && isset($_POST['correo']) && isset($_POST['usuario'])){
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

            echo "<script>swal({
                position: 'center',
                type: 'success',
                title: 'Datos guardados correctamente',
                showConfirmButton: false,
                timer: 1500
              })</script>";
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
        
                echo "<script>swal({
                    position: 'center',
                    type: 'success',
                    title: 'Datos guardados correctamente',
                    showConfirmButton: false,
                    timer: 1500
                  })</script>";
            }else{
                $mensaje = implode("<br />", $imagen->errores);
                echo "<script>swal({
                    position: 'center',
                    type: 'error',
                    title: '$mensaje',
                    showConfirmButton: true,
                  })</script>";
            }
        }
    }

    $usuario = Usuario::consultarId($_SESSION['usuario']->id_usuario);

    require_once "view/contenido/perfil.phtml";
?>