<?php

require_once "tablaModel.php";

class Usuario extends Tabla{

    public $id_usuario;
    public $usuario;
    public $password;
    public $correo;
    public $avatar;
    public $nombre;
    public $apellidos;
    public $fecha_registro;

    protected static $nombre_tabla = "usuarios";
    protected static $campos_tabla = array("id_usuario", "usuario", "password", "correo", "avatar", "nombre", "apellidos", "fecha_registro");

    public static function comprobarUsuario($usuario, $pass){
        $query = "SELECT * FROM ".static::$nombre_tabla." WHERE usuario = '$usuario'";
        $sentencia = static::Conectar()->query($query);
        $resultado = $sentencia->fetch(PDO::FETCH_OBJ);
        if($resultado->password == static::encriptarPassword($pass)){
            return $resultado;
        }else{
            return false;
        }
    }

    public function comprobarPassword(){
        $this->password = hash("sha512", $this->password);
        return true;
    }

    public function encriptarPassword($password){
        return hash("sha512", $password);
    }
}


?>
