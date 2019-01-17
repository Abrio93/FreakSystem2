<?php

    require_once "../model/usuarioModel.php";
    require_once "../model/sesionModel.php";
    
    if(isset($_POST['ver_usuario'])){
        $usuario = Usuario::consultarId($_POST['id']);
        $jsondata = array();
        $jsondata['success'] = true;
        $jsondata['datos'] = $usuario;
        echo json_encode($jsondata);
    }

    if(isset($_POST['editar_usuario'])){
    $anterior = Usuario::consultarId($_POST['id_usuario']);
    $usuario = new Usuario();
    $usuario->id_usuario = $_POST['id_usuario'];
    $usuario->nombre = $_POST['nombre'];
    $usuario->apellidos = $_POST['apellidos'];
    $usuario->correo = $_POST['correo'];
    $usuario->usuario = $_POST['usuario'];
    $usuario->avatar = $anterior->avatar;
    $usuario->password = $anterior->password;
    $usuario->fecha_registro = $anterior->fecha_registro;

    Usuario::modificar($usuario);

    $log = new Log();
    $log->id_usuario = $sesion->id_usuario;
    $log->accion = "El usuario ha cambiado los ajustes del id_usuario: $usuario->id_usuario";
    Log::insertar($log);
    
    }

    if(isset($_POST['ver_usuarios'])){
        $usuarios = Usuario::consultarTodos();
        ?>
            <table id="tabla_usuarios" class="table table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Usuario</th>
                    <th>Correo</th>
                    <th>Nombre</th>
                    <th>Fecha</th>
                    <th><center><button class="btn btn-primary">Nuevo Usuario</button></center></th>
                </tr>
                </thead>
                <tbody>
                <?php
                    foreach($usuarios as $usuario){
                    ?>
                        <tr>
                        <td><?= $usuario->id_usuario; ?></td>
                        <td><?= $usuario->usuario; ?></td>
                        <td><?= $usuario->correo; ?></td>
                        <td><?= $usuario->nombre." ".$usuario->apellidos; ?></td>
                        <td><?= Usuario::fecha($usuario->fecha_registro); ?></td>
                        <td align="center">
                            <a href="#" class="btn btn-link" onclick="ver_usuario(<?= $usuario->id_usuario; ?>)" data-izimodal-open="#editar_usuario" data-izimodal-transitionin="fadeInDown"><i class="far fa-edit"></i></a>
                            <form style="display: inline;" method="POST">
                            <input type="hidden" name="id_usuario" value="<?= $usuario->id_usuario; ?>" />
                            <input type="hidden" name="eliminar" />
                            <button class="btn btn-link" type="submit"><i class="far fa-trash-alt"></i></button>
                            </form>
                        </td>
                        </tr>
                    <?php
                    }
                ?>
                </tbody>
                <tbody>
                <tr>
                    <th>#</th>
                    <th>Usuario</th>
                    <th>Correo</th>
                    <th>Nombre</th>
                    <th>Fecha</th>
                </tr>
                </tbody>
            </table>
        <?php
    }

?>