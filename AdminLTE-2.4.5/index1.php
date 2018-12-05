<?php
  require_once  "controller/sesionController.php"; //? COMPRUEBO QUE ESTA LOGUEADO

  require_once  "controller/navegacionController.php"; //? COMRPUEBO LA NAVEGACION

  require_once  "controller/headController.php"; //? LLAMO AL HEAD 

  require_once "controller/headerController.php"; //? LLAMO AL HEADER (BARRA DE ARRIBA)

  require_once "controller/contenidoController.php"; //? LLAMO AL CONTENIDO

  require_once "controller/silebarController.php"; //? LLAMO AL SILEBAR (MENU DE LA IZQUIERDA)

  require_once "controller/footerController.php"; //? LLAMO AL FOOTER
?>

<div id="modal" data-izimodal-fullscreen="true" data-izimodal-title="Welcome to the iziModal" data-izimodal-subtitle="Elegant, responsive, flexible and lightweight modal plugin with jQuery." data-izimodal-icon="icon-home" aria-hidden="false" aria-labelledby="modal-default" role="dialog" class="iziModal" data-izimodal-group="grupo1" data-izimodal-loop="true" >
  
</div>

<a href="#" data-izimodal-open="#modal" data-izimodal-transitionin="fadeInDown">Modal</a>

<script lang="text/javascript">
  $("#modal").iziModal();
</script>




