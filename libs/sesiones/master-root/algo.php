<?php
// consulta de padres y madres registrados
$res_pad = registroCampo("rmb_residente r", "r.rmb_gen_id, COUNT(r.rmb_residente_hijo)", "WHERE r.rmb_residente_hijo = 1", "GROUP BY r.rmb_gen_id", "ORDER BY COUNT(r.rmb_residente_hijo) DESC");
// inicializamos las variables a utilizar en padres
$array_pad = "";
// si la consulta es correcta hace esto
if($res_pad){
    $sw = 0;
    // si se encuentran resultados hace esto
    if(mysql_num_rows($res_pad) > 0){
        // para cada registro encontrado se hace esto
        while($row_pad = mysql_fetch_array($res_pad)){
            // si el genero es uno (1) es hombre
            if($row_pad[0] == '1'){
                $tipo_pad = "Padres";
            }
            // si el genero es diferente a uno (1) es mujer
            else{
                $tipo_pad = "Madres";
            }
            // si es el primer registro (con valor mayor) hace esto
            if($sw == 0){
                $array_pad .= "{y:".$row_pad[1].",name:'".$tipo_pad."',color:'".$array_color[$sw]."',selected:true,sliced:true}";
            }
            // si es diferente al primer registro hace esto
            else{
                $array_pad .= ",{y:".$row_pad[1].",name:'".$tipo_pad."',color:'".$array_color[$sw]."'}";
            }
            // adiciona uno al contador
            $sw += 1;
        }
    }
}?>
<script>
// funcion que genera el grafico de mascotas por tipo de mascota
        function chartPadresMadres () {
            chart3 = new Highcharts.Chart({
                chart: {
                    renderTo: 'container3',
                    type: 'pie',
                    options3d: {
                        enabled: false,
                        alpha: 45,
                        beta: 0
                    },
                    backgroundColor: '#FFFFFF'
                },
                title: {
                    text: 'Número de madres y padres'
                },
                // tabla de descripcion de elementos
                legend: {
                    margin: 5,
                    align: 'center',
                    borderWidth: 1,
                    padding: 10
                }
                ,
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.y}</b>',
                    style: {
                        "fontSize": "10px"
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        depth: 35,
                        dataLabels: {
                            enabled: false,
                            format: '{point.name}'
                        }
                    }
                },
                series: [{
                    type: 'pie',
                    name: 'Total',
                    data: [<?php echo $array_pad;?>],
                    dataLabels: {
                        enabled: false,
                        format: '{point.name}: {point.y}'
                    },
                    showInLegend: true,
                    point: {
                        events: {
                            legendItemClick: function () {
                                return false;
                            }
                        }
                    }
                }]
            });
        }
</script>

