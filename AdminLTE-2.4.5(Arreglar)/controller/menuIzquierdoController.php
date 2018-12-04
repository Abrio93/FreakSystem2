<?php
    require_once("model/menuIzquierdoModel.php");

    $menu_izquierdo_titulo = new MenuIzquierdo();
    $titulo = $menu_izquierdo_titulo->getTitulo();

    $menu_izquierdo_contenido = new MenuIzquierdo();
    $contenido = $menu_izquierdo_contenido->getContenido();

    require_once("view/menu_izquierdo.php");
?>