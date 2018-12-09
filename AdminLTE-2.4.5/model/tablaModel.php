<?php

require_once "config.php";
require_once "paginacionModel.php";

class Tabla
{
    protected static $nombre_tabla; //? Nombre de la tabla escrita en la clase hija
    protected static $campos_tabla; //? Array de los campos de la tabla escrito en la clase hija

    public static $paginacion;
    public static $conexion;

    //Método para conectar con PDO
    public static function Conectar()
    {
        if(!static::$conexion){
            static::$conexion = new PDO("mysql:host=".SERVIDOR_BD.";dbname=".BASEDATOS_BD.";charset=".CHARSET_BD.";", USUARIO_BD, PASSWORD_BD);
            return static::$conexion;
        }else{
            return static::$conexion;
        }
    }

    public static function consultarTodos($orden = -1, $tipo_orden = "DESC")
    {
        if($orden == -1){
            $query = "SELECT * FROM ".static::$nombre_tabla;
            $sentencia = static::Conectar()->query($query);
            $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
            return $resultado;
        }else{
            $query = "SELECT * FROM ".static::$nombre_tabla." ORDER BY $orden $tipo_orden";
            $sentencia = static::Conectar()->query($query);
            $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
            return $resultado;
        }
    }

    public static function consultarTodosPaginado($pagina_actual, $total_por_pagina)
    {
        static::$paginacion = new Paginacion($pagina_actual, $total_por_pagina, static::contar());

        $query = "SELECT * FROM ".static::$nombre_tabla." LIMIT $total_por_pagina OFFSET ".static::$paginacion->offset();
        $sentencia = static::Conectar()->query($query);
        $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $resultado;
    }

    public static function consultarId($id)
    {
        $query = "SELECT * FROM ".static::$nombre_tabla." WHERE ".static::$campos_tabla[0]." = $id";
        $sentencia = static::Conectar()->query($query);
        $resultado = $sentencia->fetch();

        $nombre_clase = get_called_class();
        $objeto = new $nombre_clase;

        foreach(static::$campos_tabla as $campo)
        {
            $objeto->$campo = $resultado[$campo];
        }
        return $objeto;
    }

    public static function toString()
    {
        $consulta = static::consultarTodos();
        $string = "";

        foreach($consulta as $valor)
        {
            foreach(static::$campos_tabla as $campo)
            {
                $string .= "$campo: "." ".$valor->$campo." ";
            }
            $string .= "<br />";
        }

        return $string;

    }

    public static function toStringId($id){
        $consulta = static::consultarId($id);
        $string = "";

        foreach(static::$campos_tabla as $campo)
        {
            $string .= "$campo: ".$consulta->$campo." ";
        }

        return $string;
    }

    public static function insertar($objeto)
    {
        $query = "INSERT INTO ".static::$nombre_tabla." (";
        $query .= implode(", ", static::$campos_tabla).") VALUES (:";
        $query .= implode(", :", static::$campos_tabla).")";

        $sentencia = static::Conectar()->prepare($query);

        foreach(static::$campos_tabla as $campo)
        {
            $sentencia->bindParam(":$campo", $objeto->$campo);
        }
        $sentencia->execute();
        return static::Conectar()->lastInsertId();
    }

    public static function modificar($objeto)
    {
        $query = "UPDATE  ".static::$nombre_tabla." SET ";
        $modificar;

        foreach(static::$campos_tabla as $campo){
            if($campo != static::$campos_tabla[0]){
                $modificar[] = "$campo = :$campo";
            }
        }

        $query .= implode(", ", $modificar)." WHERE ".static::$campos_tabla[0]." = :".static::$campos_tabla[0];

        $sentencia = static::Conectar()->prepare($query);

        foreach(static::$campos_tabla as $campo)
        {
            $sentencia->bindParam(":$campo", $objeto->$campo);
        }
        $sentencia->execute();
    }

    public static function borrar($id)
    {
        $query = "DELETE FROM ".static::$nombre_tabla." WHERE ".static::$campos_tabla[0]." = :".static::$campos_tabla[0];
        $sentencia = static::Conectar()->prepare($query);
        $sentencia->bindParam(":".static::$campos_tabla[0], $id);
        $sentencia->execute();
    }

    public static function contar()
    {
        $query = "SELECT COUNT(*) as total FROM ".static::$nombre_tabla;
        $sentencia = static::Conectar()->query($query);
        $resultado = $sentencia->fetch();
        return $resultado['total'];
    }
}
?>
