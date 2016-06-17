<?php  
	require('conexion.php');

	$correo = $_GET['correo'];

	//genera la contraseña aleatoria
	function generaPass(){
	    //Se define una cadena de caractares.
	    $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
	    //Obtenemos la longitud de la cadena de caracteres
	    $longitudCadena=strlen($cadena);
	    //Se define la variable que va a contener la contraseña
	    $pass = "";
	    //Se define la longitud de la contraseña
	    $longitudPass=5;
	    //Creamos la contraseña
	    for($i=1 ; $i<=$longitudPass ; $i++){
	        //Definimos numero aleatorio entre 0 y la longitud de la cadena de caracteres-1
	        $pos=rand(0,$longitudCadena-1);
	     
	        //Vamos formando la contraseña en cada iteraccion del bucle, añadiendo a la cadena $pass la letra correspondiente a la posicion $pos en la cadena de caracteres definida.
	        $pass .= substr($cadena,$pos,1);
	    }
	    return $pass;
	}

	// direccion que recibe el mensaje
	$tempCla = generaPass();
	$para = $correo;
	// asunto del mensaje
	$asunto = utf8_decode("Recuperación de contraseña Proyecto Quimbaya Armenia");
	// cabeceras del mensaje
	$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
	$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n\n\n";
	// direccion de envio del mensaje
	$cabeceras .= 'nueva Contraseña temporal:  ' . $tempCla;
	$cabeceras .= "\r\n\n\n" .'Nota: Si no ha pedido un cambio de contraseña o no obtuvo la clave temporal por favor comunicarse con R+B Diseño Experimental ' . "\r\n\n" . 'info@rmasb.com';
	

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

	//cambia la contraseña actual por la nueva contraseña temporal
	$cambio = mysql_query("UPDATE usuarios SET clave = '$tempCla' WHERE usuario = '$correo'", $conexion);
?>