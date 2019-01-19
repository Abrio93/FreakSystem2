<?php
  //? NO GUARDAR CACHE
  header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1 
  header("Expires: Sat, 1 Jul 2000 05:00:00 GMT"); // Fecha en el pasado
  //? NO GUARDAR CACHE

  require_once  "controller/sesionController.php"; //? COMPRUEBO QUE ESTA LOGUEADO

  require_once  "controller/navegacionController.php"; //? COMRPUEBO LA NAVEGACION

  require_once  "controller/headController.php"; //? LLAMO AL HEAD 

  require_once "controller/headerController.php"; //? LLAMO AL HEADER (BARRA DE ARRIBA)

  require_once "controller/contenidoController.php"; //? LLAMO AL CONTENIDO

  require_once "controller/silebarController.php"; //? LLAMO AL SILEBAR (MENU DE LA IZQUIERDA)

  require_once "controller/footerController.php"; //? LLAMO AL FOOTER
?>