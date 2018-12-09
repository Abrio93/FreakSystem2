<?php
    require_once "model/usuarioModel.php";

    $silebar = "usuarios"; //? VARIABLE DECLARADA PARA SEÑALAR EN EL SILEBAR DONDE ESTAMOS

    $usuarios = Usuario::consultarTodos();

    require_once "view/contenido/usuarios.phtml";
?>