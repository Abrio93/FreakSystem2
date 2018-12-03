<?php

//TODO IMPORTAR XLSX (ESCEL)

require_once "PHPExcel/IOFactory.php"; //? INCLUYO LA CLASE IOFACTORY DE PHPEXCEL

if(isset($_FILES['archivo'])){

    $nombre_archivo = date('d-m-Y-H-i-s')."-".$_FILES["archivo"]["name"]; //? NOMBRE DEL ARCHIVO
    $nombre_archivo_tmp = $_FILES["archivo"]["tmp_name"]; //? NOMBRE DEL ARCHIVO
    $tipo_archivo = pathinfo($nombre_archivo,PATHINFO_EXTENSION); //?TIPO DE ARCHIVO
    $tipo_archivo = strtolower($tipo_archivo); //? TIPO DE ARCHIVO EN MINUSCULAS

    if($tipo_archivo == "xlsx"){ //? SOLO SE PERMITEN TIPO DE ARCHIVOS XLSX

        if(move_uploaded_file($nombre_archivo_tmp, $nombre_archivo)){ //? COMPRUEBO QUE EL ARCHIVO SE A SUBIDO CON EXITO

            define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />'); //! BUSCAR INFORMACION
            $objeto = PHPExcel_IOFactory::load($nombre_archivo); //? CREA EL OBJETO
            $hoja = $objeto->getSheet(0); //? RECOJE LA HOJA COMPLETA
            $numero_filas = $hoja->getHighestRow(); //? NUMERO DE FILAS QUE CONTIENE EL ARCHIVO XLSX

            for ($i = 2; $i <=  $numero_filas; $i++) {
                $A = $objeto->getActiveSheet()->getCell("A$i")->getValue(); //? RECOJO VALOR DE LA FILA A DESDE EL 2
                echo "<script>alert('".$A."')</script>";
            }
                
        }

    }
}else{
    ?>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label class="control-label">Selecciona archivo</label>
                <input type="file" class='form-control' name="archivo" required>
            </div>	
            <button type="submit" class="btn btn-primary"> Importar datos</button>
        </form>
    <?php
}
?>