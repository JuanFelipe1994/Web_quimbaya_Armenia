<?php  
	require('../../php/conexion.php');
	$apto = $_GET['apto'];

?>
<div id="content_form_subida_archivo">
	<form id="form_subida_archivo">
		<h4>comprobante apartamento <?php echo $apto;?></h4>
		<input type="text" value="<?php echo $apto; ?>" name="apto" id="fsa_apto" style="display:none;">
		<div class="form-group">
			<label>Título del comprobante</label>
			<input type="text" placeholder="Título" name="titulo" id="fsa_titulo">
		</div>
		<div class="form-group">
			<label>Monto del comprobante</label>
			<input type="number" placeholder="Monto" name="monto" id="fsa_monto">
		</div>
		<div class="form-group">
			<label>Fecha de subida del comprobante</label>
			<input type="date" name="fecha" id="fsa_fecha">
		</div>
		<div class="form-group">
			<label>Archivo de comprobante</label>
			<input type="file" name="imagen" id="fsa_file">
		</div>
		<div class="form-group">
			<button type="button" class="btn btn-success" id="btn_guarda_comprobante">Guardar</button>
			<button type="button" class="btn btn-danger" id="btn_cancela">Cancelar</button>
		</div>
	</form>
</div>

<script type="text/javascript">
	$("#btn_cancela").on("click",function(){
		cierraModalSES();
	});

	$("#btn_guarda_comprobante").on("click",function(){
		var titulo = $("#fsa_titulo").val();
		var monto = $("#fsa_monto").val();
		var fecha = $("#fsa_fecha").val();
		var archivo = $("fsa_file").val();

		if ((titulo == '') || (monto == '') || (fecha == '') || (archivo == '')) {
			swal({
				title: "Error",
				text: "Verifica todos los campos y que el archivo haya sido seleccionado e intenta nuevamente.",
				type: "error",
				confirmButtonColor: "#87B32E",
				confirmButtonText: "Aceptar"
			});
		}else{
			var dato_comprobante = new FormData($("#form_subida_archivo")[0]);
			$.ajax({
				url:"guarda_comprobante.php",
				cache:false,
				type:"POST",
				contentType:false,
				data:dato_comprobante,
				processData:false,
			});
			swal({
				title: "Archivo subido",
				text: "El archivo se ha subido correctamente.",
				type: "success",
				confirmButtonColor: "#87B32E",
				confirmButtonText: "Aceptar"
			});
			cierraModalSES();
		}
	});
</script>