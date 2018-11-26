<?php
if(isset($_GET['accion'])){
  $accion = $_GET['accion'];
}else{
  $accion = "default";
}
?>

<!DOCTYPE html>
<html lang="es">

  <!-- PRINCIPIO DEL HEAD -->
    <?php
      require_once("controller/headController.php");
    ?>
  <!-- FINAL DEL HEAD -->

<body onload="cookie()" class="body-manga hold-transition skin-blue sidebar-mini">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<div class="wrapper">

  <!-- PRINCIPIO DEL HEADER -->
    <?php
      require_once("controller/headerController.php");
    ?>
  <!-- FIN DEL HEADER -->

  <!-- PRINCIPIO DEL MENU IZQUIERO -->
    <?php
      require_once("controller/menuIzquierdoController.php");
    ?>
  <!-- FIN DEL MENU IZQUIERDO -->

    <!-- PRINCIPIO DEL CONTENIDO -->
      <?php
        require_once("controller/".$accion."Controller.php");
      ?>
    <!-- FIN DEL CONTENIDO -->

  <!-- PRINCIPIO DEL FOOTER -->
    <?php
      include("view/footer.php");
    ?>
  <!-- FIN DEL FOOTER -->

  <!-- PRINCIPIO MENU DERECHO -->
    <?php
      // include("view/menu_derecho.php");
    ?>
  <!-- FIN MENU DERECHO -->
</div>

<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/demo.js"></script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>
</body>
</html>
