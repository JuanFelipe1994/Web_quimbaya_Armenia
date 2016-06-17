<section id="page_sections">
	<div id="contenedor_home">
		<div id="contenido_home">

			<div class="section" pos="0">
				<div class="access" id="quienes_somos"></div>
				<div class="contenido" id="content_quienes_somos">
					<div id="miCarrusel">
						<!-- contenido de las imagenes del carrusel -->
						<div u="slides">
						    <div><img u="image" src="libs/img/quienes_somos/prueba.jpg" /></div>
						    <div><img u="image" src="libs/img/quienes_somos/qs1.jpg" /></div>
						    <div><img u="image" src="libs/img/quienes_somos/qs2.jpg" /></div>
						    <div><img u="image" src="libs/img/quienes_somos/qs3.jpg" /></div>
						    <div><img u="image" src="libs/img/quienes_somos/qs4.jpg" /></div>
						    <div><img u="image" src="libs/img/quienes_somos/qs5.jpg" /></div>
						    <div><img u="image" src="libs/img/quienes_somos/qs6.jpg" /></div>
						    <div><img u="image" src="libs/img/quienes_somos/qs7.jpg" /></div>
						   <!--  <div><img u="image" src="libs/img/quienes_somos/qs8.jpg" /></div> -->
						    <!-- <a href="//www.rmasb.com" target="_blank"></a> -->
						</div>
						<!-- flecha izquierda -->
						<span u="arrowleft" class="jssora03l" style="top: 123px; left: 8px;">
						</span>
						<!-- flecha derecha -->
						<span u="arrowright" class="jssora03r" style="top: 123px; right: 8px;">
						</span>
					</div>
				</div>
			</div>
			
			<div class="section" pos="1">
				<div class="access no-access p1" id="ubicacion"></div>
				<div class="contenido" id="content_ubicacion"></div>
			</div>

			<div class="section" pos="2">
				<div class="access no-access p2" id="sostenibilidad"></div>
				<div class="contenido" id="content_sostenibilidad"></div>
			</div>

			<div class="section" pos="3">
				<div class="access no-access p3" id="areas_comunes"></div>
				<div class="contenido" id="content_areas_comunes"></div>
			</div>

			<div class="section" pos="4">
				<div class="access no-access p4" id="tipologias"></div>
				<div class="contenido" id="content_tipologias"></div>
			</div>

			<div class="section" pos="5">
				<div class="access no-access p5" id="cotizacion"></div>
				<div class="contenido" id="content_cotizacion">
					<div id="contenido_pagina_cotizacion"></div>
					<button id="tabletCoti" style="display:none;" type="button" class="btn btn-default">Cotiza tu apartamento</button>
				</div>
			</div>

			<div class="section" pos="6">
				<div class="access no-access p6" id="avance_obra"></div>
				<div class="contenido" style="background: rgba(247,239,223,0.6);" id="content_avance_obra"></div>
			</div>

			<div class="section" pos="7">
				<div class="access no-access p7" id="contacto"></div>
				<div class="contenido" id="content_contacto"></div>
			</div>

		</div>
	</div>
</section>
<div id="btn_al_inicio"></div>

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="libs/js/bootstrap.min.js"></script>
<script src="libs/js/general.js"></script>
<script type="text/javascript" src="libs/js/jssor.js"></script>
<script type="text/javascript" src="libs/js/jssor.slider.js"></script>
<script src="libs/js/sweetalert.min.js"></script>
<script type="text/javascript">
	$(".access").on("click",function(){
		var abierto = $(this).siblings(".contenido").hasClass("abierto");
		var bloqueo = $(this).hasClass("no-access");
		var pos = $(this).parent(".section").attr("pos");
		acordion(abierto, bloqueo, pos);
	});
	$("#menu_cabecera > p").on("click",function(){
		var numPos = $(this).attr("pos");
		var desbloqueado = $(this).hasClass("desbloqueado");
		var open = $(this).hasClass("estoy");
		
		menuSup(numPos, desbloqueado, open);
	});
</script>

<script type="text/javascript">
	$("#quienes_somos").on("click",function(){
		llamaUbicacion();
	});
	$("#ubicacion").on("click",function(){
		llamaSostenibilidad();
	});
	$("#sostenibilidad").on("click",function(){
		llamaAreasComunes();
	});
	$("#areas_comunes").on("click",function(){
		llamaTipologias();
	});
	$("#tipologias").on("click",function(){
		llamaCotizacion();
	});
	$("#cotizacion").on("click",function(){
		var ancho = $(window).width();
		if (ancho > 1024) {
			llamaAvanceObra();
		}else{
			llamaAvanceObra();
		}	
	});
	$("#avance_obra").on("click",function(){
		llamaContacto();
	});


	$("#contacto").on("click",function(){
		var bloqueo = $(this).hasClass("no-access");
		if (bloqueo == true) {

		}else{
			$("#btn_al_inicio").css("display","block");
			$("#btn_al_inicio").animate({"opacity":"1"},1000);
		}
	});
	$("#btn_al_inicio").on("click",function(){
		$("#btn_al_inicio").animate({"opacity":"0"},400);
		setTimeout(function(){
			$("#btn_al_inicio").css("display","none");
		},600);
		$(".contenido").animate({"width":"0px"},1000);
		$("#contenido_home").animate({"margin-left":"0px"},1000);
		$("#menu_cabecera > p").removeClass("estoy");
		$(".access").removeClass("abierto");
	});
	$("#con").on("click", function(){
	 	llamaContacto();
	});
</script>
<script>
    jQuery(document).ready(function ($) {
        var options = {
            $DragOrientation: 3,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)
            $ArrowNavigatorOptions: {                       //[Optional] Options to specify and enable arrow navigator or not
                $Class: $JssorArrowNavigator$,              //[Requried] Class to create arrow navigator instance
                $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                $AutoCenter: 0,                                 //[Optional] Auto center arrows in parent container, 0 No, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                $Steps: 1                                       //[Optional] Steps to go for each navigation request, default value is 1
            }
        };

        var jssor_slider1 = new $JssorSlider$("miCarrusel", options);
    });
</script>