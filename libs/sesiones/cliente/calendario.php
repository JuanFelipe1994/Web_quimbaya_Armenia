<?php  
	require('../../php/conexion.php');
	$user = $_GET['user'];
	$consulta_user = mysql_query("SELECT * FROM clientes WHERE email = '$user'", $conexion);
	$celda = mysql_fetch_array($consulta_user);

	//apto del cliente
	$apto_cliente = $celda[1];
	//echo $apto_cliente;

	//consulta del total de eventos del cliente de acuerdo a su apartamento
	$consulta_evento = mysql_query("SELECT * FROM calendario WHERE apartamento = $apto_cliente", $conexion);
	
	
	
?>
<div id="SES_calendar_cliente">
	<table id="SES_tabla_calendario">
		<tr id="SES_fecha_titulo_cliente">
			<td class="td_sup_izq">Evento</td>
			<td>Tipo del Evento</td>
			<td>Fecha de Inicio</td>
			<td class="td_sup_der">Fecha Final</td>
		</tr>
		<?php  
			while ($evento = mysql_fetch_array($consulta_evento)) {
				?>
					<tr class="fila_dato_cliente">
						<td><?php echo $evento[1]; ?></td>
						<td><?php echo $evento[4]; ?></td>
						<td><?php echo $evento[2]; ?></td>
						<td><?php echo $evento[3]; ?></td>
					</tr>
				<?php
			}
		?>
	</table>
</div>
<script type="text/javascript">
	
</script>