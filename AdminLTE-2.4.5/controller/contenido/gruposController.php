<?php
    require_once "model/grupoModel.php";
    require_once "model/swalModel.php";

    $silebar = "usuarios"; //? VARIABLE DECLARADA PARA SEÑALAR EN EL SILEBAR DONDE ESTAMOS

    $grupos = Grupo::consultarTodos();

    require_once "view/contenido/grupos.phtml";
?>