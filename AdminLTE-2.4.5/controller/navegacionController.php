<?php

    $contenidos = array("Default", "404", "Perfil", "Usuarios", "Grupos", "Categorias", "Productos");

    if(isset($_GET['contenido'])){
        if(in_array($_GET['contenido'], $contenidos)){
            $contenido = $_GET['contenido'];
        }else{
            $contenido = "404";
        }
    }else{
        $contenido = "Default";
    }
?>