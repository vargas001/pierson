<?php
session_start();
?>
<?php
include "../conexion.php";
$os = 'OS. '.$_POST['OS'];

if (isset($_FILES['imagen'])){
	
	$cantidad= count($_FILES['imagen']['tmp_name']);
	
	for ($i=0; $i<$cantidad; $i++){
	$tipoarchivo=$_FILES['imagen']['type'][$i];
	$nombrearchivo=$_FILES['imagen']['name'][$i];
	$tamanoarchivo=$_FILES['imagen']['size'][$i];
	$imagensub= fopen($_FILES['imagen']['tmp_name'][$i], 'r');
	$binarioimagen=fread($imagensub, $tamanoarchivo);
	$binarioimagen=mysqli_escape_string($conexion,$binarioimagen);

	$sql1=mysqli_query($conexion, "INSERT INTO imagenes (nombre,imagen,tipo_imagen,orden_servicio) VALUES ('$nombrearchivo','$binarioimagen','$tipoarchivo','$os')");
	}
}
	if ($sql1) {
	 	$_SESSION['success']="Registro de imagen";
		header("Location: nueva_venta.php");
	 }else{
	 	$_SESSION['error']="Error";	
		header("Location: nueva_venta.php");
	 }
?>