<?php
    require_once "model/logModel.php";

    $silebar = "panel"; //? VARIABLE DECLARADA PARA SEÑALAR EN EL SILEBAR DONDE ESTAMOS

    $logs = Log::consultarTodos();

    require_once "view/contenido/default.phtml";
?>