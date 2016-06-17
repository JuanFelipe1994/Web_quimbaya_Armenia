<?php 
	require('../../php/conexion.php');

	$datos = "SELECT * FROM aptos ORDER BY apto";

	$aptos = mysql_query($datos, $conexion);
	if ($aptos) {
		if (mysql_num_rows($aptos) > 0) {
			while($apto = mysql_fetch_array($aptos)){ 
				$pisoAnt = $piso;
				$piso = $apto[2];
				if($pisoAnt != $piso){
					if($pisoAnt > 0){?>
						</div><?php 
					}?>	
					<div class="SES_piso"><?php
				} ?>	
				<p id="<?php echo $apto[1]; ?>" class="SES_apto <?php echo $apto[17]; ?>">
					<?php
						echo $apto[1];
					?>
				</p>
				<?php 
				
			}?>
			</div><?php 
			
		}
	}

?>
	<div id="line_hor_ventas"></div>
	<div class="separador"></div>
	<div id="SES_convenciones">
		<div class="SES_convencion">
			<div class="SES_conv_venta"></div>
			<strong>En Venta</strong>
		</div>
		<div class="SES_convencion">
			<div class="SES_conv_vendido"></div>
			<strong>Vendido</strong>
		</div>
	</div>
<script type="text/javascript">
	$(".SES_apto").on("click",function(){
		var IDapto = $(this).attr("id");
		var estado_apto = $(this).hasClass("vendido");
		if (estado_apto == false) {
			swal({
				title: "¿Se ha vendido este apartamento?",
				text: "",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#87B32E",
				confirmButtonText: "Si, se ha vendido",
				cancelButtonColor: "#DD6B55",
				cancelButtonText: "Cancelar",
				closeOnConfirm: false,
				closeOnCancel: false
			},
			function(isConfirm){
				if (isConfirm) {
					swal({
						title: "Excelente!",
						text: "Llena el formulario para guardar la información.",
						timer: 2000,
						showConfirmButton: false
					});
					setTimeout(function(){
						llamaSES_formulario(IDapto);
					},2050);
				}else{
					swal("Cancelado","Será la venta la próxima vez", "error");
				}
			});
		}else{
			llamaSES_formulario_info(IDapto);
		}
	});
</script>
