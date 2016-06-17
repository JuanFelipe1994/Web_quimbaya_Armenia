<?php 
require('conexion.php');
// codigo en el php que recibe los datos del formulario
// nombre de quien envía el correo
$nombre = "";
$correo = "";
$telefono = "";
$pais = "";
$ciudad = "";
$enterarse = "";
$apto = "";
$fecha = "";

$fecha = date("n/Y");

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$enterarse = $_POST['enterarse'];
$pais = mysql_escape_string($_POST['pais']);
$ciudad = mysql_escape_string($_POST['ciudad']);

$apto = $_POST["id_apto"];
$actualiza = false;
$busca = false;
$sql = "";
$sql_bus = "";

//extrae y le suma una cotizacion al apartamento cotizado y almacenado en la tabla
$num_cotizacion = mysql_query("SELECT * FROM cotizaciones WHERE id_apto = '$apto'", $conexion);
if ($num_cotizacion) {
	if (mysql_num_rows($num_cotizacion) > 0) {
		$conteo = mysql_fetch_array($num_cotizacion);
		$actual = $conteo[1];
		$suma_cotizacion = $actual + 1;
		$añade_cotizacion = mysql_query("UPDATE cotizaciones SET conteo = '$suma_cotizacion' WHERE id_apto = '$apto'", $conexion);
	}
}




//guarda los datos en la tabla de registros para tener luego las estadisticas de las cotizaciones
if ($correo) {
	$sql_bus = "SELECT * FROM registros WHERE email = '$correo'";
	$busca = mysql_query($sql_bus, $conexion);
	if($busca){
		if(mysql_num_rows($busca) > 0){
			$sql = "UPDATE registros SET pais = '$pais', ciudad = '$ciudad', telefono = '$telefono' WHERE email = '$correo'";
		}
		else{
			$sql = "INSERT INTO registros (nombre, email, pais, ciudad, telefono, proyecto, fecha) VALUES ('$nombre', '$correo', '$pais', '$ciudad', $telefono, '$enterarse', '$fecha')";
		}
	}
	else{
		if ($nombre && $correo && $telefono && $enterarse) {
			$sql = "INSERT INTO registros (nombre, email, pais, ciudad, telefono, proyecto, fecha) VALUES ('$nombre', '$correo', '$pais', '$ciudad', $telefono, '$enterarse', '$fecha')";
		}
	}
	$actualiza = mysql_query($sql, $conexion);
	if($actualiza){
		// direccion que recibe el mensaje
		$para = "juancancino@rmasb.com";
		// asunto del mensaje
		$asunto = utf8_decode("Datos de interesado en un apartamento del Edificio Quimbaya");
		// cabeceras del mensaje
		$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
		$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n\n\n";
		// direccion de envio del mensaje
		$cabeceras .= 'Datos del interesado:'."\r\n\n";
		$cabeceras .= 'Nombre:  ' . $nombre . "\r\n\n";
		$cabeceras .= 'Correo electrónico:  ' . $correo . "\r\n\n";
		$cabeceras .= 'Teléfono:  ' . $telefono . "\r\n\n";
		$cabeceras .= 'Medio con el que se enteró del proyecto:  ' . $enterarse . "\r\n\n";
		$cabeceras .= 'País:  ' . $_POST['pais'] . "\r\n\n";
		$cabeceras .= 'Ciudad:  ' . $_POST['ciudad'] . "\r\n\n";
		$cabeceras .= 'Apartamento cotizado:  ' . $apto . "\r\n\n";
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
			echo $sql;
		}
	}else{
		echo $sql;
	}
}

?>