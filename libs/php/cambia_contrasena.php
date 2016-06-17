<?php  
	session_start();
	require('conexion.php');

	$contrasena = $_GET['contrasena'];
	$usuario = $_GET['usuario'];
	//cambia la contraseña actual por la nueva contraseña temporal
	$cambio = mysql_query("UPDATE usuarios SET clave = '$contrasena' WHERE id_usuario = $usuario", $conexion);
?>