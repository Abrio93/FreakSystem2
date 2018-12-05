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
        <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tiene varias posibilidades para usar el Modal sencillo, con opciones y también atributos de datos. </font><font style="vertical-align: inherit;">Haga clic abajo para ver algunos ejemplos.</font></font></p>
        
        <h4><span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Progreso</font></font></span></h4>
        <button class="btn btn-progress-start"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Iniciar el progreso</font></font></button>
        <button class="btn btn-progress-pause"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Pausar progreso</font></font></button>
        <button class="btn btn-progress-resume"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Reanudar el progreso</font></font></button>
        <button class="btn btn-progress-reset"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Restablecer el progreso</font></font></button>

        <h4><span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Ajax / Fetch</font></font></span></h4>
        <button class="btn btn-ajax"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Cargar ajax</font></font></button>
        <button class="btn btn-fetch"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Carga fetch</font></font></button>

        <h4><span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Grupo</font></font></span></h4>
        <button class="btn" data-izimodal-prev=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Anterior Modal</font></font></button>
        <button class="btn" data-izimodal-next=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Siguiente modal</font></font></button>

        <h4><span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Atributos de datos</font></font></span></h4>
        <button class="btn" data-izimodal-close=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Cerrar</font></font></button>
        <button class="btn" data-izimodal-fullscreen=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Pantalla completa</font></font></button>
        <button data-izimodal-open="#modal-custom" data-izimodal-transitionin="fadeInDown" data-izimodal-transitionout="fadeOutDown"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Abrir un Modal específico</font></font></button>        

        <h4><span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Otro modal</font></font></span></h4>
        <button class="btn" data-izimodal-open="#modal-custom" data-izimodal-zindex="20000" data-izimodal-preventclose=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Otro modal</font></font></button>
    </div></div></div>

<a href="#" data-izimodal-open="#modal" data-izimodal-transitionin="fadeInDown">Modal</a>

<script lang="text/javascript">
  $("#modal").iziModal();
</script>




