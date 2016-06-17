<?php  
	require('../../php/conexion.php');
	$IDapto = $_GET['IDapto'];

	$apt = '';
	$nom = '';
	$ape = '';
	$tel = '';
	$dir = '';
	$ced = '';
	$ema = '';
	$pag = '';
	$dep = '';
	$par = '';

	$retorna = mysql_query("SELECT * FROM clientes WHERE apartamento = $IDapto", $conexion);
	if ($retorna) {
	 	if (mysql_num_rows($retorna) > 0) {
	 		$celda = mysql_fetch_array($retorna);

	 		$apt = $celda[1];
	 		$nom = $celda[2];
	 		$ape = $celda[3];
	 		$tel = $celda[4];
	 		$dir = $celda[5];
	 		$ced = $celda[6];
	 		$ema = $celda[7];
	 		$pag = $celda[8];
	 		$dep = $celda[9];
			$par = $celda[10];
	 	}
	 } 

	
?>
<div id="SES_formulario">
	<form id="SES_form_venta">
		<div class="form-group">
			<label>Apartamento</label>
			<input type="text" placeholder="<?php echo $apt; ?>" class="form-control" name="apto" id="apto_cliente" disabled>
		</div>
		<div class="form-group">
			<label>Nombres Completos</label>
			<input type="text" placeholder="<?php echo $nom; ?>" class="form-control" name="nombre" id="nombre_cliente" disabled>
		</div>
		<div class="form-group">
			<label>Apellidos Completos</label>
			<input type="text" placeholder="<?php echo $ape; ?>" class="form-control" name="apellido" id="apellido_cliente" disabled>
		</div>
		<div class="form-group">
			<label>Teléfono</label>
			<input type="number" placeholder="<?php echo $tel; ?> " class="form-control" name="telefono" id="telefono_cliente" disabled>
		</div>
		<div class="form-group">
			<label>Dirección</label>
			<input type="text" placeholder="<?php echo $dir; ?>" class="form-control" name="direccion" id="direccion_cliente" disabled>
		</div>
		<div class="form-group">
			<label>Número de Cédula</label>
			<input type="number" placeholder="<?php echo $ced; ?>" class="form-control" name="cedula" id="cedula_cliente" disabled>
		</div>
		<div class="form-group">
			<label>Correo Electrónico</label>
			<input type="email" placeholder=" <?php echo $ema; ?> " class="form-control" name="email" id="email_cliente" disabled>
		</div>
		<div class="form-group">
			<label>Medio de Pago</label>
			<input type="text" placeholder="<?php echo $pag; ?>" class="form-control" name="pago" id="pago_cliente" disabled>
		</div>
		<div class="form-group">
			<label>Depósito</label>
			<input type="text" placeholder="<?php echo $dep; ?>" class="form-control" name="pago" id="pago_cliente" disabled>
		</div>
		<div class="form-group">
			<label>parqueadero</label>
			<input type="text" placeholder="<?php echo $par; ?>" class="form-control" name="pago" id="pago_cliente" disabled>
		</div>
		<div class="form-group">
			<label>Boletín de Ventas</label>
			<?php 
				//trae la imagen de la carpeta correspondiente de su apto
				$trae_comprobante = mysql_query("SELECT * FROM comprobantes WHERE id_apartamento = '$apt'", $conexion);
				while ($img = mysql_fetch_array($trae_comprobante)) {
					$dir_img = $img[1];
					?>
					<div class="SES_boletin_img">
						<img src="../uploads/<?php echo $dir_img;?>">
						<div class="separador"></div>
						<strong>monto: $<?php echo $img[5] ?></strong>
						<div class="separador"></div>
						<strong>fecha: <?php echo $img[6] ?></strong>
					</div>

					<?php
				} 
			?>
		</div>
		<div class="form-group">
			<button type="button" class="btn btn-danger" id="cierra_formulario">Cerrar</button>
		</div>
	</form>
</div>

<script type="text/javascript">
	$("#cierra_formulario").on("click",function(){
		cierraModal();
	});
</script>
