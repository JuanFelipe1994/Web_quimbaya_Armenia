<select type="select" class="form-control" id="input_pais" name="pais" placeholder="País de residencia">
	<option selected disabled>Selecciona:</option>
	<?php
		require('conexion.php');

		$elige = "SELECT Pais, Codigo FROM Paises ORDER BY Pais";
		
		$lista = mysql_query($elige, $conexion);
		if ($lista) {
		 	if (mysql_num_rows($lista) > 0) {
		 		while($pais = mysql_fetch_array($lista)){
		 			?>
					<option <?php if ($pais[1] == 'CO') {echo "selected";} ?> pais="<?php echo $pais[1]; ?>" value="<?php echo $pais[0]; ?>">
						<?php
							echo $pais[0];
						?>
					</option>
		 			<?php
		 		}
		 	}
		 } 
	?>
</select>

<script type="text/javascript">
	$("#input_pais").on("change",function(){
		var pais = $("#input_pais option:selected").attr("pais");
		//alert(pais);
		$("#campo_ciudad").load("./libs/php/seleccion_ciudad.php?pais="+pais);
	});
</script>