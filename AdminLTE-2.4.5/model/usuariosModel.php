<?php

require_once("model/conexionModel.php");

class Usuarios{
    public $id_usuario;
    public $usuario;
    public $pass;
    public $correo;
    public $nombre;
    public $apellidos;

    public $nombre_tabla = "usuarios";
    public $campos_tabla = array("id_usuario", "usuario", "pass", "correo", "nombre", "apellidos");

    public function getUsuarios(){
        $query = "SELECT * FROM $this->nombre_tabla";
        $sentencia = Conexion::conectar()->query($query);
        $resultado = $sentencia->fetchAll();
        return $resultado;
    }

    public function getUsuario($id){
        $query = "SELECT * FROM $this->nombre_tabla WHERE ".$this->campos_tabla[0]." = $id";
        $sentencia = Conexion::conectar()->query($query);
        $resultado = $sentencia->fetch();
        foreach($this->campos_tabla as $valor){
            $this->$valor = $resultado[$valor];
        }
    }

    public function modificarUsuario(){
        $query = "UPDATE $this->nombre_tabla SET ";

        for($i = 1; $i < count($this->campos_tabla); $i++){
            if($i == (count($this->campos_tabla))-1){
                $query .= $this->campos_tabla[$i]." = :".$this->campos_tabla[$i];
            }else{
                $query .= $this->campos_tabla[$i]." = :".$this->campos_tabla[$i].", ";
            }
        }

        $query .= " WHERE ".$this->campos_tabla[0]." = :".$this->campos_tabla[0];
        $sentencia = Conexion::conectar()->prepare($query);

        foreach($this->campos_tabla as $valor){
            $sentencia->bindParam(":$valor", $this->$valor);
        }
        
        $sentencia->execute();
    }


}
?>