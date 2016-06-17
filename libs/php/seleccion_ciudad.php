<label for="input_ciudad">Ciudad de residencia</label>
<select type="select" class="form-control" id="input_ciudad" name="ciudad" placeholder="Ciudad de residencia">
	<option selected disabled>Selecciona:</option>
	<?php
		require('conexion.php');
		$pais = "CO";
		if (isset($_GET["pais"])) {
			$pais = $_GET["pais"];
		}
		$elige = "SELECT Ciudad FROM Ciudades WHERE Paises_Codigo = '$pais' ORDER BY Ciudad";
		
		$lista = mysql_query($elige, $conexion);
		if ($lista) {
		 	if (mysql_num_rows($lista) > 0) {
		 		while($ciudad = mysql_fetch_array($lista)){
		 			?>
					<option value="<?php echo utf8_encode($ciudad[0]); ?>">
						<?php
							echo utf8_encode($ciudad[0]);
						?>
					</option>
		 			<?php
		 		}
		 	}
		 } 
	?>
</select>