<?php

    require_once "PHPExcel.php";

    $nombre_tabla = "libros";

    $conexion = new PDO('mysql:host=localhost;dbname=carrocompras;charset=utf8;','root','');
    
    $query = "DESCRIBE $nombre_tabla";
    $sentencia = $conexion->query($query);
    $resultado = $sentencia->fetchAll(PDO::FETCH_COLUMN);
    
    $query2 = "SELECT * FROM $nombre_tabla";
    $sentencia2 = $conexion->query($query2);
    $resultado2 = $sentencia2->fetchAll(PDO::FETCH_ASSOC);

    // Create new PHPExcel object
    $objPHPExcel = new PHPExcel(); //? CREO EL OBJETO

    // Add some data
    $objPHPExcel->setActiveSheetIndex(0);

    //? ESCRIBO EL NOMBRE DE LA COLUMNA EN LA HOJA DE EXCEL (chr DEVUELVE EL CARACTER SEGUN SU NUMERO --> 65 = A, 66 = B,...)
    foreach($resultado as $key => $valor){ //? RECORRO EL ARRAY
        $objPHPExcel->getActiveSheet()->SetCellValue(chr($key + 65)."1", $valor);
        
    }

    $fila = 2;
    $letra = 65;

    foreach($resultado2 as $valor){
        foreach($valor as $valor2){
            $objPHPExcel->getActiveSheet()->SetCellValue(chr($letra).$fila, $valor2);
            $letra++;
        }
        $fila++;
        $letra = 65;
    }

    // Rename worksheet
    $objPHPExcel->getActiveSheet()->setTitle($nombre_tabla);


    // Set active sheet index to the first sheet, so Excel opens this as the first sheet
    $objPHPExcel->setActiveSheetIndex(0);


    // Redirect output to a client’s web browser (Excel5)
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="Tabla_'.$nombre_tabla."_".date('d-m-Y-H-i-s').'.xls"');
    header('Cache-Control: max-age=0');
    // If you're serving to IE 9, then the following may be needed
    header('Cache-Control: max-age=1');

    // If you're serving to IE over SSL, then the following may be needed
    header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
    header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
    header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
    header ('Pragma: public'); // HTTP/1.0

    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
    $objWriter->save('php://output');
    exit;

?>