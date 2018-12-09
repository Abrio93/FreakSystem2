<?php

require_once "tablaModel.php";

class Log extends Tabla{

    public $id_log;
    public $id_usuario;
    public $accion;
    public $fecha;

    protected static $nombre_tabla = "log";
    protected static $campos_tabla = array("id_log", "id_usuario", "accion", "fecha");
}


?>
