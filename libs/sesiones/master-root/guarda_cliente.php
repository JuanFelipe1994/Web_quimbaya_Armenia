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
	$deposito = '';
	$parqueadero = '';
	$monto = '';
	$fechapago = '';

	$apartamento = $_POST['apto'];
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$telefono = $_POST['telefono'];
	$direccion = $_POST['direccion'];
	$cedula = $_POST['cedula'];
	$email = $_POST['email'];
	$pago = $_POST['pago'];
	$deposito = $_POST['deposito'];
	$parqueadero = $_POST['parqueadero'];
	$parq = explode(",", $parqueadero);
	$monto = $_POST['monto'];
	$fechapago = $_POST['fechapago'];

	//guarda los datos del cliente del apartamento en la tabla clientes
	$guarda = mysql_query("INSERT INTO clientes (apartamento, nombre, apellido, telefono, direccion, cedula, email, pago, deposito, parqueadero) VALUES ('$apartamento', '$nombre', '$apellido', $telefono, '$direccion', $cedula, '$email', '$pago', '$deposito', '$parqueadero')", $conexion);

	//guarda el archivo adjunto .PDF del cliente
	//ruta donde se van a guardar las imagenes
	$carpeta = '../uploads/';
	//recibo los datos de la imagen
	$nombre_img = $_FILES['imagen']['name'];
	$tipo_img = $_FILES['imagen']['type'];
	$tamano_img = $_FILES['imagen']['size'];
	//muevo la imagen desde su ubicacion temporal al directorio definitivo
	move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta.$nombre_img);
	//guardamos en la base de datos el nombre del archivo
	$resultado = mysql_query("INSERT INTO comprobantes (id_imagen, imagen_nombre, imagen_tipo, imagen_tamano, id_apartamento, monto, fechapago) VALUES ('', '$nombre_img', '$tipo_img', '$tamano_img', '$apartamento', $monto, '$fechapago')", $conexion);

	//cambia el estado del apartamento de la tabla aptos
	$cambio = mysql_query("UPDATE aptos SET estado = 'vendido' WHERE apto = $apartamento", $conexion);

	//cambia el estado del depósito seleccionado
	$cambio_depo = mysql_query("UPDATE depositos SET estado = 'no_disponible' WHERE id_deposito = '$deposito'");

	//cambia los estados de los apartamentos en la tabla apartamentos
	foreach ($parq as $key => $value) {
		$cambio_parq = mysql_query("UPDATE parqueaderos SET estado = 'no_disponible' WHERE id_parqueadero = $value");
	}
?>