<?php

require "PHPMailer.php";
require "Exception.php";
require "SMTP.php";

$mail = new PHPMailer\PHPMailer\PHPMailer;
$mail->isSMTP();//? USAR SMTP

//INFO PARA SUPRIMIR ERROR (BUSCADO EN INTERNET)
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
//INFO PARA SUPRIMIR ERROR (BUSCADO EN INTERNET)

$mail->SMTPDebug = 0; //?DEBUGGING SMTP (0 - OFF, 1 - MENSAJES DE CLIENTES, 2 - MENSAJES DE CLIENTES Y SERVIDORES)
$mail->Host = 'smtp.gmail.com';//? SERVIDOR GMAIL
$mail->Port = 587;//?PUERTO AUTENTICACION SMTP Y TLS
$mail->SMTPSecure = 'tls';//? ENCRIPTACION (SSL - DEPRECATED)
$mail->SMTPAuth = true;//? AUTENTICACIÓN SMTP

$mail->Username = "CORREO";//? MI CORREO
$mail->Password = "CONTRASEÑA";//? CONTRASEÑA DE MI CORREO

$mail->setFrom('CORREO', 'NOMBRE');//? DE QUIEN SE ENVIA (HAY QUE PONER EL MISMO CORREO DEL USERNAME)
$mail->addReplyTo('CORREO', 'NOMBRE');//? A QUIEN RESPONDER (SE PUEDE PONER OTRO CORREO)
$mail->addAddress('CORREO', 'NOMBRE');//? A QUIEN SE ENVIA
$mail->Subject = 'Ejemplo CORREO';//? ASUNTO DEL MENSAJE
//! $mail->msgHTML(file_get_contents('contents.html'), __DIR__);
$mail->msgHTML("MENSAJE");//? MENSAJE
//!$mail->AltBody = 'This is a plain-text message body';//? (BUSCAR INFORMACION DE QUE ES) <============
//!$mail->addAttachment('images/phpmailer_mini.png');//? ADJUNTAR IMAGEN

if (!$mail->send()) {
    echo "ERROR: ".$mail->ErrorInfo;
} else {
    echo "Mensaje enviado";
}