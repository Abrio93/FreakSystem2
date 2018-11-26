<?php

require_once("model/conexionModel.php");

class MenuIzquierdo{
    public $menu_izquierdo_titulo;
    public $menu_izquierdo_contenido;

    public function getTitulo(){
        try{
            $query = "SELECT * FROM menu_izquierdo_titulo ORDER BY posicion";
            $sentencia = Conexion::conectar()->query($query);
            if($sentencia){
                $resultado = $sentencia->fetchAll();
            }else{
                die("<script>swal('Error: 1', 'Consulte con su administrador', 'error');</script>");
            }
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
            if($sentencia){
                $resultado = $sentencia->fetchAll();
            }else{
                die("<script>swal('Error: 3', 'Consulte con su administrador', 'error');</script>");
            }
            $this->menu_izquierdo_contenido = $resultado;
            return $this->menu_izquierdo_contenido;
        }catch( Error $e){
            die("<script>swal('Error: 4', 'Consulte con su administrador', 'error');</script>");
        }
    }


}
?>