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

  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Blank page
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>

    <!-- PRINCIPIO DE SECCION -->
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Title</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          Start creating your amazing application!
        </div>
        <div class="box-footer">
          Footer
        </div>
      </div>
    </section>
    <!-- FIN DE SECCION -->

  </div>

  <!-- FIN DEL CONTENIDO -->

  <!-- PRINCIPIO DEL FOOTER -->
    <?php
      include("view/footer.php");
    ?>
  <!-- FIN DEL FOOTER -->

  <!-- PRINCIPIO MENU DERECHO -->
    <?php
      include("view/menu_derecho.php");
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
