<?php
include "../conexion.php";
if (!empty($_POST)) {
  $alert = "";
  if (empty($_POST['fecha_promesa']) || empty($_POST['estatus']) || empty($_POST['tipo_val']) || empty($_POST['fecha_refa'])) {
        $_SESSION['error']="Todo los campos son requeridos";
        header("Location: editar_valuacion.php");
  } else {
    $id = $_POST['id'];
    $OS = $_POST['os'];
    $fec_pro = $_POST['fecha_promesa'];
    $esta = $_POST['estatus'];
    $tipo_v = $_POST['tipo_val'];
    $fec_ref = $_POST['fecha_refa'];
 
      $sql_update = mysqli_query($conexion, "UPDATE valuacion SET fecha_promesa = '$fec_pro' , estatus = '$esta', tipo_valuacion = '$tipo_v', fecha_refa = '$fec_ref' WHERE id = $id AND orden_servicio = '$oss'");

      if ($sql_update) {
         $_SESSION['success']="Registro Modificado Correctamente";
        header("Location: lista_valuacion.php");
      } else {
        $_SESSION['error']="Error al Modificar Registro";
        header("Location: lista_valuacion.php");
    }
  }
}
// Mostrar Datos

if (empty($_REQUEST['orden_servicio'])) {
  header("Location: lista_valuacion.php");
}
$os = $_REQUEST['orden_servicio'];
$sql = mysqli_query($conexion, "SELECT * FROM valuacion WHERE orden_servicio = '$os'");
$result_sql = mysqli_num_rows($sql);
if ($result_sql == 0) {
  header("Location: lista_valuacion.php");
} else {
  while ($data = mysqli_fetch_array($sql)) {
    $id = $data['id'];
    $oss = $data['orden_servicio'];
    $estatus = $data['estatus'];
    $fecha_auto = $data['fecha_autori'];
    $fecha_pro = $data['fecha_promesa'];
    $fecha_ter = $data['fecha_termino'];
    $tipo_val = $data['tipo_valuacion'];
    $fecha_refa = $data['fecha_refa'];
    $fecha_ent = $data['fecha_entrega'];
    $sel1 = "";
    $sel2 = "";
    $sel3 = "";
    $sel4 = "";
    $sel_vt1 = "";
    $sel_vt2 = "";
    if ($estatus == 'Proceso') {
      $sel1 = "selected";
    }elseif ($estatus == 'Terminado') {
      $sel2 = "selected";
    }elseif ($estatus == 'Entregado') {
      $sel3 = "selected";
    }elseif ($estatus == 'Espera Autorizacion') {
      $sel4 = "selected";
    }
    if ($tipo_val == 'Global') {
      $sel_vt1 = "selected";
    }elseif ($tipo_val == 'Normal') {
      $sel_vt2 = "selected";
    }
  }
}

$sql1 = mysqli_query($conexion, "SELECT * FROM registro_unidad WHERE orden_servicio = '$os'");
$result_sql1 = mysqli_num_rows($sql1);
if ($result_sql1 == 0) {
  header("Location: lista_valuacion.php");
} else {
  while ($data1 = mysqli_fetch_array($sql1)) {
    $sel_g = $data1['garantia'];
    $sel_gar1 = "";
    $sel_gar2 = "";
  if ($sel_g == 'Nuevo') {
      $sel_gar1 = "selected";
    }elseif ($sel_g == 'Garantia') {
      $sel_gar2 = "selected";
    }
  }
}

?>
<?php include_once "includes/header.php"; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <div class="row">
    <div class="col-lg-6 m-auto">
<h4 class="text-center">EDITAR REGISTRO</h4>
                <?php
                            if(isset($_SESSION['success'])){
                                ?>
                                <div class="alert alert-success fade in">
                                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                                    <strong>¡CORRECTO!</strong> <?php echo $_SESSION['success']; ?>
                                </div>
                                <?php
                            }
                            unset($_SESSION['success']);
                            if(isset($_SESSION['error'])){
                                ?>
                                <div class="alert alert-danger fade in">
                                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                                    <strong>¡ERROR!</strong> <?php echo $_SESSION['error']; ?>
                                </div>
                                <?php
                            }
                            unset($_SESSION['error']);
                            ?>
      <form class="" action="accion_editaval.php" method="post">
        <?php echo isset($alert) ? $alert : ''; ?>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="form-group">
          <label for="os">Orden Servicio</label>
          <input type="text" placeholder="" name="os" id="os" class="form-control" value="<?php echo $oss; ?>" readonly>
        </div>
        <div class="form-group">
          <label for="sel_gar">Garant&iacute;a</label>
          <select name="sel_gar" class="form-control" required>
            <option value="Nueva" <?php echo $sel_gar1; ?> >Nueva</option>
            <option value="Garantia" <?php echo $sel_gar2; ?> >Garant&iacute;a</option>
          </select>
        </div>
        <div class="form-group">
          <label for="fecha_autori">Fecha Autorizaci&oacute;n</label>
          <input type="date" placeholder="Ingrese Fecha de Autorizaci&oacute;n" name="fecha_autori" class="form-control" id="fecha_autori" value="<?php echo $fecha_auto; ?>">
        </div>
        <div class="form-group">
          <label for="fecha_refa">Fecha de Entrega de Refacciones</label>
          <input type="date" placeholder="Ingrese Fecha de Entrega de Refacciones" name="fecha_refa" class="form-control" id="fecha_refa" value="<?php echo $fecha_refa; ?>">
        </div>
        <div class="form-group">
          <label for="fecha_promesa">Fecha Promesa</label>
          <input type="date" placeholder="Ingrese Fecha Promesa" name="fecha_promesa" class="form-control" id="fecha_promesa" value="<?php echo $fecha_pro; ?>">
        </div>
        <div class="form-group">
          <label for="estatus">Estatus</label>
          <select name="estatus" class="form-control" required>
            <option value="">Seleccione...</option>
            <option value="Espera Autorizacion" <?php echo $sel4; ?> >En espera de Autorización</option>
            <option value="Proceso" <?php echo $sel1; ?> >Proceso</option>
            <option value="Terminado" <?php echo $sel2; ?> >Terminado</option>
            <option value="Entregado" <?php echo $sel3; ?> >Entregado</option>
          </select>
        </div>
        <div class="form-group">
          <label for="fecha_termino">Fecha T&eacute;rmino</label>
          <input type="date" placeholder="Ingrese Fecha Termino" name="fecha_termino" class="form-control" id="fecha_termino" value="<?php echo $fecha_ter; ?>">
        </div>
        <div class="form-group">
          <label for="fecha_entrega">Fecha Entrega</label>
          <input type="date" placeholder="Ingrese Fecha Entrega" name="fecha_entrega" class="form-control" id="fecha_entrega" value="<?php echo $fecha_ent; ?>">
        </div>
        <div class="form-group">
          <label for="tipo_val">Tipo de Valuaci&oacute;n</label>
          <select name="tipo_val" class="form-control" required>
            <option value="">Seleccione...</option>
            <option value="Global" <?php echo $sel_vt1; ?> >Global</option>
            <option value="Normal" <?php echo $sel_vt2; ?> >Normal</option>
         </select>
        </div>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Guardar</button>
      </form>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<?php include_once "includes/footer.php"; ?>