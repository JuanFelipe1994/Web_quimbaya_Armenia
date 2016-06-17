//*********************************************************************************
// DISPONIBILIDAD DE APARTAMENTOS
//*********************************************************************************
function disponibilidad(){
	var metraje = $("#metraje").val();
	var alcoba = $("input[name='alcoba']:checked").val();
	var tipo = $("input[name='tipo']:checked").val();
	$("#content_disponibilidad").load("./libs/php/busqueda.php",{"metraje_php[]":[metraje, alcoba, tipo]});
}
//*********************************************************************************
//funcion que oculta las imagenes del apto seleccionado
//*********************************************************************************
function ocultar(){
	$("#plantas").css("display","none");
	$("#vista_apto").css("display","none");
	$("#vista_apto").empty();
	//***************************
	$(".contenedor_eleccion_aptos > label > input").attr("disabled", false);
	$(".contenedor_tipo_apto > label > input").attr("disabled", false);
	$("#metraje").attr("disabled", false);
}
//*********************************************************************************
// FUNCION QUE DIVIDE LOS NUMEROS POR UNA PUNTO CADA TRES CIFRAS
//*********************************************************************************
$.fn.digits = function(){ 
    return this.each(function(){ 
        $(this).text( $(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") ); 
    })
}
//*********************************************************************************
//RESTABLECIMIENTO DEL FILTRO
//*********************************************************************************
jQuery.fn.reset = function () {
  $(this).each (function() { this.reset(); });
}
//*********************************************************************************
//FUNCION QUE MUESTRA LAS PLANTAS DE CADA APARTAMENTO
//*********************************************************************************
function planta(){
	$("#plantas").css({
		"display":"block"
	});
}
//*********************************************************************************
//FUNCION QUE OCULTA LAS PLANTAS DE LOS APTOS
//*********************************************************************************
function desvPlanta(){
	$("#plantas").css("display","none");
}
//*********************************************************************************
//paso 2 busca tu apartamento acceso
//*********************************************************************************
function pasoNumeroDos(){
	//alert("paso 2");
	$(".contenido2").attr("id","collapse2");
	$("#collapse1").removeClass("in");
	$("#collapse2").addClass("in");
	//alert("añade");
	$(".contenido2").siblings(".panel-heading").addClass("verde");
	//alert("colorea");
}

//*********************************************************************************
//funcion que verifica que todos los campos del formulario esten llenos
//*********************************************************************************
function verifica(){
	var dato1 = $("#input_nombre").val();
	var dato2 = $("#input_correo").val();
	var dato3 = $("#input_telefono").val();
	var dato4 = $("#input_enterarse").val();
	var aceptInfo = $("#acepto_informacion").is(":checked");

	//verificacion de que esta bien diligenciado el formulario

	//verifica el nombre
	var verDato1 = $("#input_nombre").val();
	verDato1 = verDato1.length;

	//verifica el correo
	var verDato2 = $("#input_correo").val();
	var verSigno = /@/;
	var verificaCorreo = verDato2.match(verSigno);

	//verifica telefono
	var verDato3 = $("#input_telefono").val();
	verDato3 = verDato3.length;
	

	

	if ((dato1 === '') || (dato2 === '') || (dato3 === '') || (dato4 === null) || (aceptInfo == false)) {
		swal({
		  title: "El formulario no se ha enviado.",
		  text: "No se ha podido enviar el fomulario correctamente,\n por favor, revise que haya diligenciado toda la información necesaria y aceptado los terminos y condiciones e intente nuevamente, gracias.",
		  type: "error",
		  confirmButtonText: "Aceptar",
		  confirmButtonColor: "#E25856"
		});

		if ((dato1 === '') || (verDato1 < 2)){
			$("#input_nombre").css({"border":"2px solid #f00"});
		}else{
			$("#input_nombre").css({"border":"none"});
		}

		if ((dato2 === '') || (verificaCorreo == null)){
			$("#input_correo").css({"border":"2px solid #f00"});
		}else{
			$("#input_correo").css({"border":"none"});
		}

		if ((dato3 === '') || (verDato3 < 7)){
			$("#input_telefono").css({"border":"2px solid #f00"});
		}else{
			$("#input_telefono").css({"border":"none"});
		}

		if (dato4 === null) {
			$("#input_enterarse").css({"border":"2px solid #f00"});
		}else{
			$("#input_enterarse").css({"border":"none"});
		}

		if (aceptInfo == false) {
			$("#txt_acepto_informacion").css({"border":"2px solid #f00"});
		}else{
			$("#txt_acepto_informacion").css({"border":"none"});
		}

	}else if((verDato1 < 2) || (verificaCorreo == null) || (verDato3 < 7)){
		if (verDato1 < 2) {
			$("#input_nombre").css({"border":"2px solid #f00"});
			swal({
			  title: "El formulario no se ha enviado.",
			  text: "No se ha podido enviar el fomulario correctamente,\n por favor, revise que haya diligenciado toda la información necesaria y aceptado los terminos y condiciones e intente nuevamente, gracias.",
			  type: "error",
			  confirmButtonText: "Aceptar",
			  confirmButtonColor: "#E25856"
			});
		}else{
			$("#input_nombre").css({"border":"none"});
		}
		if (verificaCorreo == null) {
			$("#input_correo").css({"border":"2px solid #f00"});
			swal({
			  title: "El formulario no se ha enviado.",
			  text: "No se ha podido enviar el fomulario correctamente,\n por favor, revise que haya diligenciado toda la información necesaria y aceptado los terminos y condiciones e intente nuevamente, gracias.",
			  type: "error",
			  confirmButtonText: "Aceptar",
			  confirmButtonColor: "#E25856"
			});
		}else{
			$("#input_correo").css({"border":"none"});
		}
		if (verDato3 < 7) {
			$("#input_telefono").css({"border":"2px solid #f00"});
			swal({
			  title: "El formulario no se ha enviado.",
			  text: "No se ha podido enviar el fomulario correctamente,\n por favor, revise que haya diligenciado toda la información necesaria y aceptado los terminos y condiciones e intente nuevamente, gracias.",
			  type: "error",
			  confirmButtonText: "Aceptar",
			  confirmButtonColor: "#E25856"
			});
		}else{
			$("#input_telefono").css({"border":"none"});
		}
	}else{
		$("#input_nombre").css({"border":"none"});
		$("#input_correo").css({"border":"none"});
		$("#input_telefono").css({"border":"none"});
		$("#input_enterarse").css({"border":"none"});
		$("#txt_acepto_informacion").css({"border":"none"});
		pasoNumeroDos();
	}
}
//*********************************************************************************
//funcion que desbloquea el paso numero tres para ver las fotos del apto
//*********************************************************************************
function pasoNumeroTres(){
	$(".contenido3").attr("id","collapse3");
	$(".contenido3").siblings(".panel-heading").addClass("verde");
	$("#collapse2").removeClass("in");
	$("#collapse3").addClass("in");

	$(".contenido4").attr("id","collapse4");
	$(".contenido4").siblings(".panel-heading").addClass("parpadea");

	$("#part4 > .panel-heading > .panel-title > a").on("click",function(){
		$(".contenido4").siblings(".panel-heading").removeClass("parpadea");
		$(".contenido4").siblings(".panel-heading").addClass("verde");
	});
}
//*********************************************************************************
//funcion que desbloquea el paso numero cuatro para ver la cotizacion del apto
//*********************************************************************************
function pasoNumeroCuatro(){
	$(".contenido4").attr("id","collapse4");
	$(".contenido4").siblings(".panel-heading").addClass("verde");
	$("#collapse3").removeClass("in");
	$("#collapse4").addClass("in");
}
//*********************************************************************************
//funcion que cierra el modal y lo vacía 
//*********************************************************************************
function cierraModal(){
	$("#modal").empty();
	$("#modal").css("display","none");
}
//*********************************************************************************
//funcion que cierra el modal2 y lo vacía 
//*********************************************************************************
function cierraModal2(){
	$("#modal2").empty();
	$("#modal2").css("display","none");
}
function cierraModalSES(){
	$("#modalSES").empty();
	$("#modalSES").css("display","none");
}
//*********************************************************************************
//Zoom de la imagen paso dos cotizacion
//*********************************************************************************
function zoom(id){
	//alert("click");
	//$("#modal2").css("display","block");
	var fotoExt = $("#plantas").attr("foto");
	//alert(fotoExt);
	// $("#modal2").append("<img class='big_foto' src=img/"+id+".jpg>");
	// $("#modal2").append("<h3 class='close_modal'>X</h3>");
	// $("#modal2").append("<button id='alPaso3' class='button btn-success'>Siguiente</button>");

	// $(".close_modal").on("click",function(){
	// 	cierraModal2();
	// });	
	// $("#alPaso3").on("click",function(){
	// 	cierraModal2();
	// 	pasoNumeroTres();
	// });
}
//*********************************************************************************
//funcion de opacidades de imagenes 
//*********************************************************************************
function opacidadImg(com, ter){
	if (com < ter) {
		$(".opa"+com).animate({"opacity":"1"},1000);
		setTimeout(function(){
			$(".opa"+com).animate({"opacity":"0"},1000);
		},500);
		com=com+1;
		setTimeout(function(){opacidadImg(com, ter)},1800);
	}

}
//*********************************************************************************
//funcion que desbloquea el menu para libre acceso
//*********************************************************************************
function liberar(){
	$("#menu_cabecera > p").removeClass("bloqueado");
	$("#menu_cabecera > p").addClass("desbloqueado");
	$("#content_ubicacion").load('./libs/php/ubicacion.php');
	$("#content_sostenibilidad").load('./libs/php/sostenibilidad.php');
	$("#content_areas_comunes").load('./libs/php/areas_comunes.php');
	$("#content_tipologias").load('./libs/php/tipologias.php');
	$("#contenido_pagina_cotizacion").load('./libs/php/cotizacion.php');
	$("#content_avance_obra").load('./libs/php/avance_obra.php');
	$("#content_contacto").load('./libs/php/contacto.php');

	$(".access").removeClass("no-access");

	var e = 0;
	while(e < 8){
		$("#contenido_home > [pos="+e+"] > .access").css({
			"background":"url(./libs/img/index/tabla"+(e+1)+"verde.jpg)",
			"background-size":"100%"
		});
		e++;
	}
	// for (var e = 1; e <= 8; e++) {
	// 	$("#contenido_home > [pos="+e+"] > .access").css({
	// 		"background":"url(img/tabla"+e+"verde.jpg)",
	// 		"background-size":"100%"
	// 	});
	// }

	$("#modalDemo").empty();
	$("#modalDemo").css("display","none");
}
//*********************************************************************************
//funcion que muestra el pop up del demo de la página 
//*********************************************************************************
function demo(){
	//carga las columnas y el primer contenido
	$("#content_principal").load('./libs/php/contenido.php');
	
	var ancho = $(window).width();
	//alert(ancho);
	if (ancho <= 1023) {
		//alert("libera");
		$("#content_principal").load('./libs/php/contenido.php');
		setTimeout(function(){
			liberar();
		},3000);
		
	}else{
		//muestra el modal del demo
		$("#modalDemo").css("display","block");
		$("#img_demo").css("display","block");
		//muestra las imagenes centrales el contenido
		$("#desbloquea").attr("disabled", true);
		//toma 2 segundos para habilitar el boton de desbloqueo de todas las páginas
		setTimeout(function(){
			$("#desbloquea").attr("disabled", false);
		},2000);
	}
}
//*********************************************************************************
//funcion que oculta el pop up demo 
//*********************************************************************************
function skip(){
	$("#modalDemo").css("display","none");
}
//*********************************************************************************
//FUNCION QUE CARGA UBICACION
//*********************************************************************************
function llamaUbicacion(){
	var lleno = $("#content_ubicacion").html();
	
	if (lleno === '') {
		//alert("vacio -- > Cargando pagina...");
		$("#content_ubicacion").load('./libs/php/ubicacion.php');
	}else{
		//alert("ya estaba cargado --> no carga nada...");
	}
}
//*********************************************************************************
//FUNCION QUE CARGA SOSTENIBILIDAD
//*********************************************************************************
function llamaSostenibilidad(){
	var lleno = $("#content_sostenibilidad").html();

	if (lleno === '') {
		$("#content_sostenibilidad").load('./libs/php/sostenibilidad.php');
	}else{

	}
}
//*********************************************************************************
//FUNCION QUE CARGA AREAS COMUNES
//*********************************************************************************
function llamaAreasComunes(){
	var lleno = $("#content_areas_comunes").html();
	if (lleno === '') {
		$("#content_areas_comunes").load('./libs/php/areas_comunes.php');
	}else{

	}
}
//*********************************************************************************
//FUNCION QUE CARGA TIPOLOGIAS
//*********************************************************************************
function llamaTipologias(){
	var lleno = $("#content_tipologias").html();
	if (lleno === '') {
		$("#content_tipologias").load('./libs/php/tipologias.php');
	}else{

	}
}
//*********************************************************************************
//FUNCION QUE CARGA COTIZACION
//*********************************************************************************
function llamaCotizacion(){
	var lleno = $("#contenido_pagina_cotizacion").html();
	if (lleno === '') {
		$("#contenido_pagina_cotizacion").load('./libs/php/cotizacion.php');
		$("#content_cotizacion").css("border","1px solid");
	}else{

	}
}
//*********************************************************************************
//FUNCION QUE CARGA COTIZACION PARA TABLET 1024PX
//*********************************************************************************
// function llamaCotizacion1024(){
// 	$("#contenido_pagina_cotizacion").load('cotizacion1024.php');
// }
//*********************************************************************************
//FUNCION QUE CARGA AVANCE DE OBRA
//*********************************************************************************
function llamaAvanceObra(){
	var lleno = $("#content_avance_obra").html();
	if (lleno === '') {
		$("#content_avance_obra").load('./libs/php/avance_obra.php');
	}else{

	}
}
//*********************************************************************************
//FUNCION QUE CARGA CONTACTO
//*********************************************************************************
function llamaContacto(){
	var lleno = $("#content_contacto").html();
	if (lleno === '') {
		$("#content_contacto").load('./libs/php/contacto.php');
	}else{

	}
}

//*********************************************************************************
//funcion que detecta cuando se usa la primera opcion de busqueda en cotizacion.php
//*********************************************************************************
function checkedForm(){
	$(".contenedor_eleccion_aptos > label > input").attr("disabled", true);
	$(".contenedor_tipo_apto > label > input").attr("disabled", true);
}
//*********************************************************************************
//funcion que detecta cuando se usa la segunda y tercera opcion de busqueda en cotizacion.php
//*********************************************************************************
function checkedNumTipo(){
	$("#metraje").attr("disabled", true);
}
//*********************************************************************************
//funcion para las variables de posicion del footer
//*********************************************************************************
function acomodaFooter(){
	var totalAlto = $(window).height();
	var totalAncho = $(window).width();

	if (totalAncho >= 1920) {
		var maximo = 865;
		var altoFooter = 72; 
		var margen = 10;
		posicionaFooter(totalAlto, maximo, altoFooter, margen);
	}else if ((totalAncho >= 1280) && (totalAncho <= 1919)) {
		var maximo = 610;
		var altoFooter = 40; 
		var margen = 69;
		posicionaFooter(totalAlto, maximo, altoFooter, margen);
	}else if ((totalAncho >= 1024) && (totalAncho <= 1279)) {
		var maximo = 547;
		var altoFooter = 40; 
		var margen = 10;
		posicionaFooter(totalAlto, maximo, altoFooter, margen);
	}else if ((totalAncho >= 667) && (totalAncho <= 1023)) {
		var maximo = 345;
		var altoFooter = 30; 
		var margen = 10;
		posicionaFooter(totalAlto, maximo, altoFooter, margen);
	}else if ((totalAncho >= 480) && (totalAncho <= 666)) {
		var maximo = 205;
		var altoFooter = 30; 
		var margen = 10;
		posicionaFooter(totalAlto, maximo, altoFooter, margen);
	}
}
//*********************************************************************************
//funcion para la posicion del footer
//*********************************************************************************
function posicionaFooter(totalAlto, maximo, altoFooter, margen){
	maximo = maximo + altoFooter;
	if (totalAlto > maximo) {
		$("footer").css({"bottom":"0"});
	}else{
		$("footer").css({"bottom":"","margin-top":margen+"px"});
	}
}
//*********************************************************************************
//FUNCION QUE PERMITE TRANSICION ENTRE SECCIONES, ACORDION PRINCIPAL
//*********************************************************************************
function acordion(abierto, bloqueo, pos){
	var ancho = $(window).width();

	//condicional necesaria para ejecutar el acordion
	if ((ancho >= 1920) && (bloqueo == false)) {
		//variables PC 1920px en adelante
		var margin = -227;
		var contenido = 1350;
		movimientoAcordion(margin, contenido, pos);
	}else if ((ancho >= 1280) && (ancho <= 1919) && (bloqueo == false)) {
		//variables Portatiles 1280px -> 1919px
		var margin = -153;
		var contenido = 908;
		movimientoAcordion(margin, contenido, pos);
	}else if ((ancho >= 1024) && (ancho <= 1279) && (bloqueo == false)) {
		//variables Ipad 1024px -> 1279px
		var margin = -122;
		var contenido = 733;
		movimientoAcordion(margin, contenido, pos);
	}else if ((ancho >= 667) && (ancho <= 1023) && (bloqueo == false)) {
		//variables Iphone 6 667px -> 1023px
		var margin = -83;
		var contenido = 500;
		movimientoAcordion(margin, contenido, pos);
	}
	else if ((ancho >= 480) && (ancho <= 666) && (bloqueo == false)) {
		//variables para iphone 4 480px -> 666px
		var margin = -60;
		var contenido = 358;
		movimientoAcordion(margin, contenido, pos);
	}
}
//*********************************************************************************
//funcion que hace el movimiento del acordion principal
//*********************************************************************************
function movimientoAcordion(margin, contenido, pos){
	
	var tabla = parseInt(pos) + 1;

	//aca le cambia la imagen a la columna siguiente del contenido
	$(".p"+tabla).css({
		"background":"url(./libs/img/index/tabla"+(tabla+1)+"verde.jpg)",
		"background-size":"100%"
	});

	//desbloquea la columna siguiente del contenido
	$(".p"+tabla).removeClass("no-access");

	//guarda las variables de la actual y nueva posicion del contenido del acordion
	var posActual = $("#contenido_home").css("margin-left");
	var posNueva = margin * pos;
	posNueva = posNueva+"px";
	//aca se compara si se quiere adelantar o ir hacia atrás en el contenido
	if (posActual == posNueva) {
		//aca si se quiere ir atrás al contenido anterior
		//aca compara si es la primera columna para no desjustar el acordion
		if (pos == 0) {
			$(".abierto").animate({"width":"0px"},400);
			$(".contenido").removeClass("abierto");
			$("#contenido_home").animate({"margin-left": margin * pos +"px"},400);
			$("[pos="+(pos)+"] > .contenido").addClass("abierto");
			$("[pos="+(pos)+"] > .contenido").animate({"width": contenido+"px"},400);
		}else if(pos < 6){
			$(".abierto").animate({"width":"0px"},400);
			$(".contenido").removeClass("abierto");
			//aca devuelve el acordion a la posicion anterior 
			$("#contenido_home").animate({"margin-left":margin * (pos - 1)+"px"},400);
			$("[pos="+(pos-1)+"] > .contenido").addClass("abierto");
			$("[pos="+(pos-1)+"] > .contenido").animate({"width": contenido+"px"},400);
		}else{
			$(".abierto").animate({"width":"0px"},400);
			$(".contenido").removeClass("abierto");
			//aca devuelve el acordion a la posicion anterior 
			$("#contenido_home").animate({"margin-left":margin * (pos - 1)+"px"},400);
			$("[pos="+(pos-1)+"] > .contenido").addClass("abierto");
			$("[pos="+(pos-1)+"] > .contenido").animate({"width": contenido+"px"},400);

			$("#btn_al_inicio").animate({"opacity":"0"},400);
			setTimeout(function(){
				$("#btn_al_inicio").css("display","none");
			},600);
		}
	}else{
		$(".abierto").animate({"width":"0px"},400);
		$(".contenido").removeClass("abierto");
		//aca avanza el acordion a la siguiente posicion 
		$("#contenido_home").animate({"margin-left": margin * pos +"px"},400);
		$("[pos="+(pos)+"] > .contenido").addClass("abierto");
		$("[pos="+(pos)+"] > .contenido").animate({"width": contenido+"px"},400);

	}

	//propiedades a la cabecera
	var attrPos = $(".abierto").parent(".section").attr("pos");
	//alert(attrPos);
	$("#menu_cabecera > p").removeClass("estoy");
	$("#menu_cabecera > .mp"+attrPos).addClass("estoy");
	$("#menu_cabecera > .mp"+attrPos).removeClass("bloqueado");
	$("#menu_cabecera > .mp"+attrPos).addClass("desbloqueado");
}
//********************************************************************************
//FUNCION QUE PERMITE LA TRANSICION EBTRE SECCIONES CON EL MENÚ SUPERIOR
//********************************************************************************
function menuSup(numPos, desbloqueado, open){
	var ancho = $(window).width();
	// alert(desbloqueado);
	// alert(open);
	if ((ancho >= 1920) && (desbloqueado == true) && (open == false)) {
		//alert("si se cumple");
		$("#contenido_home").animate({"margin-left": -227 * numPos +"px"},400);
		$(".abierto").animate({"width":"0px"},400);
		$(".contenido").removeClass("abierto");
		$("[pos="+(numPos)+"] > .contenido").addClass("abierto");
		$("[pos="+(numPos)+"] > .contenido").animate({"width":"1350px"},400);
		$("#menu_cabecera > p").removeClass("estoy");
		$("#menu_cabecera > .mp"+numPos).addClass("estoy");

		if (numPos == 7) {
			$("#btn_al_inicio").css("display","block");
			$("#btn_al_inicio").animate({"opacity":"1"},400);
		}else{
			$("#btn_al_inicio").animate({"opacity":"0"},400);
			setTimeout(function(){
				$("#btn_al_inicio").css("display","none");
			},500);
		}
	}else if ((ancho >= 1280) && (ancho <= 1919) && (desbloqueado == true) && (open == false)) {
		//alert("si se cumple");
		$("#contenido_home").animate({"margin-left": -153 * numPos +"px"},400);
		$(".abierto").animate({"width":"0px"},400);
		$(".contenido").removeClass("abierto");
		$("[pos="+(numPos)+"] > .contenido").addClass("abierto");
		$("[pos="+(numPos)+"] > .contenido").animate({"width":"908px"},400);
		$("#menu_cabecera > p").removeClass("estoy");
		$("#menu_cabecera > .mp"+numPos).addClass("estoy");

		if (numPos == 7) {
			$("#btn_al_inicio").css("display","block");
			$("#btn_al_inicio").animate({"opacity":"1"},400);
		}else{
			$("#btn_al_inicio").animate({"opacity":"0"},400);
			setTimeout(function(){
				$("#btn_al_inicio").css("display","none");
			},500);
		}
	}else if ((ancho >= 1024) && (ancho <= 1279) && (desbloqueado == true) && (open == false)) {
		//alert("si se cumple");
		$("#contenido_home").animate({"margin-left": -122 * numPos +"px"},400);
		$(".abierto").animate({"width":"0px"},400);
		$(".contenido").removeClass("abierto");
		$("[pos="+(numPos)+"] > .contenido").addClass("abierto");
		$("[pos="+(numPos)+"] > .contenido").animate({"width":"733px"},400);
		$("#menu_cabecera > p").removeClass("estoy");
		$("#menu_cabecera > .mp"+numPos).addClass("estoy");

		if (numPos == 7) {
			$("#btn_al_inicio").css("display","block");
			$("#btn_al_inicio").animate({"opacity":"1"},400);
		}else{
			$("#btn_al_inicio").animate({"opacity":"0"},400);
			setTimeout(function(){
				$("#btn_al_inicio").css("display","none");
			},500);
		}
	}else if ((ancho >= 667) && (ancho <= 1023) && (desbloqueado == true) && (open == false)) {
		//alert("si se cumple");
		$("#contenido_home").animate({"margin-left": -83 * numPos +"px"},400);
		$(".abierto").animate({"width":"0px"},400);
		$(".contenido").removeClass("abierto");
		$("[pos="+(numPos)+"] > .contenido").addClass("abierto");
		$("[pos="+(numPos)+"] > .contenido").animate({"width":"500px"},400);
		$("#menu_cabecera > p").removeClass("estoy");
		$("#menu_cabecera > .mp"+numPos).addClass("estoy");

		if (numPos == 7) {
			$("#btn_al_inicio").css("display","block");
			$("#btn_al_inicio").animate({"opacity":"1"},400);
		}else{
			$("#btn_al_inicio").animate({"opacity":"0"},400);
			setTimeout(function(){
				$("#btn_al_inicio").css("display","none");
			},500);
		}
	}else if ((ancho >= 480) && (ancho <= 666) && (desbloqueado == true) && (open == false)) {
		//alert("si se cumple");
		$("#contenido_home").animate({"margin-left": -60 * numPos +"px"},400);
		$(".abierto").animate({"width":"0px"},400);
		$(".contenido").removeClass("abierto");
		$("[pos="+(numPos)+"] > .contenido").addClass("abierto");
		$("[pos="+(numPos)+"] > .contenido").animate({"width":"358px"},400);
		$("#menu_cabecera > p").removeClass("estoy");
		$("#menu_cabecera > .mp"+numPos).addClass("estoy");

		if (numPos == 7) {
			$("#btn_al_inicio").css("display","block");
			$("#btn_al_inicio").animate({"opacity":"1"},400);
		}else{
			$("#btn_al_inicio").animate({"opacity":"0"},400);
			setTimeout(function(){
				$("#btn_al_inicio").css("display","none");
			},500);
		}
	}
}
//********************************************************************************
//funcion que cambia las vistas en avance de obra
//********************************************************************************
function vistas(vis){
	$(".contenedor_img > div").css({"display":"none"});
	$("#"+vis).css({"display":"block"});

	$(".vistas > img").removeClass("viendovista1");
	$(".vistas > img").removeClass("viendovista2");
	$(".vistas > img").removeClass("viendovista3");

	$("[vista="+vis+"]").addClass("viendo"+vis);
}
//********************************************************************************
//funcion que cambia los carruseles en tipologias
//********************************************************************************
function tipologia(carrusel){
	var e = 1;
	while(e <= 11){
		$("#carrusel_tipo"+e).css("display","none");
		e++;
	}
	$("#carrusel_"+carrusel).css("display","block");
}
//********************************************************************************
//funcion que invoca el carousel dentro de cotizacion paso 3
//********************************************************************************
function invocaCarousel(){
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

	    var jssor_slider1 = new $JssorSlider$("myCarousel", options);
	});
	
}
//********************************************************************************
//funcion contacto --> contacto.php
//********************************************************************************
function Contactanos(nombre, letrasNombre, email, verificaEmail, celular, numerosCelular,  mensaje, terminos){
	if ((nombre == '') || (email == '') || (celular == '') || (mensaje == '') || (terminos == false)) {
		swal({
		    title: "El formulario no se ha enviado.",
		    text: "No se ha podido enviar el fomulario correctamente,\n por favor, revise que haya diligenciado toda la información necesaria y aceptado los terminos y condiciones e intente nuevamente, gracias.",
		    type: "error",
		    confirmButtonText: "Aceptar",
		    confirmButtonColor: "#E25856"
		});	

		if (nombre == ''){
			$("#nombre_con").css({"border":"2px solid #f00"});
		}else{
			$("#nombre_con").css({"border":"none"});
		}

		if (email == '') {
			$("#email_con").css({"border":"2px solid #f00"});
		}else{
			$("#email_con").css({"border":"none"});
		}

		if (celular == '') {
			$("#cel_con").css({"border":"2px solid #f00"});
		}else{
			$("#cel_con").css({"border":"none"});
		}

		if (mensaje == '') {
			$("#mensaje_con").css({"border":"2px solid #f00"});
		}else{
			$("#mensaje_con").css({"border":"none"});
		}

		if (terminos == false) {
			$("#txt_acepto_terminos").css({"border":"2px solid #f00"});
		}else{
			$("#txt_acepto_terminos").css({"border":"none"});
		}

	}else if((letrasNombre < 2) || (verificaEmail == null) || (numerosCelular < 10)){
		
		if (letrasNombre < 2) {
			$("#nombre_con").css({"border":"2px solid #f00"});
			swal({
			    title: "El formulario no se ha enviado.",
			    text: "No se ha podido enviar el fomulario correctamente,\n por favor, revise que haya diligenciado toda la información necesaria y aceptado los terminos y condiciones e intente nuevamente, gracias.",
			    type: "error",
			    confirmButtonText: "Aceptar",
			    confirmButtonColor: "#E25856"
			});	
		}else{
			$("#nombre_con").css({"border":"none"});
		}

		if (verificaEmail == null) {
			$("#email_con").css({"border":"2px solid #f00"});
			swal({
			    title: "El formulario no se ha enviado.",
			    text: "No se ha podido enviar el fomulario correctamente,\n por favor, revise que haya diligenciado toda la información necesaria y aceptado los terminos y condiciones e intente nuevamente, gracias.",
			    type: "error",
			    confirmButtonText: "Aceptar",
			    confirmButtonColor: "#E25856"
			});	
		}else{
			$("#email_con").css({"border":"none"});
		}

		if (numerosCelular < 10) {
			$("#cel_con").css({"border":"2px solid #f00"});
			swal({
			    title: "El formulario no se ha enviado.",
			    text: "No se ha podido enviar el fomulario correctamente,\n por favor, revise que haya diligenciado toda la información necesaria y aceptado los terminos y condiciones e intente nuevamente, gracias.",
			    type: "error",
			    confirmButtonText: "Aceptar",
			    confirmButtonColor: "#E25856"
			});
		}else{
			$("#cel_con").css({"border":"none"});
		}

	}else{
		// se asignan los campos del formulario con sus valores a la variable
		var datos_form_con = new FormData($("#form_contacto")[0]);
		// inicia la funcion ajax
		$.ajax({
		    // nombre del archivo php que recibe los datos enviados
		    url:"./libs/php/formulario_contacto.php",
		    cache:false,
		    type:"POST",
		    contentType:false,
		    data:datos_form_con,
		    processData:false,
		    // si todo va bien hace esto
		    success: function(datos){
		        // si la respuesta "datos" contiene algun valor hace esto
		        if(datos !== ''){
		            // alertas amigables con bootstrap busque la libreria sweet-alert.js
		            //alert(datos);
		            swal({
		              title: "",
		              text: "Nos contactaremos contigo lo más pronto posible.",
		              type: "success",
		              confirmButtonText: "Aceptar",
		              confirmButtonColor: "#87B32E"
		            });
		            //aca esta el codigo que crea el pdf
		            
		            
		            $('#form_contacto').each (function(){
		              this.reset();
		            });

		        }
		        // si la respuesta es vacia hace esto
		        else{
		            //alert("error");
		            swal({
		                title: "El formulario no se ha enviado.",
		                text: "No se ha podido enviar el fomulario correctamente,\n por favor, revise que haya diligenciado toda la información necesaria y aceptado los terminos y condiciones e intente nuevamente, gracias.",
		                type: "error",
		                confirmButtonText: "Aceptar",
		                confirmButtonColor: "#E25856"
		            });
		            return;
		        }
		    }
		});
		//libera del error de llenado de texto a todo el formulario
		$("#nombre_con").css({"border":"none"});
		$("#email_con").css({"border":"none"});
		$("#cel_con").css({"border":"none"});
		$("#mensaje_con").css({"border":"none"});
		$("#txt_acepto_terminos").css({"border":"none"});
	}
}
//********************************************************************************
//funcion que detecta un correo y extrae información de la tabla registros
//********************************************************************************
function reconoceCorreo(mail){
	if (mail == "") {

	}else{
		$("#input_nombre").load('./libs/php/recupera_datos.php?mail='+mail);
	}
}

