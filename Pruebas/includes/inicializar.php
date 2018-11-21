<?php
    //ESTOS IF SON IF RESUMIDOS, OTRA FORMA DE HACERLOS VAYA...
    
    //SI EST� DEFINIDA NO HACEMOS NADA. SI NO LO EST� LA DEFINO CON ESA CONSTANTE DEL SISTEMA.
    defined("SD") ? NULL : define("SD",DIRECTORY_SEPARATOR);
    
    //DEFINIMOS LA SIGUIENTE RUTA C:\xampp\htdocs\Juanjo\albumfotos
    defined("RAIZ") ? NULL : define("RAIZ","C:".SD."xampp".SD."htdocs".SD."Isabel".SD."Pruebas".SD);
    
    //DEFINIMOS LA SIGUIENTE RUTA C:\xampp\htdocs\albumfotos\includes
    defined("LIBRERIA") ? NULL : define("LIBRERIA",RAIZ."includes".SD);
    
    //DEFINIMOS LA SIGUIENTE RUTA C:\xampp\htdocs\albumfotos\includes
    defined("VISTAS") ? NULL : define("VISTAS",RAIZ."views".SD);
?>