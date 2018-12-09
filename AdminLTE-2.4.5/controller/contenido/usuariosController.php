<?php
    require_once "model/usuarioModel.php";
    require_once "model/swalModel.php";

    $silebar = "usuarios"; //? VARIABLE DECLARADA PARA SEÑALAR EN EL SILEBAR DONDE ESTAMOS

    if(isset($_POST['eliminar'])){
        if($_POST['id_usuario'] == 1){
            echo Swal::alerta("No se puede eliminar este usuario", "error", "", "1000");
        }else{
            Usuario::borrar($_POST['id_usuario']);
        }
    }

    $usuarios = Usuario::consultarTodos();

    require_once "view/contenido/usuarios.phtml";
?>