<?php include_once "includes/header.php";
include "../conexion.php";
//Grafica 1 para "estatus de ingreso y salidas"-----------------------------------------------------------------
$total=0;
$total2=0;
$total3=0;
$no_c=0;
$nr=0;
$suma_e=0;
$sum_prom=0;
$sql = mysqli_query($conexion, "SELECT count(*) FROM valuacion");
$result_sql = mysqli_num_rows($sql);
if ($result_sql == 0) {
	header("Location: index.php");
} else {
	while ($re = mysqli_fetch_array($sql)) {
		$ingreso = $re['count(*)'];
	}
}
$sql1 = mysqli_query($conexion, "SELECT count(*) FROM valuacion where estatus ='Entregado'");
$result_sql1 = mysqli_num_rows($sql1);
if ($result_sql1 == 0) {
	header("Location: index.php");
} else {
	while ($re1 = mysqli_fetch_array($sql1)) {
		$entre = $re1['count(*)'];
	}
}
//Grafica 2 para promedio de Dias Promesa-----------------------------------------------------------------
$sql2 = mysqli_query($conexion, "SELECT * FROM valuacion");
$result_sql2 = mysqli_num_rows($sql2);
if ($result_sql2 == 0) {
	header("Location: lista_unidades.php");
	$_SESSION['error']="Error Result SQL"; 
} else {
	while ($data = mysqli_fetch_array($sql2)) {
		$fechaA = $data['fecha_autori'];
		$fechaP = $data['fecha_promesa'];

		$startTimeStamp = strtotime("$fechaA");
		$endTimeStamp = strtotime("$fechaP");

		$timeDiff = abs($endTimeStamp - $startTimeStamp);
		$numberDays = $timeDiff/86400;

		$total = $total + $numberDays;
	}
}
$prom_pro = $total / $ingreso;
//Grafica 2 para promedio de Dias Real-----------------------------------------------------------------
$sql3 = mysqli_query($conexion, "SELECT * FROM valuacion where estatus ='Entregado'");
$result_sql3 = mysqli_num_rows($sql3);
if ($result_sql3 == 0) {
	header("Location: lista_unidades.php");
	$_SESSION['error']="Error Result SQL"; 
} else {
	while ($data1 = mysqli_fetch_array($sql3)) {
		$fechaA = $data1['fecha_autori'];
		$fechaT = $data1['fecha_termino'];

		$startTimeStamp2 = strtotime("$fechaA");
		$endTimeStamp2 = strtotime("$fechaT");

		$timeDiff2 = abs($endTimeStamp2 - $startTimeStamp2);
		$numberDays2 = $timeDiff2/86400;

		$total2 = $total2 + $numberDays2;
	}
}
$prom_real = $total2 / $entre;
//Grafica 3 para "UNIDADES EN PROCESO"-----------------------------------------------------------------
$sql4 = mysqli_query($conexion, "SELECT count(*) FROM valuacion where estatus ='Proceso'");
$result_sql4 = mysqli_num_rows($sql4);
if ($result_sql4 == 0) {
	header("Location: index.php");
} else {
	while ($re2 = mysqli_fetch_array($sql4)) {
		$proces = $re2['count(*)'];
	}
}
//Grafica 4 para "Porcentaje cumplido"-----------------------------------------------------------------
$sql5 = mysqli_query($conexion, "SELECT * FROM valuacion where estatus ='Entregado'");
$result_sql5 = mysqli_num_rows($sql5);
if ($result_sql5 == 0) {
	header("Location: lista_unidades.php");
	$_SESSION['error']="Error Result SQL"; 
} else {
	while ($data2 = mysqli_fetch_array($sql5)) {
//Dias Promesa
		$fechaA = $data2['fecha_autori'];
		$fechaP = $data2['fecha_promesa'];
		$startTimeStamp = strtotime("$fechaA");
		$endTimeStamp = strtotime("$fechaP");
		$timeDiff = abs($endTimeStamp - $startTimeStamp);
		$numberDays = $timeDiff/86400;
//Dias Real
		$fechaA = $data2['fecha_autori'];
		$fechaT = $data2['fecha_termino'];
		$startTimeStamp2 = strtotime("$fechaA");
		$endTimeStamp2 = strtotime("$fechaT");
		$timeDiff2 = abs($endTimeStamp2 - $startTimeStamp2);
		$numberDays2 = $timeDiff2/86400;
		if ($numberDays2 > $numberDays) {
			$no_c = $no_c + 1;
		}
	}
}
$no_cum = $entre - $no_c;
$por_cu = ($no_cum * 100) / $entre;
$por_ncu = ($no_c * 100) / $entre;
//Grafica 5 "GARANTIAS"-----------------------------------------------------------------
$sql6 = mysqli_query($conexion, "SELECT count(*) FROM registro_unidad where garantia ='Garantia'");
$result_sql6 = mysqli_num_rows($sql6);
if ($result_sql6 == 0) {
	header("Location: index.php");
} else {
	while ($re3 = mysqli_fetch_array($sql6)) {
		$garan = $re3['count(*)'];
	}
}
//Grafica 5 para ""UNIDADES QUALITAS------------------------------------------
//Promedio Fechas Refacciones
$sql7 = mysqli_query($conexion, "SELECT * FROM valuacion where estatus ='Entregado'");
$result_sql7 = mysqli_num_rows($sql7);
if ($result_sql7 == 0) {
	header("Location: lista_unidades.php");
	$_SESSION['error']="Error Result SQL"; 
} else {
	while ($data3 = mysqli_fetch_array($sql7)) {
		$fechaA = $data3['fecha_autori'];
		$fechaR = $data3['fecha_refa'];

		$startTimeStamp3 = strtotime("$fechaA");
		$endTimeStamp3 = strtotime("$fechaR");

		$timeDiff3 = abs($endTimeStamp3 - $startTimeStamp3);
		$numberDays3 = $timeDiff3/86400;
		$nr = $nr + 1;

		$total3 = $total3 + $numberDays3;
	}
}
$prom_ref = $total3 / $nr;
//Total de Unidades Autorizadas
$sql8 = mysqli_query($conexion, "SELECT count(*) FROM valuacion where fecha_autori IS NOT NULL");
$result_sql8 = mysqli_num_rows($sql8);
if ($result_sql8 == 0) {
	header("Location: index.php");
} else {
	while ($re4 = mysqli_fetch_array($sql8)) {
		$autori = $re4['count(*)'];
	}
}
//Total de Unidades Terminadas
$sql9 = mysqli_query($conexion, "SELECT count(*) FROM valuacion where fecha_termino IS NOT NULL");
$result_sql9 = mysqli_num_rows($sql9);
if ($result_sql9 == 0) {
	header("Location: index.php");
} else {
	while ($re5 = mysqli_fetch_array($sql9)) {
		$termin = $re5['count(*)'];
	}
}
//Total de Unidades Entregadas
$sql10 = mysqli_query($conexion, "SELECT count(*) FROM valuacion where estatus = 'Entregado'");
$result_sql10 = mysqli_num_rows($sql10);
if ($result_sql10 == 0) {
	header("Location: index.php");
} else {
	while ($re6 = mysqli_fetch_array($sql10)) {
		$enterg = $re6['count(*)'];
	}
}
$sql11 = mysqli_query($conexion, "SELECT count(*) FROM valuacion WHERE text_compl IS NOT NULL AND text_compl != ''");
$result_sql11 = mysqli_num_rows($sql11);
if ($result_sql11 == 0) {
	header("Location: index.php");
} else {
	while ($re7 = mysqli_fetch_array($sql11)) {
		$compl = $re7['count(*)'];
	}
}
//Grafica 4 para "Porcentaje cumplido"-----------------------------------------------------------------
$sql12 = mysqli_query($conexion, "SELECT * FROM encuesta");
$result_sql12 = mysqli_num_rows($sql12);
if ($result_sql12 == 0) {
	header("Location: lista_unidades.php");
	$_SESSION['error']="Error Result SQL"; 
} else {
	while ($data7 = mysqli_fetch_array($sql12)) {
		$preg_1 = $data7['preg_1'];
		$preg_2 = $data7['preg_2'];
		$preg_3 = $data7['preg_3'];
		$preg_4 = $data7['preg_4'];
		$preg_5 = $data7['preg_5'];

		$prom_co = ($preg_1 + $preg_2 + $preg_3 + $preg_4 + $preg_5) / 5;
		$sum_prom = $sum_prom +$prom_co;
	}
	$prom_e = $sum_prom / $enterg;
}

