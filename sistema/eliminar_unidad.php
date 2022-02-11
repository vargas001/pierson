<?php
session_start();
if (!empty($_GET['id'])) {
    require("../conexion.php");
    $id = $_GET['id'];
    $query_delete = mysqli_query($conexion, "DELETE FROM registro_unidad WHERE id = $id");
    mysqli_close($conexion);
    $_SESSION['success']="Registro Eliminado Correctamente";
    header("location: lista_unidades.php");
}
?>