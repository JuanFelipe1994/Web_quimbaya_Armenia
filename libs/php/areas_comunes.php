<div id="miCarruselAreasComunes">
<!-- contenido de las imagenes del carrusel -->
  <div u="slides">
      <div><img u="image" src="./libs/img/areas_comunes/sotano1.jpg" /></div>
      <div><img u="image" src="./libs/img/areas_comunes/sotano2.jpg" /></div>
      <div><img u="image" src="./libs/img/areas_comunes/sotano3.jpg" /></div>
      <div><img u="image" src="./libs/img/areas_comunes/sotano4.jpg" /></div>
      <div><img u="image" src="./libs/img/areas_comunes/planta_golfito.jpg" /></div>
      <div><img u="image" src="./libs/img/areas_comunes/planta_cubierta.jpg" /></div>
      <div><img u="image" src="./libs/img/areas_comunes/areacomun3-min.jpg" /></div>
      <div><img u="image" src="./libs/img/areas_comunes/areacomun1-min.jpg" /></div>
      <div><img u="image" src="./libs/img/areas_comunes/areacomun2-min.jpg" /></div>
  </div>
  <!-- flecha izquierda -->
  <span u="arrowleft" class="jssora03l" style="top: 123px; left: 8px;">
  </span>
  <!-- flecha derecha -->
  <span u="arrowright" class="jssora03r" style="top: 123px; right: 8px;">
  </span>
</div>


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

        var jssor_slider1 = new $JssorSlider$("miCarruselAreasComunes", options);
    });
</script>