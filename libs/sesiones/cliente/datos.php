<?php  
	require('../../php/conexion.php');

	$user = $_GET['user'];
?>

<div id="SES_tabla_datos">
	<?php  
		//datos principales del cliente
		$extrae = mysql_query("SELECT * FROM clientes WHERE email = '$user'", $conexion);
		$dato = mysql_fetch_array($extrae);

		//trae los comprobantes del cliente
		$id_apto = $dato[1];
		$extrae_comprobante = mysql_query("SELECT * FROM comprobantes WHERE id_apartamento = $id_apto", $conexion);
	?>
	<strong class="SESCLI_titulo">Apartamento: </strong><span class="SESCLI_dato"><?php echo $dato[1]; ?></span><br>
	<strong class="SESCLI_titulo">Propietario: </strong><span class="SESCLI_dato"><?php echo $dato[2]. " " .$dato[3]; ?></span><br>
	<strong class="SESCLI_titulo">Teléfono: </strong><span class="SESCLI_dato"><?php echo $dato[4]; ?></span><br>
	<strong class="SESCLI_titulo">Dirección: </strong><span class="SESCLI_dato"><?php echo $dato[5]; ?></span><br>
	<strong class="SESCLI_titulo">Número de Cédula: </strong><span class="SESCLI_dato"><?php echo $dato[6]; ?></span><br>
	<strong class="SESCLI_titulo">Correo Electrónico: </strong><span class="SESCLI_dato"><?php echo $dato[7]; ?></span><br>
	<strong class="SESCLI_titulo">Forma de Pago: </strong><span class="SESCLI_dato"><?php echo $dato[8]; ?></span><br>
	<strong class="SESCLI_titulo">Número de Depósito: </strong><span class="SESCLI_dato"><?php echo $dato[9]; ?></span><br>
	<strong class="SESCLI_titulo">Número(s) de Parqueadero(s): </strong><span class="SESCLI_dato"><?php echo $dato[10]; ?></span><br>
	<strong class="SESCLI_titulo">Comprobantes de Pagos y documentos escaneados:</strong><br>
	<?php  
		while ($comprobante = mysql_fetch_array($extrae_comprobante)) {
			$img_comp = $comprobante[1];
			?>
				<div class="SES_content_comprobantes">
					<div class="SES_img_comprobante">
						<img src="../uploads/<?php echo $img_comp;?>">
					</div>
					<div class="SES_datos_comprobante">
						<strong>Monto: </strong><span><?php echo $comprobante[5]; ?></span><br>
						<strong>Fecha de pago: </strong><span><?php echo $comprobante[6]; ?></span><br>
					</div>
				</div>
				<div class="SESCLI_linea_separacion"></div>
			<?php
		}
	?>
</div>

<script type="text/javascript">
	
</script>