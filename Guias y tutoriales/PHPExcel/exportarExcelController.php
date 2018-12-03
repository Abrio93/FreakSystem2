<?php

    require_once "PHPExcel.php";

    // Create your database query
    $query = "SELECT * FROM categorias";

    $conexion = mysqli_connect("localhost", "root", "", "carrocompras");

    // Execute the database query
    $result = mysqli_query($conexion, $query) or die(mysqli_error());


    // Create new PHPExcel object
    $objPHPExcel = new PHPExcel();

    // Add some data
    $objPHPExcel->setActiveSheetIndex(0);

    $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Campo1');

    $rowCount = 2; //new

    while($row = mysqli_fetch_array($result)){ 
        $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $row[0]);

        // Increment the Excel row counter
        $rowCount++; 
    }

    // Rename worksheet
    $objPHPExcel->getActiveSheet()->setTitle('Excel');


    // Set active sheet index to the first sheet, so Excel opens this as the first sheet
    $objPHPExcel->setActiveSheetIndex(0);


    // Redirect output to a client’s web browser (Excel5)
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="Export_Excel_'.date('Y-m-d').'.xls"');
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