<?php  
	require('../../php/conexion.php');
	
	$apartamento = '';
	$nombre = '';
	$apellido = '';
	$telefono = '';
	$direccion = '';
	$cedula = '';
	$email = '';
	$pago = '';

	$apartamento = $_POST['apto'];
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$telefono = $_POST['telefono'];
	$direccion = $_POST['direccion'];
	$cedula = $_POST['cedula'];
	$email = $_POST['email'];
	$pago = $_POST['pago'];

	//guarda los datos del cliente del apartamento en la tabla clientes
	//$guarda = mysql_query("INSERT INTO clientes (apartamento, nombre, apellido, telefono, direccion, cedula, email, pago) VALUES ('$apartamento', '$nombre', '$apellido', $telefono, '$direccion', $cedula, '$email', '$pago')", $conexion);

	//cambia el estado del apartamento de la tabla aptos
	$cambio = mysql_query("UPDATE clientes SET nombre = '$nombre', apellido = '$apellido', telefono = $telefono, direccion = '$direccion', cedula = $cedula, email = '$email', pago = '$pago'  WHERE apartamento = '$apartamento'", $conexion);

?>