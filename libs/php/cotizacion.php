
	<?php
		require('conexion.php');
	?>
	<div id="contenido">
		<div class="separador"></div>
		<div class="panel-group" id="accordion">
			<div class="panel panel-default" id="part1">
				<div class="panel-heading verde">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapse1">1. Ingresa tus datos</a>
					</h4>
				</div>
				<div id="collapse1" class="panel-collapse collapse in">
					<div class="panel-body">
						<!-- SECCION 1 FORMULARIO DE REGISTRO-->
						<form id="registro_cotizacion" method="post">
							<div class="form-group">
								<label for="input_correo">*Correo electrónico</label>
								<input type="email" class="form-control" id="input_correo" name="correo" placeholder="Correo electrónico" required>
							</div>
							<div class="form-group">
								<label for="input_nombre">*Nombre completo</label>
								<input type="text" class="form-control" id="input_nombre" name="nombre" placeholder="Nombre" required>
							</div>
							<div class="form-group descartable">
								<label for="input_pais">País de residencia</label>
								<?php
									include('seleccion_paises.php');
								?>
								<!-- <input type="text" class="form-control" id="input_pais" name="pais" placeholder="País de residencia"> -->
							</div>
							<div class="form-group descartable" id="campo_ciudad">
								
								<!-- <input type="text" class="form-control" id="input_ciudad" name="ciudad" placeholder="Ciudad de residencia" > -->

								<?php 
									include('seleccion_ciudad.php');
								?>
							</div>
							<div class="form-group">
								<label for="input_telefono">*Teléfono</label>
								<input type="number" class="form-control" id="input_telefono" name="telefono" placeholder="Número telefónico" required>
							</div>
							<div class="form-group">
								<label for="input_enterarse">*¿Cómo te enteraste de este proyecto?</label>
								<select class="form-control" id="input_enterarse" placeholder="Seleccione" name="enterarse">
									<option selected disabled>Selecciona:</option>
									<option>Correo Electronico</option>
									<option>Publicidad Impresa</option>
									<option>Pagina web</option>
									<option>Redes sociales</option>
									<option>Referido</option>
									<option>Constructora</option>
									<option>Inmobiliaria</option>
								</select>	
							</div>
							<div class="form-group" id="form_parte_final1">
								<input type="checkbox" id="acepto_informacion"><span>Los campos con (*) son obligatorios.</span><strong id="txt_acepto_informacion">*Acepto el envío de mi información y recibir información por parte de R + B Diseño Experimental.</strong> 
							</div>
							<div class="separador"></div>
							<input id="id_apto" type="hidden" name="id_apto">
						</form>
						<div class="contenido_btn">
							<button id="paso_dos" class="btn btn-success">Siguiente</button>
						</div>
					</div>
				</div>
			</div>
			<div class="panel panel-default" id="part2">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapse2">2. Busca tu apartamento</a>
					</h4>
				</div>
				<div class="panel-collapse collapse contenido2">
					<div class="panel-body " >
						<!-- SECCION 1 BUSQUEDA DE APARTAMENTO -->
						<div id="contenedor">
							<div class="parte_izquierda">
								<div class="preguntas">
									<form id="filtro_busqueda" method="post">
										<label id="text_mts">¿Cuántos metros quieres en tu apartamento?</label>
										<div class="lineagris"></div>
										<div class="range_price">
											<select id="metraje" name="metraje" class="formulario">
												<option selected disabled>Selecciona:</option>
												<option value="60">Tipo 10: 60.56</option>
												<option value="64">Tipo 9: 64.75</option>
												<option value="81">Tipo 10: 81.17</option>
												<option value="84">Tipo 2: 84.90</option>
												<option value="85">Tipo 5: 85.52</option>
												<!-- <option value="85.6101">85.61</option> -->
												<option value="86">Tipo 3: 86.33</option>
												<option value="109">Tipo 1: 109.78</option>
												<option value="119">Tipo 1: 119.17</option>
												<option value="126">Tipo 6: 126.70</option>
												<option value="138">Tipo 3: 138.39</option>
												<option value="171">Tipo 7: 171.10</option>
												<option value="176">Tipo 4: 176.18</option>
												<option value="189">Tipo 7: 189.86</option>
												<option value="190">Tipo 11: 190.30</option>
												<option value="195">Tipo 11: 195.08</option>
												<!-- <option value="195.93">195.93</option> -->
												<option value="196">Tipo 7: 196.15</option>
												<option value="198">Tipo 7: 198.92</option>
												<option value="220">Tipo 8: 220.46</option>
											</select>
										</div>
										<div class="separador"></div>
										<label class="num_alcobas">¿Cuántas alcobas quieres en tu apartamento?</label>
										<div class="lineagris2"></div>
										<label class="preg2" style="float:right;margin-right:44px;">¿Qué tipo de apartamento buscas?</label>
										<div class="lineagris3"></div>
										<div class="separador"></div>
										<div class="contenedor_eleccion_aptos">
											<label class="radio-inline alcoba">
												<input type="radio" class="formulario"name="alcoba" id="uno" value="1" >&nbsp;&nbsp;&nbsp;1
											</label>
											<label class="radio-inline alcoba">
												<input type="radio" class="formulario"name="alcoba" id="dos" value="2"  >&nbsp;&nbsp;&nbsp; 2
											</label>
											<label class="radio-inline alcoba">
												<input type="radio" class="formulario"name="alcoba" id="tres" value="3" >&nbsp;&nbsp;&nbsp; 3
											</label>
										</div>
										<div class="contenedor_tipo_apto">
											<label class="radio-inline" style="margin-left:-53px;">
												<input type="radio" name="tipo" class="formulario" id="simple" value="simple" >&nbsp;&nbsp;&nbsp;Sencillo
											</label>
											<label class="radio-inline" style="margin-left:-3px;width:10px;">
												<input type="radio" name="tipo" class="formulario" id="duplex" value="duplex">&nbsp;&nbsp;&nbsp;Dúplex
											</label>
										</div>
										<div class="separador"></div>
										<button type="button" class="btn btn-danger" id="restablecer">Restablecer</button>
									</form>
									<p id="piepagina">Para ver las plantas haz clic sobre el número del apartamento.</p>
								</div>
								<div class="parte_derecha" id="content_disponibilidad">
									<?php
										include('busqueda.php');
									?>

								</div>
							</div>
						</div>
						<div id="seccion_derecha">
							<div id="plantas" foto=""></div>

						</div>
					</div>
				</div>
			</div>	
			
			<div class="panel panel-default" id="part3">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapse3">3. Mira tu apartamento</a>
					</h4>
				</div>
				<div class="panel-collapse collapse contenido3">
					<div class="panel-body">
						<!-- SECCION 2 imagenes DE APARTAMENTO -->
						<div id="myCarousel">
							
							<!-- flecha izquierda -->
						    <span u="arrowleft" class="jssora03l" style="top: 123px; left: 8px; z-index:9;">
						    </span>
						    <!-- flecha derecha -->
						    <span u="arrowright" class="jssora03r" style="top: 123px; right: 8px; z-index:9;">
						    </span>
						</div>
						<button id="btn_paso4" class="btn btn-success">Siguiente</button>
					</div>
				</div>
			</div>
			<div class="panel panel-default" id="part4">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapse4">4. Cotiza tu apartamento</a>
					</h4>
				</div>
				<div class="panel-collapse collapse contenido4">
					<div class="panel-body">
						<!-- SECCION 3 cotizacion DE APARTAMENTO -->
						<div id="contenido_cotizacion">
							<?php
								include('info_cotizacion.php');
							?>

						</div>
						<div class="separador"></div>
						<div class="coti_footer">
							<div id="tiempo"></div>	
							<div class="separador"></div>
							<p class="advertencia">La presente cotización tiene una validez de 30 días calendario a partir de la fecha de presentación. Las imágenes presentadas son interpretaciones del artista. R + B Diseño Experimental se reserva el derecho de cambiar los precios presentados sin previo aviso.</p>
							<div class="content_btn">
								<button type="button" id="btn_imprimir" class="btn btn-info">Enviar</button>
							</div>
							<!-- <div class="separador"></div> -->
							<!-- <a href="http://www.rmasb.com/contacto.html" target="_blank"><p>¿Tienes dudas?</p></a> -->
							<!-- <div class="separador"></div>
							<a href="http://www.rmasb.com" target="_blank"><p>Conócenos</p></a> -->
							<div class="separador"></div>
												
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<button type="button" class="btn btn-default" id="salirCoti" style="display:none;">Salir de Cotización</button>
		<div id="pdf-content"></div>
	</div>

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="./libs/js/general.js"></script>
<script src="./libs/js/bootstrap.js"></script>
<script src="./libs/js/sweetalert.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		disponibilidad();
	});
	//script para la cotizacion 1024px tablet
	$("#tabletCoti").on("click",function(){
		coti1024();
	});
