<?php

require_once("model/conexionModel.php");

class MenuIzquierdo{
    public $menu_izquierdo_titulo;
    public $menu_izquierdo_contenido;

    public function getTitulo(){
        $query = "SELECT * FROM menu_izquierdo_titulo ORDER BY posicion";
        $sentencia = Conexion::conectar()->query($query);
        $resultado = $sentencia->fetchAll();
        $this->menu_izquierdo_titulo = $resultado;
        return $this->menu_izquierdo_titulo;
    }

    public function getContenido(){
        $query = "SELECT * FROM menu_izquierdo_contenido ORDER BY posicion";
        $sentencia = Conexion::conectar()->query($query);
        $resultado = $sentencia->fetchAll();
        $this->menu_izquierdo_contenido = $resultado;
        return $this->menu_izquierdo_contenido;
    }


}
?>