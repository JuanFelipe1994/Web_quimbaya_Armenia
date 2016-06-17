<?php 

	session_start();
	require('../../php/conexion.php');

	$user = $_GET['user'];


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Quimbaya Login</title>
	<link rel="stylesheet" href="../../css/bootstrap.min.css">
	<link rel="stylesheet" href="../../css/normalize.css">
	<link rel="stylesheet" href="../../css/sweetalert.css">
	<link rel="stylesheet" href="../../css/fullcalendar.min.css">
	<link rel="stylesheet" href="../../css/fullcalendar.print.css" media='print'>
	<link rel="stylesheet" href="../../css/prototipo1.css">
</head>
<body>
<div id="modal"></div>
<div id="modalSES"></div>




<div id="SES_cabecera">
	<div id="SES_logo">
		<img src="../../img/index/banner.png">
	</div>
</div>

<div class="separador"></div>

<button type="button" class="btn btn-info" id="SES_configuracion"><i class="glyphicon glyphicon-cog"></i></button>
<button type="button" class="btn btn-info" id="SES_cierra_sesion">Cerrar Sesión</button>
<div class="separador"></div>

<nav id="SES_menu">
	<div id="SES_content_menu">
		<button type="button" class="btn btn-success open" enlace="ventas">VENTAS</button>
		<button type="button" class="btn btn-success" enlace="estadisticas">ESTADÍSTICAS</button>
		<button type="button" class="btn btn-success" enlace="datos">DATOS</button>
		<button type="button" class="btn btn-success" enlace="calendario">CALENDARIO</button>
	</div>
</nav>

<div class="separador"></div>
<div id="SES_content_total_contenido">
	<div id="SES_contenido"></div>
</div>

<footer>
	<div class="content">
		<button type="button" class="btn btn-success" id="ini_ses">inicia sesion</button>
		<p>Teléfono: (571 7446168) - Correo electrónico: info@rmasb.com - <a id="link_rmasb" href="http://www.rmasb.com" target="_blank">www.rmasb.com</a></p>
		<p>Diseñado por R <span>+</span> B Diseño Experimental - &copy; 2016 Todos los derechos reservados</p>
		<div class="redes_sociales">
			<a id="icon_face" href="https://www.facebook.com/pages/RB-Dise%C3%B1o-Experimental-Ltda/87885229006" target="_blank"></a>
			<a id="icon_twit" href="https://twitter.com/RmasBDE" target="_blank"></a>
		</div>
	</div>
</footer>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/general.js"></script>
<script src="../../js/sweetalert.min.js"></script>
<script src="../../js/highcharts.js"></script>
<script src="../../js/moment.min.js"></script>
<script src="../../js/fullcalendar.min.js"></script>
<script type="text/javascript">
	//funciones que acomodan el footer
	$(document).ready(function(){
		acomodaFooter();
		$("#SES_contenido").load('ventas.php');
	});
	$(window).resize(function(){
		acomodaFooter();
	});
	//funcion que cierra la sesion actual
	$("#SES_cierra_sesion").on("click",function(){
		logOut();
	});
	//funcion que muestra la configuración de la cuenta
	$("#SES_configuracion").on("click",function(){
		swal({
			title: "¿Cambiar de Contraseña?",
			text: "¿Deseas cambiar la contraseña actual por una nueva?",
			type: "warning",
			showCancelButton: true,
			cancelButtonColor: "#E25856",
			cancelButtonText: "Cancelar",
			confirmButtonColor: "#87B32E",
			confirmButtonText: "Cambiar clave"
		},
		function(isConfirm){
			if (isConfirm) {
				setTimeout(function(){
					swal({
						title: "Establece la nueva Contraseña",   
						text: "ingresa la nueva contraseña.",   
						type: "input",   
						showCancelButton: true,   
						closeOnConfirm: false,   
						animation: "slide-from-top",   
						inputPlaceholder: "Nueva Contraseña" 
					},function(inputValue){   
						if (inputValue === false) return false;      
						if (inputValue === "") {     
							swal.showInputError("Necesitas escribir una contraseña");     
							return false   
						}else{
							var corruser = '<?php echo $user; ?>';
							$.ajax({
								url:"../../php/cambia_contrasena.php",
								cache:false,
								type:"GET",
								contentType:false,
								data:"contrasena="+inputValue+"&usuario="+corruser,
								processData:false,
							});
							swal("Contraseña Cambiada", "Su nueva contraseña ha sido guardada", "success"); 
						}   
					});
				},500);
				
			}
		});
	});
	//función que carga el contenido de las sesiones 
	$("#SES_content_menu > button").on("click",function(){
		var enlace = $(this).attr("enlace");
		$("#SES_content_menu > button").removeClass("open");
		$(this).addClass("open");
		$("#SES_contenido").html("");
		$("#SES_contenido").load(enlace+'.php');
	});
</script>
</body>
</html>
