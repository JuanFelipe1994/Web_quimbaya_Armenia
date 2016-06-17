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

	$retorna = mysql_query("SELECT * FROM clientes WHERE apartamento = '$IDapto'", $conexion);
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
	 	}
	 } 
?>
<div id="SES_formulario">
	<form id="SES_form_venta">
		<div class="form-group">
			<label>Apartamento</label>
			<input type="text" placeholder="<?php echo $apt; ?>" class="form-control" name="apto" id="apto_cliente">
		</div>
		<div class="form-group">
			<label>Nombres Completos</label>
			<input type="text" placeholder="<?php echo $nom; ?>" class="form-control" name="nombre" id="nombre_cliente">
		</div>
		<div class="form-group">
			<label>Apellidos Completos</label>
			<input type="text" placeholder="<?php echo $ape; ?>" class="form-control" name="apellido" id="apellido_cliente">
		</div>
		<div class="form-group">
			<label>Teléfono</label>
			<input type="number" placeholder="<?php echo $tel; ?> " class="form-control" name="telefono" id="telefono_cliente">
		</div>
		<div class="form-group">
			<label>Dirección</label>
			<input type="text" placeholder="<?php echo $dir; ?>" class="form-control" name="direccion" id="direccion_cliente">
		</div>
		<div class="form-group">
			<label>Número de Cédula</label>
			<input type="number" placeholder="<?php echo $ced; ?>" class="form-control" name="cedula" id="cedula_cliente">
		</div>
		<div class="form-group">
			<label>Correo Electrónico</label>
			<input type="email" placeholder=" <?php echo $ema; ?> " class="form-control" name="email" id="email_cliente">
		</div>
		<div class="form-group">
			<label>Medio de Pago</label>
			<input type="text" placeholder="<?php echo $pag; ?>" class="form-control" name="pago" id="pago_cliente">
		</div>
		<div class="form-group">
			<button type="button" class="btn btn-success" id="guarda_cliente">Guardar</button>
			<button type="button" class="btn btn-danger" id="cierra_formulario">Cerrar</button>
		</div>
	</form>
</div>

<script type="text/javascript">
	$("#guarda_cliente").on("click",function(){
		editaCliente();
		$("#SES_contenido").load('datos.php');
	});
	$("#cierra_formulario").on("click",function(){
		cierraModal();
	});
</script>
