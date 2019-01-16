<?php
    //ESTOS IF SON IF RESUMIDOS, OTRA FORMA DE HACERLOS VAYA...
    
    //SI EST� DEFINIDA NO HACEMOS NADA. SI NO LO EST� LA DEFINO CON ESA CONSTANTE DEL SISTEMA.
    defined("SD") ? NULL : define("SD",DIRECTORY_SEPARATOR);
    
    //DEFINIMOS LA SIGUIENTE RUTA C:\xampp\htdocs\Juanjo\albumfotos
    defined("RAIZ_DIR") ? NULL : define("RAIZ_DIR","C:".SD."xampp".SD."htdocs".SD."FreakSystem".SD."AdminLTE-2.4.5");
?>