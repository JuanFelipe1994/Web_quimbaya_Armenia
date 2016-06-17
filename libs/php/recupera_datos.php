<?php 
	require('conexion.php');
	$nombre = "";
	$pais = "";
	$ciudad = "";
	$telefono = "";
	$enterarse = "";
	$mail = "";
	$mail = $_GET['mail'];
	
	$guardado = "SELECT * FROM registros WHERE email = '$mail'";
	$busca = mysql_query($guardado, $conexion);

	if ($busca) {
		if (mysql_num_rows($busca) > 0) {
			while($datos = mysql_fetch_array($busca)){
				$nombre = $datos[1];
				$pais = $datos[3];
				$ciudad = $datos[4];
				$telefono = $datos[5];
				$enterarse = $datos[6];
			}
		?>
			<script type="text/javascript">
				$("#input_nombre").val("<?php echo $nombre ?>");
				$("#input_pais").val("<?php echo $pais ?>");
				$("#input_ciudad").val("<?php echo $ciudad ?>");
				$("#input_telefono").val("<?php echo $telefono ?>");
				$("#input_enterarse").val("<?php echo $enterarse ?>");
				$("#acepto_informacion").prop('checked',true);
			</script>
		<?php
		}
	}else{

	}
?>
	