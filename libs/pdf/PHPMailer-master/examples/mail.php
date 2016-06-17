<?php
/**
 * This example shows sending a message using PHP's mail() function.
 */
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$usuario = $_GET['usuario'];
//$telefono = $_POST['telefono'];
//$enterarse = $_POST['enterarse'];
//$pais = $_POST['pais'];
//$ciudad = $_POST['ciudad'];

//$apto = $_POST["id_apto"];

$empresa = utf8_decode('R + B Diseño Experimental');
$asunto = utf8_decode('Cotización Proyecto Quimbaya Armenia');
require '../PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer;
//Set who the message is to be sent from
$mail->setFrom('info@rmasb.com', 'Quimbaya');
//Set an alternative reply-to address
$mail->addReplyTo('info@rmasb.com', $empresa);
//Set who the message is to be sent to
$mail->addAddress($correo, $nombre);
//Set the subject line
$mail->Subject = $asunto;
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
//Attach an image file
$mail->addAttachment('../../fpdf/tutorial/Cotizacion-Quimbaya-armenia-'.$correo.'.pdf');

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}
