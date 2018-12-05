<?php
    require_once "model/usuarioModel.php";

    $usuario = Usuario::consultarId($_SESSION['usuario']->id_usuario);

    require_once "view/contenido/perfil.phtml";
?>