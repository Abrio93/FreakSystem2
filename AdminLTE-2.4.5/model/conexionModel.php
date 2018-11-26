<?php

class Conexion{
    public static function conectar(){
        try{
            $conexion = new PDO('mysql:host=localhost;dbname=freaksysten_adminlte;charset=utf8;','root','');
            return $conexion;
        }catch( PDOException $e){
            $mensaje = "ERROR: ".$e->getMessage();
            $mensaje = str_replace("'","",$mensaje);
            die("<script>swal('ERROR', '$mensaje', 'error');</script>");
        }
    }
}
?>