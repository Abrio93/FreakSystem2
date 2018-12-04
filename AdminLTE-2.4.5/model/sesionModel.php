<?php

    class Sesion{
        
        public $usuario;
        public $nombre;
        public $apellidos;
        public $avatar;
        private $logueado = false;
        
        public function __construct(){
            session_start();
            $this->comprobar_logueo();
        }
        
        private function comprobar_logueo(){
            
            if(isset($_SESSION["usuario"])){
                $this->usuario = $_SESSION["usuario"];
                $this->logueado = true;
            }else{
                unset($this->usuario);
                $this->logueado = false;
            }
        }
        
        public function esta_logueado(){
            return $this->logueado;
        }
        
        public function loguearse($usuario){
            if($usuario){
                $this->usuario = $_SESSION["usuario"] = $usuario;
                $this->logueado = true;
            }
        }
        
        public function desloguearse(){
            unset($this->usuario);
            unset($_SESSION["usuario"]);
            $this->logueado = false;
        }
    }
?>