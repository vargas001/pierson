<?php
session_start();
include "../conexion.php";

  if (empty($_POST['os']) || empty($_POST['fecha_ingreso']) || empty($_POST['seg_part']) || empty($_POST['nom_con']) || empty($_POST['num_con']) || empty($_POST['cor_con']) || empty($_POST['estatus']) || empty($_POST['fecha_autori']) || empty($_POST['fecha_promesa']) || empty($_POST['fecha_termino']) || empty($_POST['tipo_val']) || empty($_POST['fecha_refa']) || empty($_POST['n_esta']) || empty($_POST['no_meca']) || empty($_POST['tipo_rep']) || empty($_POST['danos_repa']) || empty($_POST['sel_gar'])) {
        $_SESSION['error']="Todo los campos son requeridos";
        header("Location: editar_orden.php");
   } else {
$id_reg = $_POST['id_reg'];
$id_val = $_POST['id_val'];
$id_tal = $_POST['id_tal'];
$os = $_POST['os'];
$sel_gar = $_POST['sel_gar'];
$fecha_ingreso = $_POST['fecha_ingreso'];
$seg_part = $_POST['seg_part'];
$nom_con = $_POST['nom_con'];
$num_con = $_POST['num_con'];
$cor_con = $_POST['cor_con'];

$estatus = $_POST['estatus'];
$fecha_autori = $_POST['fecha_autori'];
$fecha_promesa = $_POST['fecha_promesa'];
$fecha_termino = $_POST['fecha_termino'];
$tipo_val = $_POST['tipo_val'];
$fecha_refa = $_POST['fecha_refa'];

$n_esta = $_POST['n_esta'];
$no_meca = $_POST['no_meca'];
$tipo_rep = $_POST['tipo_rep'];
$danos_repa = $_POST['danos_repa'];

      $sql_del = mysqli_query($conexion, "DELETE FROM danos_siniestro WHERE orden_servicio = '$os'");

      $sql_reg = mysqli_query($conexion, "UPDATE registro_unidad SET orden_servicio='$os',garantia='$sel_gar',fecha='$fecha_ingreso',seguro_particular='$seg_part',nombre_cont='$nom_con',numero_cont='$num_con',correo_cont='$cor_con' WHERE id = $id_reg");

      if ($_POST['checkbox'] != "") {
        if (is_array($_POST['checkbox'])) {
          while (list($key, $value) = each($_POST['checkbox'])) {
            $sql_dan=mysqli_query($conexion, "INSERT INTO danos_siniestro (orden_servicio,dano) VALUES ('$os' , '$value')");
          }
        }
      }

      $sql_val = mysqli_query($conexion, "UPDATE valuacion SET orden_servicio='$os',estatus='$estatus',fecha_autori='$fecha_autori',fecha_promesa='$fecha_promesa',fecha_termino='$fecha_termino',tipo_valuacion='$tipo_val',fecha_refa='$fecha_refa' WHERE id = $id_val");

      $sql_tal = mysqli_query($conexion, "UPDATE taller SET orden_servicio='$os',n_estacion='$n_esta',nom_meca='$no_meca',tipo_repa='$tipo_rep',danos_repa='$danos_repa' WHERE id = $id_tal");

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


      if ($sql_reg AND $sql_val AND $sql_tal AND $sql_dan AND $sql3) {
         $_SESSION['success']="Registro Modificado Correctamente";
            header("Location: lista_unidades.php");
      } else {
        $_SESSION['error']="Error al Modificar Registro";
        header("Location: lista_unidades.php");
    }
  }

?>