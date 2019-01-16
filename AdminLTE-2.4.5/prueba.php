<?php

    if(isset($_POST['datos'])){
        $jsondata = array();
        $jsondata['success'] = true;
        $jsondata['message'] = 'Hola! El valor recibido es correcto.';
        echo json_encode($jsondata);
    }

?>