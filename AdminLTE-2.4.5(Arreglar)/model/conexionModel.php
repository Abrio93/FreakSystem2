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

    public function existe($sentencia, $clase, $funcion){
        if($sentencia){
            return $resultado = $sentencia->fetchAll();
        }else{
            die("<script>swal('Error: $clase - $funcion', 'Consulte con su administrador', 'error');</script>");
        }
    }
}
?>