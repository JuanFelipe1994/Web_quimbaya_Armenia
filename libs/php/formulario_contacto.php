<?php 
// codigo en el php que recibe los datos del formulario
// nombre de quien envía el correo
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$celular = $_POST['celular'];
$fijo = $_POST['fijo'];
$mensaje = $_POST['mensaje'];

// direccion que recibe el mensaje
$para = "juancancino@rmasb.com";
// asunto del mensaje
$asunto = utf8_decode("Correo Contacto Web Quimbaya");
// cabeceras del mensaje
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n\n\n";
// direccion de envio del mensaje
$cabeceras .= 'Nombre:  ' . $nombre . "\r\n\n";
$cabeceras .= 'Correo electrónico:  ' . $email . "\r\n\n";
$cabeceras .= 'Teléfono Celular:  ' . $celular . "\r\n\n";
$cabeceras .= 'Teléfono Fijo:  ' . $fijo . "\r\n\n";
$cabeceras .= 'Mensaje:  ' . $mensaje . "\r\n\n";

// direccion con copia
//$cabeceras .= 'Cc: birthdayarchive@example.com' . "\r\n";
// direccion con copia oculta
//$cabeceras .= 'Bcc: ' . $dir_email . "\r\n";
// en este espacio se puede colocar el replay o responder a
// correo de quien envía el formulario

// mensaje del formulario
//$mensaje = $_POST['mensaje'];

// Envio de correo electronico a los involucrados en la solicitud

if (mail($para, $asunto, $cabeceras)) {
	echo "funciona";
}
?>