<?php  
	require('../../php/conexion.php');
?>

<div id="SES_tabla_datos">
	<table border="1" id="tabla_datos">
		<tr id="tabla_titulo">
			<td>Apartamento</td>
			<td>Nombre</td>
			<td>Apellido</td>
			<td>Teléfono</td>
			<td>Dirección</td>
			<td>Cédula</td>
			<td>Email</td>
			<td>Forma de pago</td>
			<td></td>
		</tr>
		<?php  
			$extrae = mysql_query("SELECT * FROM clientes", $conexion);
			if ($extrae) {
				if (mysql_num_rows($extrae) > 0) {
					while($dato = mysql_fetch_array($extrae)){
						?>
							<tr class="fila_dato">
								<td class="IDapto">
									<?php echo $dato[1]; ?>
								</td>
								<td>
									<?php echo $dato[2]; ?>
								</td>
								<td>
									<?php echo $dato[3]; ?>
								</td>
								<td>
									<?php echo $dato[4]; ?>
								</td>
								<td>
									<?php echo $dato[5]; ?>
								</td>
								<td>
									<?php echo $dato[6]; ?>
								</td>
								<td>
									<?php echo $dato[7]; ?>
								</td>
								<td>
									<?php echo $dato[8]; ?>
								</td>
								<td>
									<button type="button" class="btn btn-info edita_cliente">Editar</button>
								</td>
							</tr>
						<?php
					}
				}
			}
		?>
	</table>
</div>

<script type="text/javascript">
	$(".edita_cliente").on("click",function(){
		var IDapto = $(this).parent("td").siblings(".IDapto").html();
		llamaSES_formulario_edita(IDapto);
	});
</script>