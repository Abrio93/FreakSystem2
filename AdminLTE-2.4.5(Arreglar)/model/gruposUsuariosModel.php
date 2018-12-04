<?php

require_once("model/conexionModel.php");

class GruposUsuarios{
    public $id_grupo_usuario;
    public $nombre_grupo_usuario;
    public $permisos;
    public $fecha_creacion;
    public $fecha_modificacion;

    public $nombre_tabla = "grupo_usuarios";
    public $campos_tabla = array("id_grupo_usuario", "nombre_grupo_usuario", "permisos", "fecha_creacion", "fecha_modificacion");

    public function getGrupos(){
        $query = "SELECT * FROM $this->nombre_tabla";
        $sentencia = Conexion::conectar()->query($query);
        $resultado = $sentencia->fetchAll();
        return $resultado;
    }

    public function getGrupo($id){
        $query = "SELECT * FROM $this->nombre_tabla WHERE ".$this->campos_tabla[0]." = $id";
        $sentencia = Conexion::conectar()->query($query);
        $resultado = $sentencia->fetch();
        foreach($this->campos_tabla as $valor){
            $this->$valor = $resultado[$valor];
        }
    }

    public function modificarGrupo(){
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

    public function insertarGrupo(){
        $query = "INSERT INTO $this->nombre_tabla (nombre_grupo_usuario, permisos, fecha_creacion, fecha_modificacion) VALUES (:nombre_grupo_usuario, :permisos, :fecha_creacion, :fecha_modificacion)";
        $sentencia = Conexion::conectar()->prepare($query);
        $sentencia->bindParam(":nombre_grupo_usuario", $this->nombre_grupo_usuario);
        $sentencia->bindParam(":permisos", $this->permisos);
        $sentencia->bindParam(":fecha_creacion", $this->fecha_creacion);
        $sentencia->bindParam(":fecha_modificacion", $this->fecha_modificacion);
        $sentencia->execute();
    }

    public function borrarGrupo(){
        $query = "DELETE FROM $this->nombre_tabla WHERE id_grupo_usuario = :id_grupo_usuario";
        $sentencia = Conexion::conectar()->prepare($query);
        $sentencia->bindParam(":id_grupo_usuario", $this->id_grupo_usuario);
        $sentencia->execute();
    }


}
?>