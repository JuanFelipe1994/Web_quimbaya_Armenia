<div class="parte_superior">
	<div class="contenedor_img">
		<div id="vista1">
			<img src="./libs/img/avance_de_obra/vista1_1.jpg" class="opa opa1">
			<!-- <img src="img/prueba_obra2.jpg" class="opa opa2">
			<img src="img/prueba_obra3.jpg" class="opa opa3"> -->
		</div>
		<div id="vista2">
			<img src="./libs/img/avance_de_obra/vista2_1.jpg" class="opa opa1">
			<!-- <img src="img/prueba_obra2.jpg" class="opa opa2">
			<img src="img/prueba_obra3.jpg" class="opa opa3"> -->
		</div>
		<div id="vista3">
			<img src="./libs/img/avance_de_obra/vista3_1.jpg" class="opa opa1">
			<!-- <img src="img/prueba_obra2.jpg" class="opa opa2">
			<img src="img/prueba_obra3.jpg" class="opa opa3"> -->
		</div>
	</div>
</div>
<div class="parte_inferior">
	<div class="vistas">
		<img  vista="vista1" class="vis1 viendovista1">
		<img  vista="vista2" class="vis2">
		<img  vista="vista3" class="vis3">
	</div>
</div>
<script src="./libs/js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(".vistas > img").on("click", function(){
		var vis = $(this).attr("vista");
		vistas(vis);
	});
</script>