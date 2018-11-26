<?php

require_once("model/conexionModel.php");

class MenuIzquierdo extends Conexion{
    public $menu_izquierdo_titulo;
    public $menu_izquierdo_contenido;

    public function getTitulo(){
        try{
            $query = "SELECT menu_izquierdo_titulo.*, menu_izquierdo_contenido.accion FROM menu_izquierdo_titulo LEFT JOIN menu_izquierdo_contenido ON menu_izquierdo_titulo.id_menu_izquierdo_titulo = menu_izquierdo_contenido.id_menu_izquierdo_titulo ORDER BY posicion";
            $sentencia = Conexion::conectar()->query($query);
            $resultado = parent::existe($sentencia, __CLASS__, __FUNCTION__);
            $this->menu_izquierdo_titulo = $resultado;
            return $this->menu_izquierdo_titulo;
        }catch( Error $e){
            die("<script>swal('Error: 2', 'Consulte con su administrador', 'error');</script>");
        }
    }

    public function getContenido(){
        try{
            $query = "SELECT * FROM menu_izquierdo_contenido ORDER BY posicion";
            $sentencia = Conexion::conectar()->query($query);
            $resultado = parent::existe($sentencia, __CLASS__, __FUNCTION__);
            $this->menu_izquierdo_contenido = $resultado;
            return $this->menu_izquierdo_contenido;
        }catch( Error $e){
            die("<script>swal('Error: 4', 'Consulte con su administrador', 'error');</script>");
        }
    }


}
?>