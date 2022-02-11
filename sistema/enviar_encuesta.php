<?php
session_start();
date_default_timezone_set('America/Mexico_City');
include "../conexion.php";
	if (empty($_POST['orden']) || empty($_POST['pregunta1']) || empty($_POST['pregunta2']) || empty($_POST['pregunta3']) || empty($_POST['pregunta4']) || empty($_POST['pregunta5'])) {
		$_SESSION['error']="Todos los campos son requeridos";
	} else {
		$os= $_POST['orden'];
		$pregunta1 = $_POST['pregunta1'];
		$pregunta2 = $_POST['pregunta2'];
		$pregunta3 = $_POST['pregunta3'];
		$pregunta4 = $_POST['pregunta4'];
		$pregunta5 = $_POST['pregunta5'];
		$comentarios = $_POST['comentarios'];
		$fecha_ent = date("Y-m-d");

		$sql1=mysqli_query($conexion, "INSERT INTO encuesta (orden_servicio,preg_1,preg_2,preg_3,preg_4,preg_5,comentarios) VALUES ('$os',$pregunta1,$pregunta2,$pregunta3,$pregunta4,$pregunta5,'$comentarios')");
		$sql2 = mysqli_query($conexion, "UPDATE valuacion SET fecha_entrega='$fecha_ent' WHERE orden_servicio = '$os'");
		
		if ($sql1 and $sql2) {
			$_SESSION['success']="Registro de Unidad Exitosamente";
			header("Location: lista_unidades.php");
		} else {
			$_SESSION['error']="Error al Registro de Unidad";	
			header("Location: lista_unidades.php");
		}
	}
?>