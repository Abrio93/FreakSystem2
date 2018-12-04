<?php

require_once "tablaModel.php";

class Usuario extends Tabla{

    public $id_usuario;
    public $usuario;
    public $password;

    protected static $nombre_tabla = "usuarios";
    protected static $campos_tabla = array("id_usuario", "usuario", "password");

    public static function comprobarUsuario($usuario, $pass){
        $query = "SELECT * FROM ".static::$nombre_tabla." WHERE usuario = '$usuario'";
        $sentencia = static::Conectar()->query($query);
        $resultado = $sentencia->fetch(PDO::FETCH_OBJ);
        if($resultado->password == $pass){
            return $resultado;
        }else{
            return false;
        }
    }
}


?>
