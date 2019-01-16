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

?>