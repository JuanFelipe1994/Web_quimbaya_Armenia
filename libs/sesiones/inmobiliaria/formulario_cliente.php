<?php  
	require('../../php/conexion.php');
	$IDapto = $_GET['IDapto'];

	
	$tabla = mysql_query("SELECT * FROM aptos WHERE apto = $IDapto", $conexion);
	$fila = mysql_fetch_array($tabla);

?>
<div id="SES_formulario">
	<form id="SES_form_venta">
		<div class="form-group">
			<label>Apartamento</label>
			<input type="text" placeholder="Apartamento" class="form-control" name="apto" id="apto_cliente">
		</div>
			<?php
				//mira de la tabla aptos si el apto tiene un deposito interno o externo
				$consulta_deposito = mysql_query("SELECT deposito FROM aptos WHERE apto = $IDapto", $conexion);
				if ($consulta_deposito) {
				 	if (mysql_num_rows($consulta_deposito) > 0) {
				 		$valor = mysql_fetch_array($consulta_deposito);
				 		// si el apartamento tiene un valor de deposito mayor a cero hace esto
				 		if ($valor[0] > 0) {?>
							
							<div class="form-group">
								<label>Depósitos (Escoje solamente un depósito disponible)</label>
					 			<div id="SES_contenedor_depositos">
							
							<?php
	 			 			$llama_deposito = mysql_query("SELECT * FROM depositos", $conexion);
	 			 			if ($llama_deposito) {
	 			 				if (mysql_num_rows($llama_deposito) > 0) {
	 			 					while ($datos_deposito = mysql_fetch_array($llama_deposito)) {
	 			 						$nivelAnt = $otravar;
	 			 						$nivel = $datos_deposito[1];
	 			 						$porcion_nivel = explode(" ", $nivel);
	 			 						$otravar = $porcion_nivel[1];
	 			 						if ($nivelAnt != $otravar) {
	 			 							if ($nivelAnt > 0) {?>
	 			 								</div><?php
	 			 							}?>
	 			 							<div class="SES_nivel"><strong class="titulo_nivel_deposito"> <?php echo $datos_deposito[1] ?> </strong><?php
	 			 						}
	 			 						?>
	 										<p id=" <?php echo $datos_deposito[0]; ?> " class="depo <?php echo $datos_deposito[2]; ?> ">
	 											<?php 
	 												echo $datos_deposito[0];
	 											?>
	 										</p>
	 			 						<?php
	 			 					}?>
									</div><?php
	 			 				}
	 			 			}
	 			 		?>	
				 		</div>
				 		</div>
				 		<div class="separador"></div>
				 		<?php
				 		}else{
				 			?>
				 			<div class="separador"></div>
				 			<?php
				 		}
			 		}
			 	}
			 	 
			?>
			<?php
				//mira de la tabla aptos si el apto tiene un deposito interno o externo
				$consulta_parqueadero = mysql_query("SELECT parqueadero FROM aptos WHERE apto = $IDapto", $conexion);
				if ($consulta_parqueadero) {
				 	if (mysql_num_rows($consulta_parqueadero) > 0) {
				 		$parq = mysql_fetch_array($consulta_parqueadero);
				 		// si el apartamento tiene un valor de deposito mayor a cero hace esto
				 		if ($parq[0] > 18000000) {
								$tipo_parq = "doble";
				 			?>
							<div class="form-group">
								<label>Parqueadero (Escoje dos parqueaderos disponibles)</label>
					 			<div id="SES_contenedor_parqueaderos">
							
							<?php
	 			 			$llama_parqueaderos = mysql_query("SELECT * FROM parqueaderos", $conexion);
	 			 			if ($llama_parqueaderos) {
	 			 				if (mysql_num_rows($llama_parqueaderos) > 0) {
	 			 					while ($datos_parqueaderos = mysql_fetch_array($llama_parqueaderos)) {
	 			 						$nivelAnt = $nivel;
	 			 						$nivel = $datos_parqueaderos[1];
	 			 						if ($nivelAnt != $nivel) {
	 			 							if ($nivelAnt > 0) {?>
	 			 								</div><?php
	 			 							}?>
	 			 							<div class="SES_nivel"><strong class="titulo_nivel_parqueadero"> <?php echo $datos_parqueaderos[1] ?> </strong><?php
	 			 						}
	 			 						?>
	 										<p id="par<?php echo$datos_parqueaderos[0];?>" class="parquea <?php echo $datos_parqueaderos[2]; ?> "><?php echo $datos_parqueaderos[0];?></p>
	 			 						<?php
	 			 					}?>
									</div><?php
	 			 				}
	 			 			}
	 			 		?>	
				 		</div>
				 		</div>
				 		<?php
				 		}else{
				 			$tipo_parq = "sencillo";
				 			?>
							
							<div class="form-group">
								<label>Parqueadero (Escoje un parqueadero disponible)</label>
					 			<div id="SES_contenedor_parqueaderos">
							
							<?php
	 			 			$llama_parqueaderos = mysql_query("SELECT * FROM parqueaderos", $conexion);
	 			 			if ($llama_parqueaderos) {
	 			 				if (mysql_num_rows($llama_parqueaderos) > 0) {
	 			 					while ($datos_parqueaderos = mysql_fetch_array($llama_parqueaderos)) {
	 			 						$nivelAnt = $nivel;
	 			 						$nivel = $datos_parqueaderos[1];
	 			 						if ($nivelAnt != $nivel) {
	 			 							if ($nivelAnt > 0) {?>
	 			 								</div><?php
	 			 							}?>
	 			 							<div class="SES_nivel"><strong class="titulo_nivel_parqueadero"> <?php echo $datos_parqueaderos[1] ?> </strong><?php
	 			 						}
	 			 						?>
	 										<p id="par<?php echo$datos_parqueaderos[0];?> " class="parquea <?php echo $datos_parqueaderos[2]; ?> "><?php echo$datos_parqueaderos[0];?></p>
	 			 						<?php
	 			 					}?>
									</div><?php
	 			 				}
	 			 			}
	 			 		?>	
				 		</div>
				 		</div>
				 		<?php
				 		}
			 		}
			 	}
			 	 
			?>
		
		<div class="form-group">
			<label>Nombres Completos</label>
			<input type="text" placeholder="Nombres" class="form-control" name="nombre" id="nombre_cliente">
		</div>
		<div class="form-group">
			<label>Apellidos Completos</label>
			<input type="text" placeholder="Apellidos" class="form-control" name="apellido" id="apellido_cliente">
		</div>
		<div class="form-group">
			<label>Teléfono</label>
			<input type="number" placeholder="Teléfono" class="form-control" name="telefono" id="telefono_cliente">
		</div>
		<div class="form-group">
			<label>Dirección</label>
			<input type="text" placeholder="Direccion" class="form-control" name="direccion" id="direccion_cliente">
		</div>
		<div class="form-group">
			<label>Número de Cédula</label>
			<input type="number" placeholder="Cédula" class="form-control" name="cedula" id="cedula_cliente">
		</div>
		<div class="form-group">
			<label>Correo Electrónico</label>
			<input type="email" placeholder="Correo Electrónico" class="form-control" name="email" id="email_cliente">
		</div>
		<div class="form-group">
			<label>Medio de Pago</label>
			<input type="text" placeholder="Pago" class="form-control" name="pago" id="pago_cliente">
		</div>
		<div class="form-group">
			<label>Boletín de ventas</label>
			<input type="file" placeholder="Pago" class="form-control" name="imagen" id="boletin_cliente">
			<input type="text" placeholder="monto" class="form-control" name="monto" id="monto_cliente">
			<input type="date" class="form-control" name="fechapago" id="fechapago_cliente">
		</div>
		<div class="form-group">
			<label>Todos los campos son obligatorios</label>
			<input type="text" id="get_depo" name="deposito" style="display:none;">
			<input type="text" id="get_parq" name="parqueadero">
			<button type="button" class="btn btn-success" id="guarda_cliente">Guardar</button>
			<button type="button" class="btn btn-danger" id="cierra_formulario">Cancelar</button>
		</div>
	</form>
