<?php

require_once "tablaModel.php";

class Producto extends Tabla{

    public $id;
    public $id_categoria;
    public $codigo;
    public $descripcion;
    public $imagen;
    public $stock;
    public $precio_compra;
    public $precio_venta;
    public $ventas;
    public $fecha;

    protected static $nombre_tabla = "productos";
    protected static $campos_tabla = array("id", "id_categoria", "codigo", "descripcion", "imagen", "stock", "precio_compra", "precio_venta", "ventas", "fecha");

    public static function consultarSQL(){
        $query = "SELECT ".static::$nombre_tabla.".*, categorias.categoria FROM ".static::$nombre_tabla.", categorias WHERE ".static::$nombre_tabla.".id_categoria = categorias.id";
        $sentencia = static::Conectar()->query($query);
        $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $resultado;
    }
}


?>
