<?php
	require('conexion.php');

	// *******************************************************************
	// ***                          VARIABLES                          ***
	// *******************************************************************
	$valorMetro4 = 3900000; //variable del precio del CUARTO piso. 3950000
	$valorMetro5 = 4050000; //variable del precio del QUINTO piso. 
	$valorMetro6 = 4200000; //variable del precio del SEXTO piso.
	$valorMetro7 = 4350000; //variable del precio del SÉPTIMO piso.
	$valorMetro8 = 4500000; //variable del precio del OCTAVO piso.
	$valorMetro9 = 4650000; //variable del precio del NOVENO piso.
	$valorMetro10 = 4800000; //variable del precio del DÉCIMO piso.
	$valorMetro11 = 4950000; //variable del precio del ONCEAVO piso.
	$valorMetro12 = 5100000; //variable del precio del DOCEAVO piso.
	$valorMetro13 = 5250000; //variable del precio del TRECEAVO piso.
	// *******************************************************************
	// ***                                                             ***
	// *******************************************************************

	$valorPorPiso = mysql_query("SELECT * FROM aptos", $conexion);

		while ($piso4 = mysql_fetch_array($valorPorPiso)){
			// 
			$nomvariable = "valorMetro".$piso4[2];
			$valorApto = $piso4[7] * $$nomvariable;
			$totalParqueadero = $piso4[14];
			$deposito = $piso4[15];
			$totalApto = $valorApto + $totalParqueadero + $deposito;
			$separacion = ($totalApto * 10) / 100;
			$cuotaInicial = ($totalApto * 20) / 100;
			$saldo = ($totalApto * 70) / 100;
 
			echo "Apto: " . $piso4[1] . "<br>Área total: " . $piso4[7] . "<br>Valor del apartamento: " . number_format($valorApto) . "<br>Separación(10%): " . number_format($separacion) . "<br>Cuota inicial(20%): " . number_format($cuotaInicial) . "<br>Saldo(70%): " . number_format($saldo) . "<br>Total Apto: ". number_format($totalApto) . "<hr style='height:10px;background:#000;'><br>";

			$actualizar = mysql_query("UPDATE aptos SET valor_apto =$valorApto, separacion =$separacion, cuota_inicial =$cuotaInicial, saldo = $saldo, total_apto =$totalApto WHERE apto = $piso4[1]" , $conexion);
		} 

		
	
?>