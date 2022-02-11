<?php
session_start();
include "../conexion.php";

  if (empty($_POST['estatus']) || empty($_POST['tipo_val']) || empty($_POST['sel_gar']) || empty($_POST['os'])) {
        $_SESSION['error']="Todo los campos son requeridos";
        header("Location: editar_valuacion.php");
  } else {
    $id = $_POST['id'];
    $OS = $_POST['os'];
    $sel_gar = $_POST['sel_gar'];
    $fec_auto = $_POST['fecha_autori'];
    $fec_pro = $_POST['fecha_promesa'];
    $fec_ter = $_POST['fecha_termino'];
    $esta = $_POST['estatus'];
    $tipo_v = $_POST['tipo_val'];
    $fec_ref = $_POST['fecha_refa'];
    $fec_ent = $_POST['fecha_entrega'];
 
      $sql_update = mysqli_query($conexion, "UPDATE valuacion SET estatus='$esta',fecha_autori='$fec_auto',fecha_promesa='$fec_pro',fecha_termino='$fec_ter',fecha_entrega='$fec_ent',tipo_valuacion='$tipo_v',fecha_refa='$fec_ref' WHERE orden_servicio = '$OS'");
      $sql_update2=mysqli_query($conexion, "UPDATE registro_unidad SET garantia ='$sel_gar' WHERE orden_servicio = '$OS'");

      if ($sql_update and $sql_update2) {
         $_SESSION['success']="Registro Modificado Correctamente";
        header("Location: lista_valuacion.php");
      } else {
        $_SESSION['error']="Error al Modificar Registro";
        header("Location: lista_valuacion.php");
    }
  }

?>