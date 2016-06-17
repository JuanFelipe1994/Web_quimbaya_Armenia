<?php 
//echo '<script language="javascript">alert("'. $id .'");</script>'; 
if($_POST["info_cotizacion"]){
	require('conexion.php');

	$variable = $_POST["info_cotizacion"];
	$id = $variable;
	$cotizacion = mysql_query("SELECT * FROM aptos WHERE apto = $id", $conexion);

	if ($cotizacion) {
		if(mysql_num_rows($cotizacion) > 0){


			//promociones !!!!!!!!!!!!!!!!!!!!!!!!
			//fecha de inicio
			$promocion_fecha_inicial = "1/5/2016";
			//fecha final
			$promocion_fecha_final = "1/6/2016";
			//fecha de cotizacion
			$promocion_fecha_cotizacion = date("d/n/Y");
			//de que trata la promocion:
			

			
			  



			while ($info = mysql_fetch_array($cotizacion)) {
				//codigo para calcular el precio de los apartamentos con la promocion
				$precParq = $info[14];
				$precDepo = $info[15];
				// la promoción trata de aquellas personas que compran el proyecto 
				// 5 %  de descuento en el valor del apartamento para quienes lo compren de contado (solo efectivo).
				$promo1i = ($info[10] * 5) / 100;// esta variable cambiara de acuerdo a la promoción que esté durante ese tiempo
				$valorDescuento1 = number_format($promo1i);
				$promo1 = $info[10] - $promo1i;
				$totalPromo1 = $promo1 + $precParq + $precDepo;
				$totalPromo1f = number_format($totalPromo1);
				$promo1f = number_format($promo1);
				$separacionPromo1f = ($totalPromo1 * 10) / 100; //separacion
				$separacionPromo1 = number_format($separacionPromo1f);
				$cuotaInicialPromo1f = ($totalPromo1 * 20) / 100; //cuota inicial
				$cuotaInicialPromo1 = number_format($cuotaInicialPromo1f);
				$saldoPromo1f = ($totalPromo1 * 70) / 100; //saldo
				$saldoPromo1 = number_format($saldoPromo1f);

				// 3 %  de descuento en el valor del apartamento para quienes lo compren con cualquier otro medio de pago.
				$promo2i = ($info[10] * 3 / 100);// esta variable cambiara de acuerdo a la promoción que esté durante ese tiempo
				$valorDescuento2 = number_format($promo2i);
				$promo2 = $info[10] - $promo2i;
				$totalPromo2 = $promo2 + $precParq + $precDepo;
				$totalPromo2f = number_format($totalPromo2);
				$promo2f = number_format($promo2);
				$separacionPromo2f = ($totalPromo2 * 10) / 100; //separacion
				$separacionPromo2 = number_format($separacionPromo2f);
				$cuotaInicialPromo2f = ($totalPromo2 * 20) / 100; //cuota inicial
				$cuotaInicialPromo2 = number_format($cuotaInicialPromo2f);
				$saldoPromo2f = ($totalPromo2 * 70) / 100; //saldo
				$saldoPromo2 = number_format($saldoPromo2f);

				//precio original sin promocion
				$nopromo = $info[10];
				$totalNoPromo = $nopromo + $precParq + $precDepo;
				$totalNoPromof = number_format($totalNoPromo);
				$nopromof = number_format($nopromo);
				$separacionNoPromof = ($totalNoPromo * 10) / 100; //separacion
				$separacionNoPromo = number_format($separacionNoPromof);
				$cuotaInicialNoPromof = ($totalNoPromo * 20) / 100; //cuota inicial
				$cuotaInicialNoPromo = number_format($cuotaInicialNoPromof);
				$saldoNoPromof = ($totalNoPromo * 70) / 100; //saldo
				$saldoNoPromo = number_format($saldoNoPromof);
				?>
					<h1 id="titulo_cotizacion" llamar="<?php echo $id ?>" >Cotización Apartamento <?php echo $info[1]?> Edificio<img class="coti_quimbaya"src="./libs/img/index/banner.png"></h1>
					
					<table id="tabla_cotizacion">
						<tr>
							<th class="columna1">Apto:</th>
							<td class="somb columna2"><?php echo $info[1];?></td>
						</tr>
						<tr>
							<th class="columna1">Piso:</th>
							<td class="columna2">
								<?php
									if ($info[19] == "no") {
										echo $info[2];
									}else{
										echo $info[19];
									}
								?>
							</td>
						</tr>
						<tr>
							<th class="columna1">Alcobas:</th>
							<td class="columna2"><?php echo $info[5];?></td>
						</tr>
						<tr>
							<th class="columna1">Terraza:</th>
							<td class="columna2">
								<?php 
									if ($info[9] > 0) {
										echo "Si";
									}else{
										echo "No";
									}
								?>
							</td>
						</tr>
						<tr>
							<th class="columna1">Plantas:</th>
							<td class="columna2">
								<?php 
									if ($info[3] == "simple") {
										echo "1";
									}else{
										echo "2";
									}
								?>
							</td>
						</tr>
						<tr>
							<th class="columna1">Gas Natural:</th>
							<td class="columna2">NO</td>
						</tr>
						<tr>
							<th class="columna1">Tipo Calentador de agua:</th>
							<td class="columna2">Solar</td>
						</tr>
						<tr>
							<th class="columna1">Área Privada:</th>
							<td class="columna2"><?php echo $info[8];?> Mts2</td>
						</tr>
						<?php if ($info[9] == 0) {
							
						}else{ ?>
							<tr>
								<th class="columna1">Área Terraza:</th>
								<td class="columna2"><?php echo $info[9];?> Mts2</td>
							</tr>
						<?php } ?>
						<tr>
							<th class="columna1">Área Construida Total:</th>
							<td class="somb columna2"><?php echo $info[7];?> Mts2</td>
						</tr>
						<tr>
							<th class="columna1">Valor del Apto:</th>
							<td class="unidades str columna2">$ <?php echo $info[10];?></td> 
						</tr>
						<tr>
							<th class="columna1">
								<button type="button" class="btn btn-default promociones" prom="prom1">Promo 1</button>
								<button type="button" class="btn btn-default promociones" prom="prom2">Promo 2</button>
								<button type="button" class="btn btn-success promo-select promociones" prom="noprom">No Promo</button>
							</th>
							<td class="unidades columna2" id="var_prec_apto"></td>
						</tr>
						<tr>
							<?php if ($info[14] > 18000000){?>
								<th class="columna1">2 Parqueaderos:</th>
								<td class="unidades columna2">$ <?php echo $info[14];?></td>
							<?php }else{ ?>
								<th class="columna1">1 Parqueadero:</th>
								<td class="unidades columna2">$ <?php echo $info[14];?></td>
							<?php } ?>
						</tr>
						<?php
							if ($info[15] > 0) {?>
								<tr>
									<th class="columna1">Depósito:</th>
									<td class="unidades columna2">$ <?php echo $info[15];?></td>
								</tr>
							<?php }else{

							} ?>
						<?php
							if ($info[15] <= 0) {
						?>		<tr>
									<th class="columna1">Depósito:</th>
									<td class="columna2">depósito interno.</td>
								</tr>
						<?php
							}else{

							}
						?>	
						<tr>
							<th class="columna1">Total Apto:</th>
							<td class="unidades str somb columna2" id="tot_apto_dat">$ <?php echo $info[16];?></td>
						</tr>
					</table>
					
					<div class="separador"></div>
					<div class="caracteristicas_apto">
						<div class="contenedor_de_caracteristicas">
							<table id="tabla_pagos_final">
								<tbody>
									<tr>
										<th class="columna1">Separacion (10%):</th>
										<td class="unidades str columna2" id="tot_sepa">$ <?php echo $info[11];?></td>
									</tr>
									<tr>
										<th class="columna1">Cuota inicial (20%):</th>
										<td class="unidades str columna2" id="tot_ini">$ <?php echo $info[12];?></td>
									</tr>
									<tr>
										<th class="columna1">Saldo (70%):</th>
										<td class="unidades str columna2" id="tot_sal">$ <?php echo $info[13];?></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>	
					<strong id="text_promo"></strong>
				<?php
			}
		}
		else{
			echo "NO hay resultados";
		}
			
	}
	else{
		echo "Algo salio mal";
	}
}


