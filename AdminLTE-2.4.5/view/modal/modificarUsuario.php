<div class="modal fade" id="modificar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <!-- <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Insertar un nuevo usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> -->
      <div class="modal-body">
      <form method="POST">
        <div class="form-group">
          <label for="exampleInputEmail1">Usuario</label>
          <input type="hidden"name="modificar">
          <input type="hidden"name="id_usuario" value="<?= $usuario->id_usuario; ?>">
          <input type="text" class="form-control" name="usuario" placeholder="Usuario" value="<?= $usuario->usuario; ?>" required>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Contraseña</label>
          <input type="password" class="form-control" name="pass" placeholder="Contraseña" value="<?= $usuario->pass; ?>" required>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Correo</label>
          <input type="text" class="form-control" name="correo" placeholder="Correo" value="<?= $usuario->correo; ?>" required>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Nombre</label>
          <input type="text" class="form-control" name="nombre" placeholder="Nombre" value="<?= $usuario->nombre; ?>" required>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Apellidos</label>
          <input type="text" class="form-control" name="apellidos" placeholder="Apellidos" value="<?= $usuario->apellidos; ?>" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Guardar</button>
        <button type="reset" class="btn btn-warning">Borrar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="this.form.reset()">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>