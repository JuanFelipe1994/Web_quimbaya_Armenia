<?php
	require('conexion.php');

	// $alcoba = $_POST['alcoba'];
	// $tipo = $_POST['tipo'];
	// $metraje = $_POST['metraje'];
	$variable = $_REQUEST["metraje_php"];
	$metraje = $variable[0];
	$alcoba = $variable[1];
	$tipo = $variable[2];

	$piso = 0;

	$where = "WHERE 1 = 1";

	if($alcoba <> ''){
		$where .= " AND habitaciones = $alcoba";
	}
	if($tipo <> ''){
		$where .= " AND tipo = '$tipo'";
	}
	if($metraje <> ''){
		$where .= " AND metraje = $metraje";
	}

	$clase = "fallo";

	$filtro = array();
	$result = mysql_query("SELECT * FROM aptos $where ORDER BY piso ASC");
	//echo "SELECT * FROM aptos $where ORDER BY piso ASC";
	if($result){
		if(mysql_num_rows($result) > 0){
			while($row_result = mysql_fetch_array($result)){
				$filtro[] = $row_result[0];
			}
		}
	}

	$completo = mysql_query("SELECT * FROM aptos ORDER BY apto");
	
	//echo "SELECT * FROM aptos $where";
	if($completo){
		if(mysql_num_rows($completo) > 0){
			while($row_completo = mysql_fetch_array($completo)){ 
				$pisoAnt = $piso;
				$piso = $row_completo[2];
				if($pisoAnt != $piso){
					if($pisoAnt > 0){?>
						</div><?php 
					}?>	
					<div class="piso"><?php
				}
				if (in_array($row_completo[0], $filtro)) {
				    $clase = "apto";
				}
				else{
					$clase = "fallo";
				}?>	

				<p id="<?php echo $row_completo[1]; ?>" class="<?php echo $clase;?> <?php echo $row_completo[17];?>coti " fotos="<?php echo $row_completo[18]; ?>"><?php echo $row_completo[1]; ?></p><?php 
				
			}?>
			</div><?php 
		}
	}

?>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="./libs/js/general.js"></script>
<script type="text/javascript">
	var numero = 0;
	$(".apto").on("click",function(){

		var vendio = $(this).hasClass("vendidocoti");
		if (vendio == true) {
			swal({
				title: "Lo Sentimos!",
				text: "Éste apartamento ya ha sido vendido.",
				type: "error",
				confirmButtonText: "Aceptar",
				confirmButtonColor: "#87E32B"
			});
		}else{
			//cotizacion();
			var id = $(this).attr("id");
			//alert(id);


			$(".apto").removeClass("seleccionado");
			$(this).addClass("seleccionado");
			// $("#vista_apto").css("display","block");
			// $("#vista_apto").empty();

			// $("#vista_apto").append("<img src='img/"+id+".jpg'>");
			//aqui muestra la imagen full size de la planta del apto
			zoom(id);
			pasoNumeroTres();
			//aqui desbloquea la tercera seccion las fotos del apto seleccionado
			//pasoNumeroTres();
			// //aqui carga las imagenes que tenga el apto seleccionado.
			$(".u_slides").remove();
			$(".jssora03l").remove();
			$(".jssora03r").remove();
			$("#myCarousel").append("<div u='slides' class='u_slides'></div>");
			$(".u_slides").append("<div><img u='image' src='./libs/img/cotizacion/apto_"+ id +"_1.jpg'></div>");
			numero = $(this).attr("fotos");
			//alert(numero);
			//aqui muestra el numero de img que hay por apto
			// var circle = 0;
			// while(circle < numero){
			// 	$("#indica_fotos").append("<li data-target='#myCarousel' data-slide-to='"+circle+"'></li>");
			// 	circle++;
			// }
			$("#myCarousel").append(" <span u='arrowleft' class='jssora03l' style='top: 123px; left: 8px;z-index:9;'></span>");
			$("#myCarousel").append(" <span u='arrowright' class='jssora03r' style='top: 123px; right: 8px;z-index:9;'></span>");
			for(f = 2; f <= numero; f++){
				$(".u_slides").append("<div><img u='image' src='./libs/img/cotizacion/apto_"+ id +"_"+ f +".jpg'></div>");
			}
			invocaCarousel();
			//carga de la cotizacion del apto
			$("#contenido_cotizacion").load("./libs/php/info_cotizacion.php",{"info_cotizacion":id});
		}

		
	});
	$("#btn_paso4").on("click",function(){
		pasoNumeroCuatro();
	});
</script>