<?php
session_start();
?>
<?php
include "../conexion.php";
date_default_timezone_set('America/Mexico_City');
if (!empty($_POST)) {
	$alert = "";
	if (empty($_POST['nom_cliente']) || empty($_POST['tel_cliente']) || empty($_POST['cor_cliente']) || empty($_POST['seg_part']) || empty($_POST['OS']) || empty($_POST['sel_gar'])) {
		$_SESSION['error']="Todos los campos son requeridos";
	} else {
		$nombre= $_POST['nom_cliente'];
		$telefono = $_POST['tel_cliente'];
		$correo = $_POST['cor_cliente'];
		$os = 'OS. '.$_POST['OS'];
		$sel_gar = $_POST['sel_gar'];
		$seg_par = $_POST['seg_part'];
		$fecha = date("Y-m-d");
		$usureg = $_SESSION['nombre'];
		$res = mysqli_query($conexion, "SELECT * FROM registro_unidad where orden_servicio = '$os'");
		
		if(mysqli_num_rows($res)==0){
			$sql1=mysqli_query($conexion, "INSERT INTO registro_unidad (orden_servicio,garantia,fecha,seguro_particular,nombre_cont,numero_cont,correo_cont,registro) VALUES ('$os','$sel_gar', '$fecha','$seg_par','$nombre','$telefono','$correo','$usureg')"); 
			$sqlval=mysqli_query($conexion, "INSERT INTO valuacion (orden_servicio) VALUES ('$os')");
			$sqlval=mysqli_query($conexion, "INSERT INTO taller (orden_servicio) VALUES ('$os')");
			if ($_POST['checkbox'] != "") {
				if (is_array($_POST['checkbox'])) {
					while (list($key, $value) = each($_POST['checkbox'])) {
						$sql2=mysqli_query($conexion, "INSERT INTO danos_siniestro (orden_servicio,dano) VALUES ('$os' , '$value')");
					}
				}
			}
			if (isset($_FILES['imagen'])){

				$cantidad= count($_FILES['imagen']['tmp_name']);

				for ($i=0; $i<$cantidad; $i++){
					$tipoarchivo=$_FILES['imagen']['type'][$i];
					$nombrearchivo=$_FILES['imagen']['name'][$i];
					$tamanoarchivo=$_FILES['imagen']['size'][$i];
					$imagensub= fopen($_FILES['imagen']['tmp_name'][$i], 'r');
					$binarioimagen=fread($imagensub, $tamanoarchivo);
					$binarioimagen=mysqli_escape_string($conexion,$binarioimagen);

					$carpeta_des=$_SERVER['DOCUMENT_ROOT'].'imagenes_os/'.'$os'.'/';
					$archivo=$_FILES['imagen']['tmp_name'][$i];
					$subir=move_uploaded_file($archivo,$carpeta_des.$nombrearchivo);

					$sql3=mysqli_query($conexion, "INSERT INTO imagenes (nombre,imagen,tipo_imagen,orden_servicio) VALUES ('$nombrearchivo','$binarioimagen','$tipoarchivo','$os')");
				}
			}
			if ($sql1 and $sql2 and $sql3) {
				$_SESSION['success']="Registro de Unidad Exitosamente";
				header("Location: nueva_orden.php");
			} else {
				$_SESSION['error']="Error al Registro de Unidad";	
				header("Location: nueva_orden.php");
			}
		}else{
			$_SESSION['error']="Orden de servicio ya existente";
			header("Location: nueva_orden.php");
		}
	}
}
?>