</div>

<script type="text/javascript">
	var IDapto = <?php echo $IDapto; ?>;
	$("#apto_cliente").val(IDapto);
	$("#guarda_cliente").on("click",function(){
		var depo_elejido = $(".id_seleccionado").attr("id");
		//alert("depo: "+depo_elejido);
		$("#get_depo").val(depo_elejido);
		var parq_elejido = $(".ocupado");
		//alert("parq: "+parq_elejido);
		//var parq_final = parq_elejido.replace(/\D/g,"");
		var get2 =  '';
		var get3 = 0;
		$.each(parq_elejido,function(){
			//alert();
			if (get3 === 0) {
				get2 += ($(this).html());
			}else{
				get2 += ("," + $(this).html());
			}
			get3++;
		});
		$("#get_parq").val(get2);
		var cantDepo = <?php echo $fila[15]; ?>;
		//alert(cantDepo);
		if (cantDepo > 0) {
			//alert("depo externo");
			guardaCliente();
		}else{
			//alert("depo interno");
			guardaClienteSinDeposito();
		}
		$("#SES_contenido").load('ventas.php');
	});
	$("#cierra_formulario").on("click",function(){
		swal("Cancelado.","Operación cancelada", "error");
		cierraModal();
	});
	$(".depo").on("click", function(){
		var disponible = $(this).hasClass("disponible");
		if (disponible == true) {
			$(".depo").removeClass("id_seleccionado");
			$(this).addClass("id_seleccionado");
		}else{

		}
	});

	var contador_cupo = 2;
	$(".parquea").on("click", function(){
		var escoje = $(this).attr("id");
		var tipo_parq = "<?php echo $tipo_parq; ?>";
		if (tipo_parq == "doble") {
			if (contador_cupo == 0) {
				swal("Alto!", "Solo puedes registrar dos parqueaderos por apartamento.", "error");
			}else{
				if (escoje == "par10") {
					$(".parquea").removeClass("ocupado");
					$(this).addClass("ocupado");
					$("#par11").addClass("ocupado");
					contador_cupo = 0;
				}else if (escoje == "par15") {
					$(".parquea").removeClass("ocupado");
					$(this).addClass("ocupado");
					$("#par16").addClass("ocupado");
					contador_cupo = 0;
				}else if (escoje == "par17") {
					$(".parquea").removeClass("ocupado");
					$(this).addClass("ocupado");
					$("#par18").addClass("ocupado");
					contador_cupo = 0;
				}else if (escoje == "par11") {
					$(".parquea").removeClass("ocupado");
					$(this).addClass("ocupado");
					$("#par10").addClass("ocupado");
					contador_cupo = 0;
				}else if (escoje == "par16") {
					$(".parquea").removeClass("ocupado");
					$(this).addClass("ocupado");
					$("#par15").addClass("ocupado");
					contador_cupo = 0;
				}else if (escoje == "par18") {
					$(".parquea").removeClass("ocupado");
					$(this).addClass("ocupado");
					$("#par17").addClass("ocupado");
					contador_cupo = 0;
				}else{
					//$(".parquea").removeClass("ocupado");
					$(this).addClass("ocupado");
					contador_cupo = contador_cupo-1;
				}
			}
			
		}else if (tipo_parq == 'sencillo') {
			var escoje = $(this).attr("id");
			//alert(escoje);
			if ((escoje == "par10 ") || (escoje == "par11 ") || (escoje == "par15 ") || (escoje == "par16 ") || (escoje == "par17 ") || (escoje == "par18 ")) {
				swal("Alto!", "no puedes escoger este parqueadero pues es parqueadero con servidumbre.", "error");
			}else{
				$(".parquea").removeClass("ocupado");
				$(this).addClass("ocupado");
			}
		}

		
	});
</script>
