<?php  
	require('../../php/conexion.php');

	//query para el número de cotizaciones totales y por mes
	$registros = mysql_query("SELECT * FROM registros", $conexion);

	if ($registros) {
		// muestra el total de las personas que han cotizado
		$cotizaciones = mysql_query("SELECT COUNT(*) FROM registros", $conexion); 
		$total_cotizaciones = mysql_result($cotizaciones, 0);
		echo "<h4>Total Cotizaciones Realizadas: <strong class='SES_resaltado'>". $total_cotizaciones."</strong></h4>";

		//extrae la información de las cotizaciones por mes
		$fecha_actual = date("n/Y");
		
		$meses = 0;
		$anio = array('','','','','','','','','','','','');
		while ($meses < 12) {
			$cotizacion_mes = mysql_query("SELECT COUNT(*) FROM registros WHERE fecha = '".($meses+1)."/2016'", $conexion);
			$cotizacion_total_mes = mysql_result($cotizacion_mes, 0);
			$anio[$meses] = $cotizacion_total_mes;

			$cotizacion_mes2 = mysql_query("SELECT COUNT(*) FROM registros WHERE fecha = '".($meses+1)."/2017'", $conexion);
			$cotizacion_total_mes2 = mysql_result($cotizacion_mes2, 0);
			$anio2[$meses] = $cotizacion_total_mes2;

			$cotizacion_mes3 = mysql_query("SELECT COUNT(*) FROM registros WHERE fecha = '".($meses+1)."/2018'", $conexion);
			$cotizacion_total_mes3 = mysql_result($cotizacion_mes3, 0);
			$anio3[$meses] = $cotizacion_total_mes3;

			$meses++;
		}


		if (mysql_num_rows($registros) > 0) {
			$datos = mysql_fetch_array($registros);
			
		}
	}

	//query para la nacionalidad, si es o no extranjero
	$nacionalidad = mysql_query("SELECT pais FROM registros", $conexion);

	if ($nacionalidad) {
		//saca el total de nacionalidades de la tabla
		$nacionalidades = mysql_query("SELECT COUNT(*) FROM registros", $conexion); 
		$total_nacionalidades = mysql_result($nacionalidades, 0);

		// separacion de datos de las nacionalidades
		//nacionales
		$dato_nacional = mysql_query("SELECT COUNT(pais) FROM registros WHERE pais = 'Colombia'", $conexion);
		$resultado_nacional = mysql_result($dato_nacional, 0);
		//extranjeros
		$dato_extranjero = mysql_query("SELECT COUNT(pais) FROM registros WHERE pais != 'Colombia' AND pais != ''", $conexion);
		$resultado_extranjero = mysql_result($dato_extranjero, 0);
		//no responden
		$dato_otros = mysql_query("SELECT COUNT(pais) FROM registros WHERE pais = ''", $conexion);
		$resultado_otros = mysql_result($dato_otros, 0);

		//datos de como se enteró del proyecto
		$proyectos = mysql_query("SELECT COUNT(*) FROM registros", $conexion);
		$total_proyectos = mysql_result($proyectos, 0);
		//dato de Correo Electronico
		$dato_correo = mysql_query("SELECT COUNT(proyecto) FROM registros WHERE proyecto = 'Correo Electronico'", $conexion);
		$resultado_correo = mysql_result($dato_correo, 0);
		//dato de publicidad impresa
		$dato_publicidad = mysql_query("SELECT COUNT(proyecto) FROM registros WHERE proyecto = 'Publicidad Impresa'", $conexion);
		$resultado_publicidad = mysql_result($dato_publicidad, 0);
		//dato de pagina web
		$dato_web = mysql_query("SELECT COUNT(proyecto) FROM registros WHERE proyecto = 'Pagina web'", $conexion);
		$resultado_web = mysql_result($dato_web, 0);
		//dato de redes sociales
		$dato_redes_sociales = mysql_query("SELECT COUNT(proyecto) FROM registros WHERE proyecto = 'Redes sociales'", $conexion);
		$resultado_redes_sociales = mysql_result($dato_redes_sociales, 0);
		//dato de referido
		$dato_referido = mysql_query("SELECT COUNT(proyecto) FROM registros WHERE proyecto = 'Referido'", $conexion);
		$resultado_referido = mysql_result($dato_referido, 0);
		//dato de constructora
		$dato_constructora = mysql_query("SELECT COUNT(proyecto) FROM registros WHERE proyecto = 'Constructora'", $conexion);
		$resultado_constructora = mysql_result($dato_constructora, 0);
		//dato de inmobiliaria
		$dato_inmobiliaria = mysql_query("SELECT COUNT(proyecto) FROM registros WHERE proyecto = 'Inmobiliaria'", $conexion);
		$resultado_inmobiliaria = mysql_result($dato_inmobiliaria, 0);

	}

	//datos de que apartamentos son más cotizados
	//datos totales de apartamentos
	$indice_apto = 0;
	$dato_apto = array('','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','');
	while ($indice_apto < 46){
		$extrae_dato = mysql_query("SELECT * FROM cotizaciones WHERE id_fila = ($indice_apto+1)", $conexion);
		if (mysql_num_rows($extrae_dato) > 0) {
			$conteo = mysql_fetch_array($extrae_dato);
			$dato_apto[$indice_apto] = $conteo[1];
			$indice_apto++;
		}
	}


	//datos de las ciudades que más cotizan 
	$cantidad_ciudades = mysql_query("SELECT COUNT(ciudad), ciudad FROM registros GROUP BY ciudad ORDER BY ciudad", $conexion);
	$cantidad_ciudades_final = mysql_num_rows($cantidad_ciudades);
	$subindice = 0;
	$array_ciudades = "";
	while($row = mysql_fetch_array($cantidad_ciudades)){
		if($subindice == 0){$array_ciudades .= "{name:'".$row[1]."',y:".$row[0]."}";}
		else{$array_ciudades .= ",{name:'".$row[1]."',y:".$row[0]."}";}
		$subindice += 1;
	}
