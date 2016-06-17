<?php  
	require('../../php/conexion.php');

	$aptos = mysql_query("SELECT apto FROM aptos WHERE estado = 'vendido'");
	$tipo = $_GET['tipo'];
	$start = $_GET['start'];
?>
<div id="SES_form_calendario">
	<form id="formulario_calendario_crea">
		<div class="form-group">
			<label>Titulo del Evento</label>
			<div class="content_contenido derecha">
				<input type="text" placeholder="Escribe el titulo" id="cal_evento" name="evento">
			</div>
		</div>
		<div class="separador"></div>
		<div class="form-group">
			<label>Tipo de Evento</label>
			<div class="content_contenido derecha elegir_tipo">
				<button type="button" class="btn btn-default" id="btn_firma">Firma</button>
				<button type="button" class="btn btn-default" id="btn_entrega">Entrega</button>
				<button type="button" class="btn btn-default" id="btn_pago">Pago</button>
				<input type="text" name="cal_tipo" id="cal_tipo" style="display:none;">
			</div>
			
		</div>
		<div class="separador"></div>
		<div class="form-group">
			<label>Apartamento</label>
			<div class="content_contenido derecha elegir_apto">
				<?php  
					if (mysql_num_rows($aptos) > 0) {
						while($apto = mysql_fetch_array($aptos)){
							?><p id="<?php echo $apto[0]; ?>" class="sel_apto"><?php echo $apto[0]; ?></p><?php
						}
					}
				?>
				<input type="text" name="cal_apto" id="cal_apto" style="display:none;">
			</div>	
		</div>
		<div class="separador"></div>
		<div class="form-group">
			<label>Fecha de inicio</label>
			<div class="content_contenido derecha">
				<input type="date" id="cal_fec_ini" value="<?php echo $start; ?>" name="fecha_ini">
			</div>
		</div>
		<div class="separador"></div>
		<div class="form-group">
			<label>Fecha final</label>
			<div class="content_contenido derecha">
				<input type="date" id="cal_fec_fin" name="fecha_fin">
			</div>
		</div>
		<div class="separador"></div>
		<button type="button" class="btn btn-danger" id="cal_delete">Cancelar</button>
		<button type="button" class="btn btn-success" id="cal_save">Guardar evento</button>
	</form>
</div>	

<script type="text/javascript">
	$(".elegir_tipo > button").on("click",function(){
		$(".elegir_tipo > button").removeClass("este");
		$(this).addClass("este");
	});

	$(".elegir_apto > .sel_apto").on("click",function(){
		$(".elegir_apto > .sel_apto").removeClass("este");
		$(this).addClass("este");
	});

	$("#cal_delete").on("click",function(){
		cierraModal();
	});

	$("#cal_save").on("click",function(){
		var cal_evento = $("#cal_evento").val();
		var prepre_tipo = $(".elegir_tipo > .este").html();
		var pre_tipo = $("#cal_tipo").val(prepre_tipo);
		var cal_tipo = $("#cal_tipo").val();
		var prepre_apto = $(".elegir_apto > .este").html();
		var pre_apto = $("#cal_apto").val(prepre_apto);
		var cal_apto = $("#cal_apto").val();
		var cal_fec_ini = $("#cal_fec_ini").val();
		var cal_fec_fin = $("#cal_fec_fin").val();
		//alert("titulo: "+ cal_evento + "\n tipo: "+ cal_tipo +"\n apto: "+ cal_apto +"\n fecha inicial: "+ cal_fec_ini +"\n fecha final: "+ cal_fec_fin);
		if ((cal_evento == '') || (cal_tipo == '') || (cal_apto == '') || (cal_fec_ini == '') || (cal_fec_fin == '')) {
			swal({
				title: "Error!",
				text: "No se ha podido guardar este evento.\n Asegurate de llenar los campos e intenta nuevamente.",
				type: "error",
				confirmButtonColor: "#87B32E",
				confirmButtonText: "Aceptar"
			});
		}else{
			swal({
				title: "¿Guardar Evento?",
				text: "Verifique que los datos ingresados están correctos,\n UNA VEZ GUARDADO EL EVENTO NO PODRÁ SER ELIMINADO NI EDITADO.",
				type: "warning",
				confirmButtonColor: "#87B32E",
				confirmButtonText: "Guardar",
				showCancelButton: true,
				cancelButtonColor: "#f00",
				cancelButtonText: "Cancelar"
			},
			function(isConfirm){
				if (isConfirm) {
					swal({
						title: "Felicidades",
						text: "Éste evento ha sido agregado.",
						type: "success",
						confirmButtonColor: "#87B32E",
						confirmButtonText: "Aceptar"
					});

					var datos_form = new FormData($("#formulario_calendario_crea")[0]);
					$.ajax({
					    // nombre del archivo php que recibe los datos enviados
					    url:"guarda_evento.php",
					    cache:false,
					    type:"POST",
					    contentType:false,
					    data:datos_form,
					    processData:false,
					});

					$("#formulario_calendario_crea").each(function(){
						this.reset();
					});

					cierraModal();
				}else{
					swal("Cancelado","Evento cancelado.","error");
					cierraModal();
				}
			});
		}	
	});
</script>