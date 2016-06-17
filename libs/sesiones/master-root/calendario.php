<?php  
	require('../../php/conexion.php');

	//total de eventos
	$cant_eventos = mysql_query("SELECT * FROM calendario", $conexion);
	$total_eventos = mysql_num_rows($cant_eventos);
	//echo "total de eventos registrados: ".$total_eventos;
	$it = 0;
	$array_eventos = "";
	//separacion por evento
	//$eventos = mysql_query("SELECT * FROM calendario", $conexion);
	while ($evento = mysql_fetch_array($cant_eventos)) {
		if ($evento[4] === 'Pago') {
			if ($it == 0) {
				$array_eventos .="{id:". $evento[0] .",  title: '". $evento[1] ."', start: '". str_replace(" ", "T", $evento[2] ) ."', end: '". str_replace(" ", "T", $evento[3]) ."', backgroundColor: '#d9534f'}";
			}else{
				$array_eventos .= ",{id:". $evento[0] .",  title: '". $evento[1] ."', start: '". str_replace(" ", "T", $evento[2]) ."', end: '". str_replace(" ", "T", $evento[3]) ."', backgroundColor: '#d9534f'}";
			}
		}else if ($evento[4] === 'Entrega') {
			if ($it == 0) {
				$array_eventos .="{id:". $evento[0] .",  title: '". $evento[1] ."', start: '". str_replace(" ", "T", $evento[2] ) ."', end: '". str_replace(" ", "T", $evento[3]) ."', backgroundColor: '#337ab7'}";
			}else{
				$array_eventos .= ",{id:". $evento[0] .",  title: '". $evento[1] ."', start: '". str_replace(" ", "T", $evento[2]) ."', end: '". str_replace(" ", "T", $evento[3]) ."', backgroundColor: '#337ab7'}";
			}
		}else if ($evento[4] === 'Firma') {
			if ($it == 0) {
				$array_eventos .="{id:". $evento[0] .",  title: '". $evento[1] ."', start: '". str_replace(" ", "T", $evento[2] ) ."', end: '". str_replace(" ", "T", $evento[3]) ."', backgroundColor: '#5cb85c'}";
			}else{
				$array_eventos .= ",{id:". $evento[0] .",  title: '". $evento[1] ."', start: '". str_replace(" ", "T", $evento[2]) ."', end: '". str_replace(" ", "T", $evento[3]) ."', backgroundColor: '#5cb85c'}";
			}
		}
		$it++;
	}
	//echo $array_eventos;	
	
?>
<div id="SES_calendar"></div>

<script type="text/javascript">
	var eventos = new Array();
	$('#SES_calendar').fullCalendar({
		header: {
			left: 'prev,next today',
			center: '',
			right: 'title'
		},
		//defaultDate: '2016-05-12',
		selectable: true,
		selectHelper: true,
		
		dayClick: function(date, jsEvent, view) {
            var ini_evento = date.format();
            $("#modal").css("display","block");
            $("#modal").load("formulario_calendario_crea.php?start="+ini_evento);
            // $(".ing-cal").height(altopag);
            // $(".ing-cal").removeClass('hidden');
        },
        eventClick: function(calEvent, jsEvent, view){
        	var id = calEvent.id;
        	$("#modal").css("display","block");
            $("#modal").load("formulario_calendario_edita.php?id="+id);
        },
		editable: true,
		eventLimit: true, // allow "more" link when too many events
		events: [<?php echo $array_eventos;?>]
	});
</script>