<?php

require_once "tablaModel.php";

class Log extends Tabla{

    public $id_log;
    public $id_usuario;
    public $accion;
    public $fecha;

    protected static $nombre_tabla = "log";
    protected static $campos_tabla = array("id_log", "id_usuario", "accion", "fecha");

    public static function fecha($fecha, $funcion = 0){
        $fecha = new DateTime($fecha);
        $ahora = new DateTime();
        $diferencia = $fecha->diff($ahora);
        if($diferencia->y > 0){
            $f = "Hace mas de 1 año";
        }elseif($diferencia->m > 0){
            $f = "Hace $diferencia->m meses";
        }elseif($diferencia->d > 0){
            $f = "Hace $diferencia->d dias";
        }elseif($diferencia->h > 0){
            $f = "Hace $diferencia->h horas";
        }elseif($diferencia->i > 0){
            $f = "Hace $diferencia->i minutos";
        }elseif($diferencia->s >= 0 ){
            $f = "Ahora mismo";
        }

        if($funcion != 0){
            return "Hace $diferencia->y años, $diferencia->m meses, $diferencia->d dias, $diferencia->h horas, $diferencia->i minutos, $diferencia->s segundos";
        }else{
            return $f;
        }
    }
}


?>
