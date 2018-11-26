<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Insertar un nuevo usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST">
        <div class="form-group">
          <label for="exampleInputEmail1">Usuario</label>
          <input type="hidden"name="nuevo">
          <input type="text" class="form-control" name="usuario" placeholder="Usuario">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Contraseña</label>
          <input type="password" class="form-control" name="pass" placeholder="Contraseña">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Correo</label>
          <input type="text" class="form-control" name="correo" placeholder="Correo">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Nombre</label>
          <input type="text" class="form-control" name="nombre" placeholder="Nombre">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Apellidos</label>
          <input type="text" class="form-control" name="apellidos" placeholder="Apellidos">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Guardar</button>
        <button type="reset" class="btn btn-warning">Borrar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>