<?php

    $ficheros = array("Default", "404");
    $existe = 0;

    if(isset($_GET['vista'])){
        if(in_array($_GET['vista'], $ficheros)){
            $vista = $_GET['vista'];
        }else{
            $vista = "404";
        }
    }else{
        $vista = "Default";
    }
?>