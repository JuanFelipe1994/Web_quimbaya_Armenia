<div id="cabecera_contacto">
	<h1>CONTÁCTENOS</h1>
	<p>Dirección: Cll 106 No 57-46 Piso 4 - Bogotá D.C. Colombia - Teléfono: (571) 7446168</p>
	<p>Correo electrónico: info@rmasb.com</p>
</div>
<form method="post" id="form_contacto">
	<input type="text" name="nombre" id="nombre_con"placeholder="Nombre *" required>
	<input type="mail" name="email" id="email_con" placeholder="Correo electrónico *" required>
	<div class="separador"></div>
	<input type="number" name="celular" placeholder="Teléfono Celular *" id="cel_con" required>
	<input type="number" name="fijo" placeholder="Teléfono Fijo">
	<div class="separador"></div>
	<textarea name="mensaje" placeholder="Escríbanos su mensaje. *" id="mensaje_con" required></textarea>
	<div class="separador"></div>
	<span id="aster">Los campos con asterísco ( * ) son obligatorios.</span>
	<div class="separador"></div>
	<input type="checkbox" name="terminos" id="acepto_terminos" required>
	<label id="txt_acepto_terminos">Acepto términos y condiciones de R + B Diseño Experimental SAS.</label>
	<button type="button" class="btn btn-default" id="enviar_contacto">Enviar</button>
	<button type="button" class="btn btn-default">Ver términos y condiciones</button>
</form>
	




<script type="text/javascript">
	$("#enviar_contacto").on("click",function(){
		var nombre = $("#nombre_con").val();
		var letrasNombre = nombre.length;

		var email = $("#email_con").val();
		var signo = /@/;
		var verificaEmail = email.match(signo);


		var celular = $("#cel_con").val();
		var numerosCelular = celular.length;

		var mensaje = $("#mensaje_con").val();
		var terminos = $("#acepto_terminos").is(':checked');

		Contactanos(nombre, letrasNombre, email, verificaEmail, celular, numerosCelular, mensaje, terminos);
	});
</script>