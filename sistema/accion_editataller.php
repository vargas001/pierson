<?php
session_start();
include "../conexion.php";

  if (empty($_POST['n_esta']) || empty($_POST['no_meca']) || empty($_POST['tipo_rep']) || empty($_POST['fecha_prom']) || empty($_POST['danos_repa'])) {
        $_SESSION['error']="Todo los campos son requeridos";
        header("Location: editar_taller.php");
  } else {
    $id = $_POST['id'];
    $os = $_POST['orden'];
    $n_esta = $_POST['n_esta'];
    $n_meca = $_POST['no_meca'];
    $tipo_repa = $_POST['tipo_rep'];
    $fecha_prom = $_POST['fecha_prom'];
    $dano_repa = $_POST['danos_repa'];
    
 
      $sql_update = mysqli_query($conexion, "UPDATE taller SET n_estacion='$n_esta', nom_meca='$n_meca',tipo_repa='$tipo_repa',danos_repa='$dano_repa' WHERE orden_servicio = '$os'");

      $sql_update2 = mysqli_query($conexion, "UPDATE valuacion SET fecha_promesa='$fecha_prom' where orden_servicio = '$os'");

      if ($sql_update AND $sql_update2) {
         $_SESSION['success']="Registro Modificado Correctamente";
        header("Location: lista_taller.php");
      } else {
        $_SESSION['error']="Error al Modificar Registro";
        header("Location: lista_taller.php");
    }
  }

?>