<?php

class Conexion{
    public static function conectar(){
        $conexion = new PDO('mysql:host=localhost;dbname=freaksysten_adminlte;charset=utf8;','root','');
        return $conexion;
    }
}
?>