</script>
<!-- codigo para el buscador -->
<script type="text/javascript">
	$("#paso_dos").on("click",function(){
		verifica();
	});
	$('.formulario').change(function(){
		disponibilidad();
	});
	$("#restablecer").on("click",function(){
		//$("#filtro_busqueda").reset();
		$("#filtro_busqueda").each(function(){
			this.reset();
		});
		disponibilidad();
		ocultar();
	});
	
</script>	
<script type="text/javascript">
	$("#btn_imprimir").on("click",function(){
		
		var tiempo = $("#tiempo").html();

		var usuario = $("#input_correo").val();

		var NewId = $("#titulo_cotizacion").attr("llamar");
		$("#id_apto").val(NewId);
		// se asignan los campos del formulario con sus valores a la variable
		var datos_form = new FormData($("#registro_cotizacion")[0]);

		//estadistica(datos_form);
		// inicia la funcion ajax
		$.ajax({
		    // nombre del archivo php que recibe los datos enviados
		    url:"./libs/php/formulario.php",
		    cache:false,
		    type:"POST",
		    contentType:false,
		    data:datos_form,
		    processData:false,
		    // si todo va bien hace esto
		    success: function(datos){
		        // si la respuesta "datos" contiene algun valor hace esto
		        if(datos !== ''){
		        	//alert(datos);
		            // alertas amigables con bootstrap busque la libreria sweet-alert.js
		            //alert(datos);
		            swal({
		            	title: "¿Cotizar de nuevo?",
		            	text: "¿Desea cotizar otro apartamento?",
		            	type: "info",
		            	showCancelButton: true,
		            	confirmButtonColor: "#87B32E",
		            	confirmButtonText: "Cotizar de nuevo",
		            	cancelButtonColor: "#bbaaaa",
		            	cancelButtonText: "No, gracias"
		            },
		            function(isConfirm){
		            	if (isConfirm) {
		            		$("#collapse3").removeClass("in");
		            		$(".contenido3").attr("id","");
		            		$(".contenido3").siblings(".panel-heading").removeClass("verde");
		            		$("#collapse4").removeClass("in");
		            		$(".contenido4").attr("id","");
		            		$(".contenido4").siblings(".panel-heading").removeClass("verde");
		            		pasoNumeroDos();

		            		setTimeout(function(){
		            			swal({
		            			  title: "",
		            			  text: "Gracias por cotizar su apartamento.\nSe ha enviado la cotización al correo registrado.",
		            			  type: "success",
		            			  confirmButtonText: "Aceptar",
		            			  confirmButtonColor: "#87B32E"
		            			});
		            		},400);
		            	}else{
		            		$('#registro_cotizacion').each (function(){
				              this.reset();
				            });
				            $("#collapse1").addClass("in");
				            $("#collapse2").removeClass("in");
				            $(".contenido2").attr("id","");
				            $(".contenido2").siblings(".panel-heading").removeClass("verde");
				            $("#collapse3").removeClass("in");
				            $(".contenido3").attr("id","");
				            $(".contenido3").siblings(".panel-heading").removeClass("verde");
				            $("#collapse4").removeClass("in");
				            $(".contenido4").attr("id","");
				            $(".contenido4").siblings(".panel-heading").removeClass("verde");

				            setTimeout(function(){
				            	swal({
				            	  title: "",
				            	  text: "Gracias por cotizar su apartamento.\nSe ha enviado la cotización al correo registrado.\nPor favor continue en nuestra siguiente sección, AVANCE DE OBRA.",
				            	  type: "success",
				            	  confirmButtonText: "Aceptar",
				            	  confirmButtonColor: "#87B32E"
				            	});
				            },400);
		            	}
			            
		            });


		            
		            //aca esta el codigo que crea el pdf
		            // $.ajax({
		            // 	url:"fpdf/tutorial/creapdf.php",
		            // 	cache:false,
		            // 	type:"GET",
		            // 	contentType:false,
		            // 	data:'tiempo='+tiempo,
		            // 	processData:false,
		            // });
		            //window.open('fpdf/tutorial/creapdf.php?info_cotizacion='+NewId);
		            var promoSelect = $(".promo-select").attr("prom"); 
		            $.ajax({
		                // nombre del archivo php que recibe los datos enviados
		                url:"./libs/pdf/fpdf/tutorial/creapdf.php",
		                cache:false,
		                type:"GET",
		                contentType:false,
		                data:'info_cotizacion='+NewId+'&tiempo='+tiempo+'&usuario='+usuario+'&promo='+promoSelect,
		                processData:false,
		            });
		            // funcion AJAX que envie la variable de la fecha actual al PHP del PDF
		            setTimeout(function(){
		            	$.ajax({
		            	    // nombre del archivo php que recibe los datos enviados
		            	    url:"./libs/pdf/PHPMailer-master/examples/mail.php",
		            	    cache:false,
		            	    type:"POST",
		            	    contentType:false,
		            	    data:datos_form,
		            	    processData:false,
		            	});    
		            },10000);
		            
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

	});
	$("#plantas").on("click",function(){
		pasoNumeroTres();
		zoom();
	});
	$("#metraje").change(function(){
		checkedForm();
	});
	$(".contenedor_eleccion_aptos > label > input").on("click",function(){
		checkedNumTipo();
	});
	$(".contenedor_tipo_apto > label > input").on("click",function(){
		checkedNumTipo();
	});
	//llama a la funcion que busque si el correo ya existe y recupere la información de la tabla 
	$("#input_correo").on("change",function(){
		var mail = $(this).val();
		reconoceCorreo(mail);
	});
</script>
<script type="text/javascript">
	var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
	
	var diasSemana = new Array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
	
	var f = new Date();
	//"Hoy " + diasSemana[f.getDay()] + ", " +
	document.getElementById("tiempo").innerHTML =  f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear();
</script>