?>
<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">GRÁFICAS</h1>
	</div>

	<!-- Content Row -->
	<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
	<div class="row">
		<div class="col-lg-4">
			<div class="form-group">
				<div id="graf_ingsal"></div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="form-group">
				<div id="graf_provsrea"></div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="form-group">
				<div id="graf_proc"></div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="form-group">
				<div id="graf_unicom"></div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="form-group">
				<div id="graf_porcum"></div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="form-group">
				<div id="graf_garan"></div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="form-group">
				<div id="graf_uniQua"></div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="form-group">
				<div id="graf_prome"></div>
			</div>
		</div>
	</div>
</div>
</div>

<script>
	var data = [
	{
		x: ['Ingresadas', 'Entregadas'],
		y: [<?php echo $ingreso; ?>,<?php echo $entre; ?> ],
		type: 'bar',
	}

	];
	var layout = {
		title: 'ESTATUS DE INGRESOS Y SALIDAS',
		barmode: 'stack',
		height: 500,
		bargap :3
	};

	var data1 = [
	{
		x: ['DIAS PROMESA', 'DIAS REAL'],
		y: [<?php echo $prom_pro; ?>,<?php echo $prom_real; ?> ],
		type: 'bar',
	}

	];
	var layout1 = {
		title: 'PROMEDIO FECHA PROMESA VS ENTREGA REAL',
		barmode: 'stack',
		height: 500,
		bargap :3
	};

	var data2 = [
	{
		x: ['UNIDADES'],
		y: [<?php echo $proces; ?>],
		type: 'bar',
	}

	];
	var layout2 = {
		title: 'UNIDADES EN PROCESO',
		height: 500,
		bargap : 2
	};

	var data3 = [{
  	values: [<?php echo $por_cu; ?>,<?php echo $por_ncu; ?>],
  	labels: ['Cumplido', 'No cumplido'],
  	type: 'pie'
	}];

	var layout3 = {
	title: 'Porcentaje Cumplido',
  	height: 500,
	};

	var data4 = [
	{
		x: ['UNIDADES'],
		y: [<?php echo $garan; ?>],
		type: 'bar',
	}

	];
	var layout4 = {
		title: 'UNIDADES CON GARANTÍA',
		height: 500,
		bargap : 2
	};
	
	var data5 = [{
	  values: [<?php echo $autori; ?>, <?php echo $termin; ?>,<?php echo $enterg; ?>,<?php echo $prom_ref; ?>],
	  labels: ['Autorizadas', 'Terminadas', 'Entregadas', 'Promedio Refacciones'],
	  domain: {column: 0},
	  name: 'Unidades Quálitas',
	  hoverinfo: 'label+value',
	  hole: .4,
	  type: 'pie'
	},];

	var layout5 = {
		title: 'UNIDADES QUÁLITAS',
		annotations: [
		{
		font: {
		 	  size: 40
		      },
		      showarrow: false,
		      text: 'UQ',
		      x: 0.5,
		      y: 0.5
		    }
		  ],
		  height: 500,
		  showlegend: false,
	};

var data6 = [
	{
		x: ['UNIDADES'],
		y: [<?php echo $compl; ?>],
		type: 'bar',
	}

	];
	var layout6 = {
		title: 'UNIDADES CON COMPLEMENTOS',
		height: 500,
		bargap : 2
	};

	var data7 = [
	{
		x: ['SATISFACCIÓN'],
		y: [<?php echo $prom_e; ?>],
		type: 'bar',
	}

	];
	var layout7 = {
		title: 'PROMEDIO SATISFACCIÓN CLIENTE',
		barmode: 'stack',
		height: 500,
		bargap :3
	};

	Plotly.newPlot('graf_ingsal', data,layout);
	Plotly.newPlot('graf_provsrea', data1,layout1);
	Plotly.newPlot('graf_proc', data2,layout2);
	Plotly.newPlot('graf_porcum', data3, layout3);
	Plotly.newPlot('graf_garan', data4,layout4);
	Plotly.newPlot('graf_uniQua', data5,layout5);
	Plotly.newPlot('graf_unicom', data6,layout6);
	Plotly.newPlot('graf_prome', data7,layout7);
</script>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<?php include_once "includes/footer.php"; ?>