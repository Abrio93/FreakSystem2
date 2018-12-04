    <!-- PRINCIPIO DEL CONTENIDO -->

  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Grupos
        <!-- <small>it all starts here</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Grupos</a></li>
        <li class="active">Ver grupos</li>
      </ol>
    </section>

    <!-- PRINCIPIO DE SECCION -->
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Grupos</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body table-responsive">
          <table class="table table-hover">
            <tr>
              <th>#</th>
              <th>Nombre</th>
              <th>Permisos</th>
              <th>Creacion</th>
              <th>Modificado</th>
              <th><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" data-backdrop="static" data-keyboard="false" >Nuevo Grupo</button></th>
            </tr>
            <?php
              foreach($grupos as $grupo){
                ?>
                  <tr>
                    <td><?= $grupo['id_grupo_usuario']; ?></td>
                    <td><?= $grupo['nombre_grupo_usuario']; ?></td>
                    <td><?= $grupo['permisos']; ?></td>
                    <td><?= date_format(date_create($grupo['fecha_creacion']), 'd-m-Y'); ?></td>
                    <td><?= date_format(date_create($grupo['fecha_modificacion']), 'd-m-Y'); ?></td>
                    <td><form style='display: inline;' method='post'><input type='hidden' name='id_usuario' value='<?= $usuario['id_usuario']; ?>' /><button type='submit' class='btn btn-link' name='ver'><h4><i class="fas fa-user-edit"></i></h4></button></form><form onsubmit="return confirm('¿Estás seguro?')" style='display: inline;' method='POST'><input type='hidden' name='id_usuario' value='<?= $usuario['id_usuario']; ?>' /><button type='submit' name="borrar" class='btn btn-link'><h4><i class="fas fa-user-times"></i></h4></button></form></td>
                  </tr>
                <?php
              }
            ?>
          </table>
        </div>
        <div class="box-footer">
          <!-- Footer -->
        </div>
      </div>
    </section>
    <!-- FIN DE SECCION -->

  </div>

  <!-- FIN DEL CONTENIDO -->