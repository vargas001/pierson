<?php
include "../conexion.php";
// Mostrar Datos

if (empty($_REQUEST['orden_servicio'])) {
  header("Location: lista_taller.php");
}
$os = $_REQUEST['orden_servicio'];
$sql = mysqli_query($conexion, "SELECT * FROM taller WHERE orden_servicio = '$os'");
$result_sql = mysqli_num_rows($sql);
if ($result_sql == 0) {
  header("Location: lista_taller.php");
} else {
  while ($data = mysqli_fetch_array($sql)) {
    $id = $data['id'];
    $oss = $data['orden_servicio'];
    $n_estacion = $data['n_estacion'];
    $nom_meca = $data['nom_meca'];
    $tipo_repa = $data['tipo_repa'];
    $danos_repa = $data['danos_repa'];
    $n_est1="";
    $n_est2="";
    $n_est3="";
    $n_est4="";
    $n_est5="";
    $n_est6="";
    $n_est7="";
    $n_est8="";
    $n_est9="";
    $n_est10="";

    $nom_mec1="";
    $nom_mec2="";
    $nom_mec3="";
    $nom_mec4="";
    $nom_mec5="";
    $nom_mec6="";
    $nom_mec7="";
    $nom_mec8="";
    $nom_mec9="";
    $nom_mec10="";

    $tip_rep1 = "";
    $tip_rep2 = "";
    $tip_rep3 = "";

    if ($n_estacion == '1') {
      $n_est1 = "selected";
    }elseif ($n_estacion == '2') {
      $n_est2 = "selected";
    }elseif ($n_estacion == '3') {
      $n_est3 = "selected";
    }elseif ($n_estacion == '4') {
      $n_est4 = "selected";
    }elseif ($n_estacion == '5') {
      $n_est5 = "selected";
    }elseif ($n_estacion == '6') {
      $n_est6 = "selected";
    }elseif ($n_estacion == '7') {
      $n_est7 = "selected";
    }elseif ($n_estacion == '8') {
      $n_est8 = "selected";
    }elseif ($n_estacion == '9') {
      $n_est9 = "selected";
    }elseif ($n_estacion == '10') {
      $n_est10 = "selected";
    }

    if ($nom_meca == '1') {
      $nom_mec1 = "selected";
    }elseif ($nom_meca == '2') {
      $nom_mec2 = "selected";
    }elseif ($nom_meca == '3') {
      $nom_mec3 = "selected";
    }elseif ($nom_meca == '4') {
      $nom_mec4 = "selected";
    }elseif ($nom_meca == '5') {
      $nom_mec5 = "selected";
    }elseif ($nom_meca == '6') {
      $nom_mec6 = "selected";
    }elseif ($nom_meca == '7') {
      $nom_mec7 = "selected";
    }elseif ($nom_meca == '8') {
      $nom_mec8 = "selected";
    }elseif ($nom_meca == '9') {
      $nom_mec9 = "selected";
    }elseif ($nom_meca == '10') {
      $nom_mec10 = "selected";
    }

    if ($tipo_repa == 'Express') {
      $tip_rep1 = "selected";
    }elseif($tipo_repa == 'Mantenimiento') {
      $tip_rep2 = "selected";
    }elseif($tipo_repa == 'Normal') {
      $tip_rep3 = "selected";
    }
    $query2 = mysqli_query($conexion, "SELECT * FROM valuacion where orden_servicio = '$os'");
    $result2 = mysqli_num_rows($query2);
    if ($result2 > 0) {
      while ($data2 = mysqli_fetch_assoc($query2)) {
        $fecha_prom=$data2['fecha_promesa'];
      }
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
      <form class="" action="accion_editataller.php" method="post">
        <?php echo isset($alert) ? $alert : ''; ?>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="form-group">
          <label for="os">Orden Servicio</label>
          <input type="text" placeholder="" name="orden" id="orden" class="form-control" value="<?php echo $oss; ?>" readonly>
        </div>
        <div class="form-group">
          <label for="n_esta">N&uacute;mero de Estaci&oacute;n de Trabajo</label>
          <select name="n_esta" class="form-control" required>
            <option value="">Seleccione...</option>
            <option value="1" <?php echo $n_est1; ?> >1</option>
            <option value="2" <?php echo $n_est2; ?> >2</option>
            <option value="3" <?php echo $n_est3; ?> >3</option>
            <option value="4" <?php echo $n_est4; ?> >4</option>
            <option value="5" <?php echo $n_est5; ?> >5</option>
            <option value="6" <?php echo $n_est6; ?> >6</option>
            <option value="7" <?php echo $n_est7; ?> >7</option>
            <option value="8" <?php echo $n_est8; ?> >8</option>
            <option value="9" <?php echo $n_est9; ?> >9</option>
            <option value="10" <?php echo $n_est10; ?> >10</option>
          </select>
        </div>
        <div class="form-group">
          <label for="no_meca">Nombre Mec&aacute;nico</label>
          <select name="no_meca" class="form-control" required>
            <option value="">Seleccione...</option>
            <option value="1" <?php echo $nom_mec1; ?> >Juan Morales</option>
            <option value="2" <?php echo $nom_mec2; ?> >Rafael Escamilla</option>
            <option value="3" <?php echo $nom_mec3; ?> >Javier Gonzalez</option>
            <option value="4" <?php echo $nom_mec4; ?> >Enrique Ponce</option>
            <option value="5" <?php echo $nom_mec5; ?> >Juan Omaña</option>
            <option value="6" <?php echo $nom_mec6; ?> >Oscar Lopez</option>
            <option value="7" <?php echo $nom_mec7; ?> >Salvador Vargas</option>
            <option value="8" <?php echo $nom_mec8; ?> >Jose Lopez</option>
            <option value="9" <?php echo $nom_mec9; ?> ></option>
            <option value="10" <?php echo $nom_mec10; ?> ></option>
          </select>
        </div>
        <div class="form-group">
          <label for="tipo_rep">Tipo Reparaci&oacute;n</label>
          <select name="tipo_rep" class="form-control" required>
            <option value="">Seleccione...</option>
            <option value="Express" <?php echo $tip_rep1; ?> >Express</option>
            <option value="Mantenimiento" <?php echo $tip_rep2; ?> >Mantenimiento</option>
            <option value="Normal" <?php echo $tip_rep3; ?> >Normal</option>
          </select>
        </div>
        <div class="form-group">
          <label for="fecha_prom">Fecha Promesa</label>
          <input type="date" placeholder="Ingrese Fecha Promesa" name="fecha_prom" class="form-control" id="fecha_prom" value="<?php echo $fecha_prom; ?>"readonly>
        </div>
        <div class="form-group">
          <label for="danos_repa">Daños a Reparar</label>
          <textarea type="text" placeholder="Ingrese Daños a Reparar" name="danos_repa" class="form-control" id="danos_repa"><?php echo $danos_repa; ?></textarea>
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