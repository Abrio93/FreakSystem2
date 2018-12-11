<?php

require_once "tablaModel.php";

class Grupo extends Tabla{

    public $id_grupo;
    public $grupo;
    public $permiso;
    public $fecha;

    protected static $nombre_tabla = "grupos";
    protected static $campos_tabla = array("id_grupo", "grupo", "permiso", "fecha");
}


?>
