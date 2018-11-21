<?php
require_once("includes/inicializar.php");

(session_status() == 1) ? session_start() : null;

$titulo_pagina = "FreakSystem - Inicio";

$nombre_empresa = "<b>Freak</b>System";

$fichero = pathinfo(__FILE__)['basename'];

include(VISTAS."index.view.php");
?>