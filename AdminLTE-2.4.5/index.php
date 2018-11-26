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

<body class="hold-transition skin-blue sidebar-mini">

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
