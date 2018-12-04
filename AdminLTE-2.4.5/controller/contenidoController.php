<?php

    if(isset($_GET['vista'])){
        $vista = $_GET['vista'];
    }else{
        $vista = "Default";
    }

    require_once "view/contenido".$vista.".phtml";
?>