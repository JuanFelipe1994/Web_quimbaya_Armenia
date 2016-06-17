<?php  
	require('../../php/conexion.php');

	$apto = $_POST['apto'];
	$titulo = $_POST['titulo'];
	$monto = $_POST['monto'];
	$fecha = $_POST['fecha'];
	//ruta donde se van a guardar las imagenes
	$carpeta = '../uploads/';
	$nombre_img = $_FILES['imagen']['name'];
	$tipo_img = $_FILES['imagen']['type'];
	$tamano_img = $_FILES['imagen']['size'];

	//muevo la imagen desde su ubicacion temporal al directorio definitivo
	move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta.$nombre_img);
	//guardamos en la base de datos el nombre del archivo
	$resultado = mysql_query("INSERT INTO comprobantes (id_imagen, imagen_nombre, imagen_tipo, imagen_tamano, id_apartamento, monto, fechapago) VALUES ('', '$nombre_img', '$tipo_img', '$tamano_img', '$apto', $monto, '$fecha')", $conexion);

?>