?>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="./libs/js/general.js"></script>
<script type="text/javascript">
	$(".unidades").digits();

	//variables de la NO PROMOCION --> precio normal
	var nopromo = "<?php echo $nopromof; ?>";
	var totalNoPromof = "<?php echo $totalNoPromof; ?>";
	var separacionNoPromo = "<?php echo $separacionNoPromo; ?>";
	var cuotaInicialNoPromo = "<?php echo $cuotaInicialNoPromo; ?>";
	var saldoNoPromo = "<?php echo $saldoNoPromo; ?>";

	//variables de la promocion 1
	var promo1 = "<?php echo $promo1f; ?>";
	var totalPromo1f = "<?php echo $totalPromo1f; ?>";
	var separacionPromo1 = "<?php echo $separacionPromo1; ?>";
	var cuotaInicialPromo1 = "<?php echo $cuotaInicialPromo1; ?>";
	var saldoPromo1 = "<?php echo $saldoPromo1; ?>";
	var descuentoPromo1 = "<?php echo $valorDescuento1; ?>";

	//variables de la promocion 2
	var promo2 = "<?php echo $promo2f; ?>";
	var totalPromo2f = "<?php echo $totalPromo2f; ?>";
	var separacionPromo2 = "<?php echo $separacionPromo2; ?>";
	var cuotaInicialPromo2 = "<?php echo $cuotaInicialPromo2; ?>";
	var saldoPromo2 = "<?php echo $saldoPromo2; ?>";
	var descuentoPromo2 = "<?php echo $valorDescuento2; ?>";

	$("#var_prec_apto").append('$ 0');

	$(".promociones").on("click",function(){
		$(".promociones").removeClass("btn-success promo-select");
		$(".promociones").addClass("btn-default");
		$(this).addClass("btn-success promo-select");

		$("#var_prec_apto").empty();
		$("#tot_apto_dat").empty();
		$("#tot_sepa").empty();
		$("#tot_ini").empty();
		$("#tot_sal").empty();
		$("#text_promo").empty();
		var estProm = $(this).attr("prom");
		//alert(estProm);
		if (estProm == 'noprom') {
			$("#var_prec_apto").append('$ 0');
			$("#tot_apto_dat").append('$ '+totalNoPromof);
			$("#tot_sepa").append('$ '+separacionNoPromo);
			$("#tot_ini").append('$ '+cuotaInicialNoPromo);
			$("#tot_sal").append('$ '+saldoNoPromo);
		}else if (estProm == 'prom1') {
			$("#var_prec_apto").append('$ - '+descuentoPromo1);
			$("#tot_apto_dat").append('$ '+totalPromo1f);
			$("#tot_sepa").append('$ '+separacionPromo1);
			$("#tot_ini").append('$ '+cuotaInicialPromo1);
			$("#tot_sal").append('$ '+saldoPromo1);
			$("#text_promo").append("5 % en compra de contado.");
		}else if (estProm == 'prom2') {
			$("#var_prec_apto").append('$ - '+descuentoPromo2);
			$("#tot_apto_dat").append('$ '+totalPromo2f);
			$("#tot_sepa").append('$ '+separacionPromo2);
			$("#tot_ini").append('$ '+cuotaInicialPromo2);
			$("#tot_sal").append('$ '+saldoPromo2);
			$("#text_promo").append("3 % en compra con cualquier otro medio de pago.");
		}
	});
</script>
