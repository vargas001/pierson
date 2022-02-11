<?php
session_start();
?>
<?php
include "../conexion.php";
		$os = $_POST['os'];
		$tex_compl = $_POST['tex_compl'];
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

					$sql1=mysqli_query($conexion, "INSERT INTO complementos (nombre,imagen,tipo_imagen,orden_servicio) VALUES ('$nombrearchivo','$binarioimagen','$tipoarchivo','$os')");
				}
			}
				$sql2=mysqli_query($conexion, "UPDATE valuacion SET text_compl ='$tex_compl' WHERE orden_servicio = '$os'");
			if ($sql1 AND $sql2) {
				$_SESSION['success']="Complementos Guardados Exitosamente";
				header("Location: lista_unidades.php");
			} else {
				$_SESSION['error']="Error al Guardar complementos";	
				header("Location: lista_unidades.php");
			}
		
	

?>