<?php

require_once("model/conexionModel.php");

class Usuarios{
    public $usuarios;

    public function getUsuarios(){
        $query = "SELECT * FROM usuarios";
        $sentencia = Conexion::conectar()->query($query);
        $resultado = $sentencia->fetchAll();
        $this->usuarios = $resultado;
        return $this->usuarios;
    }


}
?>