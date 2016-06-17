<?php  
	require('../../php/conexion.php');

	//datos traidos del formulario del calendario
	$titulo = '';
	$tipo = '';
	$apto = '';
	$fec_ini = '';
	$fec_fin = '';

	$titulo = $_POST['evento'];
	$tipo = $_POST['cal_tipo'];
	$apto = $_POST['cal_apto'];
	$fec_ini = $_POST['fecha_ini'];
	$fec_fin = $_POST['fecha_fin'];

	$guarda = mysql_query("INSERT INTO calendario (evento, fecha_inicio, fecha_fin, tipo_evento, apartamento) VALUES ('$titulo', '$fec_ini', '$fec_fin', '$tipo', '$apto')", $conexion);

?>