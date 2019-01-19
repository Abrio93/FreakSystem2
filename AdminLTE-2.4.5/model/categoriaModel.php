<?php

require_once "tablaModel.php";

class Categoria extends Tabla{

    public $id;
    public $categoria;
    public $fecha;

    protected static $nombre_tabla = "categorias";
    protected static $campos_tabla = array("id", "categoria", "fecha");
}


?>
