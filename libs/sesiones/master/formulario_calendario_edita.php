<?php  
	require('../../php/conexion.php');
	$id = $_GET['id'];

	$consulta = mysql_query("SELECT * FROM calendario WHERE id_evento = '$id'", $conexion);
	$dato = mysql_fetch_array($consulta);
?>
<div id="SES_form_calendario">
	<form id="formulario_calendario_crea">
		<div class="form-group">
			<label>Titulo del Evento</label>
			<div class="content_contenido derecha">
				<input type="text" name="evento" value="<?php echo $dato[1]; ?>" disabled>
			</div>
		</div>
		<div class="separador"></div>
		<div class="form-group">
			<label>Tipo de Evento</label>
			<div class="content_contenido derecha elegir_tipo">
				<input type="text" name="cal_tipo" value="<?php echo $dato[4]; ?>" disabled>
			</div>
			
		</div>
		<div class="separador"></div>
		<div class="form-group">
			<label>Apartamento</label>
			<div class="content_contenido derecha elegir_apto">
				<input type="text" name="cal_apto" value="<?php echo $dato[5]; ?>" disabled>
			</div>	
		</div>
		<div class="separador"></div>
		<div class="form-group">
			<label>Fecha de inicio</label>
			<div class="content_contenido derecha">
				<input type="date" value="<?php echo $dato[2]; ?>" disabled name="fecha_ini">
			</div>
		</div>
		<div class="separador"></div>
		<div class="form-group">
			<label>Fecha final</label>
			<div class="content_contenido derecha">
				<input type="date" value="<?php echo $dato[3]; ?>" disabled name="fecha_fin">
			</div>
		</div>
		<div class="separador"></div>
		<button type="button" class="btn btn-danger" id="cal_close">Cerrar</button>
	</form>
</div>	

<script type="text/javascript">
	$("#cal_close").on("click",function(){
		cierraModal();
	});
</script>