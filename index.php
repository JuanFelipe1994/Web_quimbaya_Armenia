<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- <meta http-equiv="expires" content="Fri, 25 Mar 2016 1:00:00 GMT" /> -->
	<meta http-equiv="Content-Language" content="es">
	<meta name="keywords" content="ventas de apartamentos, Armenia, Proyecto Edificio, apartamento en Armenia">
	<meta name="description" content="Venta de apartamentos ubicados en ARMENIA, QUINDIO, proyecto inmobiliario">
	<!--// Venta de apartamentos ubicados en ARMENIA, QUINDIO, proyecto inmobiliario //-->
	<meta name="robots" content="all | index | follow">
	<meta name="Revisit" content="7 days">
	<title>Quimbaya</title>
	<link rel="stylesheet" href="libs/css/bootstrap.min.css">
	<link rel="stylesheet" href="libs/css/sweetalert.css">
	<link rel="stylesheet" href="libs/css/normalize.css">
	<link rel="stylesheet" href="libs/css/prototipo1.css">
</head>

<body>
	<div id="modal"></div>
	<div id="modal2"></div>
	<div id="modalDemo">
		<div id='img_demo'>
			<img src='./libs/img/index/banner.png' id='banner_demo'>
			<p id='explicacion'>
				<strong id='txt_bienvenida'>Bienvenid@</strong>
				<br>
				<span class='resalta_v'>Déjenos guiarl@ hacia 
					<strong id='resalta_grande'>su nuevo apartamento.</strong>
				</span> Por favor ingrese a los paneles activos (color verde) para conocer progresivamente el 
				<span class='resalta_v'>proyecto.</span>
			</p>
			<button type='button' class='btn btn-success' id='skip'>Aceptar</button>
			<img src='./libs/img/index/INTRO3.gif' id='img_intro'>
			<div id='linea_demo'></div>
			<button type='button' class='btn btn-success' id='desbloquea'>¡Ya he visto el proyecto antes!</button>
		</div>
	</div>
	

	<header>
		<div class="content">
			<div id="inicio_sesion">
				<button type="button" class="btn btn-danger" id="close_ses">Cerrar</button>
				<p class="olvido_contrasena">¿Ha olvidado su contraseña?</p>
				<div class="separador"></div>
				<p class="bienvenido">Bienvenido</p>
				<form id="form_inicio_sesion" method="post">
					<label class="in_correo">Correo</label>
					<input id="input_usuario" class="in_correo input_incorreo" type="mail" name="usuario">
					<label class="in_correo">Contraseña</label> 
					<input id="input_clave" class="in_correo input_incorreo" type="password" name="clave">
					<button id="inicia_sesion" type="button" class="btn btn-default">Entrar</button>
				</form>
			</div>
		</div>
		<div id="contenedor_cabecera">
			<a href="index.php"><img src="libs/img/index/banner.png"></a>
			<div id="menu_cabecera">
				<p id="ubi" class="mp1 bloqueado" pos="1">UBICACIÓN</p>
				<p id="sos" class="mp2 bloqueado" pos="2">SOSTENIBILIDAD</p>
				<p id="are" class="mp3 bloqueado" pos="3">ÁREAS COMUNES</p>
				<p id="tip" class="mp4 bloqueado" pos="4">TIPOLOGÍAS</p>
				<p id="cot" class="mp5 bloqueado" pos="5">COTIZACIÓN</p>
				<p id="ava" class="mp6 bloqueado" pos="6">AVANCE DE OBRA</p>
				<p id="con" class="mp7 desbloqueado" pos="7">CONTACTO</p>
			</div>
		</div>
	</header>
	<div class="content" id="content_principal"></div>
	<div class="separador"></div>

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
	<div id="icono_celular">
		<img src="libs/img/index/intro480.png">
	</div>
	<!-- ********************************************************************* -->
	<!-- ***                           JAVASCRIPT                          *** -->
	<!-- ********************************************************************* -->
	<script src="libs/js/jquery-2.2.4.min.js"></script>
	<script src="libs/js/jquery-migrate-1.3.0.min.js"></script>
	<script src="libs/js/bootstrap.min.js"></script>
	<script src="libs/js/general.js"></script>
	<script src="libs/js/sweetalert.min.js"></script>
	<script type="text/javascript">
		//carga demo y acomoda el footer
		$(document).ready(function(){
			demo();
			acomodaFooter();
		});
		//cierra el modal de bienvenida
		$("#skip").on("click",function(){
			skip();
		});
		//carga todas las páginas a la vez
		$("#desbloquea").on("click",function(){
			liberar();
		});
		//acomoda el footer si cambia las dimensiones del navegador
		$(window).resize(function(){
			acomodaFooter();
		});
		//envia los datos para iniciar sesion
		$("#inicia_sesion").on("click",function(){
			var usuario = $("#input_usuario").val();
			var clave = $("#input_clave").val();
			iniciaSesion(usuario, clave);
		});
		//funcion para recuperar contraseña
		$(".olvido_contrasena").on("click",function(){
			  
			swal({   
				title: "¿Ha olvidado su Contraseña?",   
				text: "Por favor ingrese el correo electrónico con el que quedó registrado, y le será enviado una clave temporal al mismo.",   
				type: "input",   
				showCancelButton: true,   
				closeOnConfirm: false,   
				animation: "slide-from-top",   
				inputPlaceholder: "Correo Electrónico registrado" 
			}, function(inputValue){  
				if (inputValue === false) return false; 
				//verificaCorreo
				var verSigno = /@/;
				var correo = inputValue.match(verSigno);
				if ((inputValue === "") || (correo == null)) {     
					swal.showInputError("Error, necesita ingresar el correo electrónico.");     
					return false   
				}else{
					$.ajax({
						url:"./libs/php/recupera_contrasena.php",
						cache:false,
						type:"GET",
						contentType:false,
						data:"correo="+inputValue,
						processData:false,
					});
					swal("Contraseña Enviada", "Su nueva contraseña temporal ha sido enviada al correo: " + inputValue, "success"); 
				}      
				
			});
		});
	</script>
</body>

</html>