?>
<div id="SES_tot_cotizaciones"></div>
<div id="SES_nacionalidades"></div>
<div id="SES_proyecto"></div>
<div id="SES_ciudades"></div>
<div id="SES_aptos_mas_cotizados"></div>

<script type="text/javascript">
	//funcion que muestra la estadística de cotizaciones por mes
	$(function () {
	    $('#SES_tot_cotizaciones').highcharts({
	        chart: {
	            type: 'column',
	            backgroundColor: '#e0e0e0'
	        },
	        title: {
	            text: 'Cotizaciones realizadas'
	        },
	        subtitle: {
	            text: 'Total de cotizaciones realizadas cada mes'
	        },
	        xAxis: {
	        	lineColor: '#000000',
	            categories: [
	                'Ene',
	                'Feb',
	                'Mar',
	                'Abr',
	                'May',
	                'Jun',
	                'Jul',
	                'Ago',
	                'Sep',
	                'Oct',
	                'Nov',
	                'Dic'
	            ],
	            crosshair: true
	        },
	        yAxis: {
	            min: 0,
	            title: {
	                text: 'Cotizaciones'
	            }
	        },
	        tooltip: {
	            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
	            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
	                '<td style="padding:0"><b>{point.y:.f}</b></td></tr>',
	            footerFormat: '</table>',
	            shared: true,
	            useHTML: true
	        },
	        plotOptions: {
	            column: {
	                pointPadding: 0.2,
	                borderWidth: 0
	            }
	        },
	        series: [{
	        	color: '#94b13e',
	            name: 'Número de cotizaciones año 2016',
	            data: [ <?php echo $anio[0]; ?> , <?php echo $anio[1]; ?>, <?php echo $anio[2]; ?>, <?php echo $anio[3]; ?>, <?php echo $anio[4]; ?>, <?php echo $anio[5]; ?>, <?php echo $anio[6]; ?>, <?php echo $anio[7]; ?>, <?php echo $anio[8]; ?>, <?php echo $anio[9]; ?>, <?php echo $anio[10]; ?>, <?php echo $anio[11]; ?>]

	        },{
	        	color: '#3B491C',
	        	name: 'Número de cotizaciones año 2017',
	            data: [ <?php echo $anio2[0]; ?> , <?php echo $anio2[1]; ?>, <?php echo $anio2[2]; ?>, <?php echo $anio2[3]; ?>, <?php echo $anio2[4]; ?>, <?php echo $anio2[5]; ?>, <?php echo $anio2[6]; ?>, <?php echo $anio2[7]; ?>, <?php echo $anio2[8]; ?>, <?php echo $anio2[9]; ?>, <?php echo $anio2[10]; ?>, <?php echo $anio2[11]; ?>]

	        },{
	        	color: '#000',
	        	name: 'Número de cotizaciones año 2018',
	            data: [ <?php echo $anio3[0]; ?> , <?php echo $anio3[1]; ?>, <?php echo $anio3[2]; ?>, <?php echo $anio3[3]; ?>, <?php echo $anio3[4]; ?>, <?php echo $anio3[5]; ?>, <?php echo $anio3[6]; ?>, <?php echo $anio3[7]; ?>, <?php echo $anio3[8]; ?>, <?php echo $anio3[9]; ?>, <?php echo $anio3[10]; ?>, <?php echo $anio3[11]; ?>]

	        }]
	    });
	});
	//funcion que muestra las nacionalidades de quienes cotizan
	$(function () {
		var nacionales = <?php echo $resultado_nacional; ?>;
		var extranjero = <?php echo $resultado_extranjero; ?>;
		var otros = <?php echo $resultado_otros; ?>;
	    $('#SES_nacionalidades').highcharts({
	        chart: {
	            plotBackgroundColor: null,
	            plotBorderWidth: null,
	            plotShadow: false,
	            type: 'pie',
	            backgroundColor: '#e0e0e0'
	        },
	        title: {
	            text: 'Nacionalidades'
	        },
	        tooltip: {
	            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
	        },
	        plotOptions: {
	            pie: {
	                allowPointSelect: true,
	                cursor: 'pointer',
	                dataLabels: {
	                    enabled: true,
	                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
	                    style: {
	                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
	                    }
	                }
	            }
	        },
	        series: [{
	            name: 'Brands',
	            colorByPoint: true,
	            data: [{
	            	color: '#3B491C',
	                name: 'Extranjeros',
	                y: extranjero
	            }, {
	            	color: '#94b13e',
	                name: 'Nacionales',
	                y: nacionales
	            },{
	            	color: '#2a2e1e',
	            	name: 'No respondieron',
	            	y: otros
	            }],
	            dataLabels: {
                    enabled: false,
                    format: '{point.name}: {point.y}'
                },
                showInLegend: true,
                point: {
                    events: {
                        legendItemClick: function () {
                            return false;
                        }
                    }
                }
	        }]
	    });
		$("#SES_nacionalidades").append("<strong> <?php echo 'total: '.$total_nacionalidades; ?> </strong>");
	});
	//funcion que muestra como se enteró del proyecto 
	$(function () {
		var correo = <?php echo $resultado_correo; ?>;
		var publicidad = <?php echo $resultado_publicidad; ?>;
		var web = <?php echo $resultado_web; ?>;
		var redes_sociales = <?php echo $resultado_redes_sociales; ?>;
		var referido = <?php echo  $resultado_referido; ?>;
		var constructora = <?php echo  $resultado_constructora; ?>;
		var inmobiliaria = <?php echo  $resultado_inmobiliaria; ?>;

	    $('#SES_proyecto').highcharts({
	        chart: {
	        	backgroundColor: '#e0e0e0',
	            plotBackgroundColor: null,
	            plotBorderWidth: null,
	            plotShadow: false,
	            type: 'pie'
	        },
	        title: {
	            text: 'Como se enteraron del Proyecto'
	        },
	        tooltip: {
	            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
	        },
	        plotOptions: {
	            pie: {
	                allowPointSelect: true,
	                cursor: 'pointer',
	                dataLabels: {
	                    enabled: true,
	                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
	                    style: {
	                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
	                    }
	                }
	            }
	        },
	        series: [{
	            name: 'Brands',
	            colorByPoint: true,
	            data: [{
	                name: 'Correo Electrónico',
	                y: correo
	            }, {
	                name: 'Publicidad Impresa',
	                y: publicidad
	            }, {
	                name: 'Página web',
	                y: web
	            }, {
	                name: 'Redes sociales',
	                y: redes_sociales
	            }, {
	                name: 'Referido',
	                y: referido
	            }, {
	            	color: '#94b13e',
	                name: 'Constructora',
	                y: constructora
	            }, {
	            	color: '#3B491C',
	                name: 'Inmobiliaria',
	                y: inmobiliaria
	            }],
	            dataLabels: {
                    enabled: false,
                    format: '{point.name}: {point.y}'
                },
                showInLegend: true,
                point: {
                    events: {
                        legendItemClick: function () {
                            return false;
                        }
                    }
                }
	        }]
	    });
	});
	//funcion que muestra las ciudades que cotizan
	$(function () {
	    $('#SES_ciudades').highcharts({
	        chart: {
	        	backgroundColor: '#e0e0e0',
	            plotBackgroundColor: null,
	            plotBorderWidth: null,
	            plotShadow: false,
	            type: 'pie'
	        },
	        title: {
	            text: 'ciudades cotizantes'
	        },
            // tabla de descripcion de elementos
            legend: {
                margin: 5,
                align: 'center',
                borderWidth: 1,
                padding: 10
            },
	        tooltip: {
	            pointFormat: '{series.name}: <b>{point.y}</b>'
	        },
	        plotOptions: {
	            pie: {
	                allowPointSelect: true,
	                cursor: 'pointer',
	                dataLabels: {
	                    enabled: true,
	                    format: '{point.name}',
	                    style: {
	                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
	                    }
	                }
	            }
	        },
	        series: [{
	            name: 'Brands',
	            colorByPoint: true,
	            data: [<?php echo $array_ciudades;?>],
                dataLabels: {
                    enabled: false,
                    format: '{point.name}: {point.y}'
                },
                showInLegend: true,
                point: {
                    events: {
                        legendItemClick: function () {
                            return false;
                        }
                    }
                }
	        }]
	    });
	});
	//funcion que muestra los apartamentos más cotizados
	$(function () {
	    $('#SES_aptos_mas_cotizados').highcharts({
	        chart: {
	        	backgroundColor: '#e0e0e0',
	            type: 'column'
	        },
	        title: {
	            text: 'Apartamentos más cotizados'
	        },
	        subtitle: {
	            text: 'Número de cotizaciones realizadas por cada apartamento'
	        },
	        xAxis: {
	            categories: [
	                '401',
	                '402',
	                '403',
	                '404',
	                '405',
	                '406',
	                '407',
	                '501',
	                '502',
	                '503',
	                '601',
	                '602',
	                '603',
	                '604',
	                '605',
	                '606',
	                '607',
	                '701',
	                '702',
	                '703',
	                '801',
	                '802',
	                '803',
	                '804',
	                '805',
	                '901',
	                '902',
	                '903',
	                '1001',
	                '1002',
	                '1003',
	                '1004',
	                '1005',
	                '1006',
	                '1101',
	                '1102',
	                '1103',
	                '1201',
	                '1202',
	                '1203',
	                '1204',
	                '1205',
	                '1206',
	                '1301',
	                '1302',
	                '1303'
	            ],
	            crosshair: true
	        },
	        yAxis: {
	            min: 0,
	            title: {
	                text: 'Cotizaciones'
	            }
	        },
	        tooltip: {
	            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
	            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
	                '<td style="padding:0"><b>{point.y:.f}</b></td></tr>',
	            footerFormat: '</table>',
	            shared: true,
	            useHTML: true
	        },
	        plotOptions: {
	            column: {
	                pointPadding: 0.2,
	                borderWidth: 0
	            }
	        },
	        series: [{
	        	color: '#94b13e',
	            name: 'Número de cotizaciones',
	            data: [ <?php echo $dato_apto[0]; ?> , <?php echo $dato_apto[1]; ?>, <?php echo $dato_apto[2]; ?>, <?php echo $dato_apto[3]; ?>, <?php echo $dato_apto[4]; ?>, <?php echo $dato_apto[5]; ?>, <?php echo $dato_apto[6]; ?>, <?php echo $dato_apto[7]; ?>, <?php echo $dato_apto[8]; ?>, <?php echo $dato_apto[9]; ?>, <?php echo $dato_apto[10]; ?>, <?php echo $dato_apto[11]; ?>, <?php echo $dato_apto[12]; ?>, <?php echo $dato_apto[13]; ?>, <?php echo $dato_apto[14]; ?>, <?php echo $dato_apto[15]; ?>, <?php echo $dato_apto[16]; ?>, <?php echo $dato_apto[17]; ?>, <?php echo $dato_apto[18]; ?>, <?php echo $dato_apto[19]; ?>, <?php echo $dato_apto[20]; ?>, <?php echo $dato_apto[21]; ?>, <?php echo $dato_apto[22]; ?>, <?php echo $dato_apto[23]; ?>, <?php echo $dato_apto[24]; ?>, <?php echo $dato_apto[25]; ?>, <?php echo $dato_apto[26]; ?>, <?php echo $dato_apto[27]; ?>, <?php echo $dato_apto[28]; ?>, <?php echo $dato_apto[29]; ?>, <?php echo $dato_apto[30]; ?>, <?php echo $dato_apto[31]; ?>, <?php echo $dato_apto[32]; ?>, <?php echo $dato_apto[33]; ?>, <?php echo $dato_apto[34]; ?>, <?php echo $dato_apto[35]; ?>, <?php echo $dato_apto[36]; ?>, <?php echo $dato_apto[37]; ?>, <?php echo $dato_apto[38]; ?>, <?php echo $dato_apto[39]; ?>, <?php echo $dato_apto[40]; ?>, <?php echo $dato_apto[41]; ?>, <?php echo $dato_apto[42]; ?>, <?php echo $dato_apto[43]; ?>, <?php echo $dato_apto[44]; ?>, <?php echo $dato_apto[45]; ?>]

	        }]
	    });
	});
</script>



















