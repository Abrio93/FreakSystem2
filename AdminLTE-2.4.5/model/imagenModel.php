<?php

class Imagen {

    public $id;
    public $archivo;
    public $tipo;
    public $peso;
    private $nombre_tmp;
    private $img_dir = "img/avatar";

    public $errores = array();
    protected $codigos_error_upload = array(
        UPLOAD_ERR_OK => "No se ha producido ningún error",
        UPLOAD_ERR_INI_SIZE => "El tamaño del archivo excede al máximo indicado en el php.ini",
        UPLOAD_ERR_FORM_SIZE => "El tamaño del archivo excede el máximo para este formulario",
        UPLOAD_ERR_PARTIAL => "El archivo ha sido subido parcialmente",
        UPLOAD_ERR_NO_FILE => "El archivo no existe",
        UPLOAD_ERR_NO_TMP_DIR => "El directorio temporal no existe",
        UPLOAD_ERR_CANT_WRITE => "No se puede escribir en el disco duro",
        UPLOAD_ERR_EXTENSION => "Error en una extensión PHP"
    );

    public function adjuntar_imagen($info, $id_usuario){
        if(!$info || empty($info) || !is_array($info)){
            $this->errores[] = "No se ha pasado ninguna información de archivo";
            return false;
        }elseif(!getimagesize($info['tmp_name'])){
            $this->errores[] = " El archivo no es una imagen";
            return true;
        }elseif($info['error'] != 0){
            $this->errores[] = $this->codigos_error_upload[$info['error']];
            return true;
        }else{
            $this->archivo = $id_usuario."-".basename($info['name']);
            $this->tipo = $info['type'];
            $this->peso = $info['size'];
            $this->nombre_tmp = $info['tmp_name'];
            return true;
        }
    }

    public function crear_imagen(){
        if(!empty($this->errores)){
            return false;
        }

        if(empty($this->nombre_tmp)){
            $this->errores[] = "No se tienen los datos suficientes.";
            return false;
        }

        $nueva_ruta = $this->img_dir."/".$this->archivo;

        if(file_exists($nueva_ruta)){
            $this->errores[] = "No se puede utilizar ese nombre de archivo.";
            return false;
        }

        if(move_uploaded_file($this->nombre_tmp, $nueva_ruta)){
            return true;
        }else{
            $this->errores[] = "No se ha podido mover el archivo subido a una ubicación segura.";
            return false;
        }
    }

    public function ruta_imagen(){
        return $this->img_dir."/".$this->archivo;
    }

    public static function eliminar_imagen($ruta){
        unlink($ruta);
    }
}
?>