//********************************************************************************
//FUNCIONES QUE ACTUAN EN LAS SESIONES DE QUIMBAYA
//********************************************************************************
//********************************************************************************
//funcion que incia la sesion 
//********************************************************************************
function iniciaSesion(usuario, clave){
	if ((usuario == "") || (clave == "")) {
		swal({
			title: "¡ Error !",
			text: "No se ha podido iniciar la sesión por favor revise los datos ingresados e intente de nuevo.",
			type: "error",
			confirmButtonColor: "#87B32E",
			confirmButtonText: "Aceptar"
		});
	}else{
		var datos_sesion = new FormData($("#form_inicio_sesion")[0]);
		$("#modal2").load('./libs/sesiones/login.php?usuario='+usuario+'&clave='+clave);
	}
}
//********************************************************************************
//funcion que cierra la sesion 
//********************************************************************************
function logOut(){
	$("#SES_cierra_sesion").load('../logout.php');
}
//********************************************************************************
//funcion que llama el formulario de ingreso de datos de quien compra un apto
//********************************************************************************
function llamaSES_formulario(IDapto){
	$("#modal").css("display","block");
	$("#modal").load("formulario_cliente.php?IDapto="+IDapto);
}
function llamaSES_formulario_info(IDapto){
	$("#modal").css("display","block");
	$("#modal").load("formulario_cliente_info.php?IDapto="+IDapto);
}
function llamaSES_formulario_edita(IDapto){
	$("#modal").css("display","block");
	$("#modal").load("formulario_cliente_edita.php?IDapto="+IDapto);
}
//********************************************************************************
//funcion que llama el formulario de ingreso de datos de quien compra un apto
//********************************************************************************
function SES_uploadFile(IDapto){
	$("#modalSES").css("display","block");
	$("#modalSES").load('form_subida_archivo.php?apto='+IDapto);
}
//********************************************************************************
//funcion que guarda un cliente con su apto
//********************************************************************************
function guardaCliente(){
	var nombre = $("#nombre_cliente").val();
	var apellido = $("#apellido_cliente").val();
	var telefono = $("#telefono_cliente").val();
	var direccion = $("#direccion_cliente").val();
	var cedula = $("#cedula_cliente").val();
	var email = $("#email_cliente").val();
	var pago = $("#pago_cliente").val();
	var deposito = $("#get_depo").val();
	var parqueadero = $("#get_parq").val();

	if ((nombre == '') || (apellido == '') || (telefono == '') || (direccion == '') || (cedula == '') || (email == '') || (pago == '') || (deposito == '') || (parqueadero == '') ) {
		swal({
			title: "Error",
			text: "Por favor asegurate de haber llenado todos los campos correctamente e intenta nuevamente",
			type: "error",
			confirmButtonColor: "#87B32E",
			confirmButtonText: "Aceptar"
		});
	}else{
		swal({
			title: "Éxito",
			text: "Éste cliente ha sido registrado con el apartamento seleccionado.",
			type: "success",
			confirmButtonColor: "#87B32E",
			confirmButtonText: "Aceptar"
		});

		var datos_form = new FormData($("#SES_form_venta")[0]);
		$.ajax({
		    // nombre del archivo php que recibe los datos enviados
		    url:"guarda_cliente.php",
		    cache:false,
		    type:"POST",
		    contentType:false,
		    data:datos_form,
		    processData:false,
		});

		$("#SES_form_venta").each(function(){
			this.reset();
		});

		cierraModal();
	}
}
function guardaClienteSinDeposito(){
	var nombre = $("#nombre_cliente").val();
	var apellido = $("#apellido_cliente").val();
	var telefono = $("#telefono_cliente").val();
	var direccion = $("#direccion_cliente").val();
	var cedula = $("#cedula_cliente").val();
	var email = $("#email_cliente").val();
	var pago = $("#pago_cliente").val();
	
	var parqueadero = $("#get_parq").val();

	if ((nombre == '') || (apellido == '') || (telefono == '') || (direccion == '') || (cedula == '') || (email == '') || (pago == '') || (parqueadero == '') ) {
		swal({
			title: "Error",
			text: "Por favor asegurate de haber llenado todos los campos correctamente e intenta nuevamente",
			type: "error",
			confirmButtonColor: "#87B32E",
			confirmButtonText: "Aceptar"
		});
	}else{
		swal({
			title: "Éxito",
			text: "Éste cliente ha sido registrado con el apartamento seleccionado.",
			type: "success",
			confirmButtonColor: "#87B32E",
			confirmButtonText: "Aceptar"
		});

		var datos_form = new FormData($("#SES_form_venta")[0]);
		$.ajax({
		    // nombre del archivo php que recibe los datos enviados
		    url:"guarda_cliente.php",
		    cache:false,
		    type:"POST",
		    contentType:false,
		    data:datos_form,
		    processData:false,
		});

		$("#SES_form_venta").each(function(){
			this.reset();
		});

		cierraModal();
	}
}
function editaCliente(){
	var nombre = $("#nombre_cliente").val();
	var apellido = $("#apellido_cliente").val();
	var telefono = $("#telefono_cliente").val();
	var direccion = $("#direccion_cliente").val();
	var cedula = $("#cedula_cliente").val();
	var email = $("#email_cliente").val();
	var pago = $("#pago_cliente").val();

	if ((nombre == '') || (apellido == '') || (telefono == '') || (direccion == '') || (cedula == '') || (email == '') || (pago == '')) {
		swal({
			title: "Error",
			text: "Por favor asegurate de haber llenado todos los campos correctamente e intenta nuevamente",
			type: "error",
			confirmButtonColor: "#87B32E",
			confirmButtonText: "Aceptar"
		});
	}else{
		swal({
			title: "Felicidades",
			text: "Éste cliente ha sido registrado con el apartamento seleccionado.",
			type: "success",
			confirmButtonColor: "#87B32E",
			confirmButtonText: "Aceptar"
		});

		var datos_form = new FormData($("#SES_form_venta")[0]);
		$.ajax({
		    // nombre del archivo php que recibe los datos enviados
		    url:"edita_cliente.php",
		    cache:false,
		    type:"POST",
		    contentType:false,
		    data:datos_form,
		    processData:false,
		});

		$("#SES_form_venta").each(function(){
			this.reset();
		});

		cierraModal();
	}
}





