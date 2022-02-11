<?php
include "../conexion.php";

// Mostrar Datos

if (empty($_REQUEST['orden_servicio'])) {
  $_SESSION['error']="Error empty"; 
  header("Location: lista_unidades.php");
}
$orden_OS = $_REQUEST['orden_servicio'];
$sql = mysqli_query($conexion, "SELECT * FROM registro_unidad WHERE orden_servicio = '$orden_OS'");
$result_sql = mysqli_num_rows($sql);
if ($result_sql == 0) {
  header("Location: lista_unidades.php");
  $_SESSION['error']="Error Result SQL"; 
} else {
  while ($data = mysqli_fetch_array($sql)) {
    $seg_part = $data['seguro_particular'];
  }
}
$sql2 = mysqli_query($conexion, "SELECT * FROM valuacion WHERE orden_servicio = '$orden_OS'");
$result_sql2 = mysqli_num_rows($sql2);
if ($result_sql2 == 0) {
  header("Location: lista_unidades.php");
  $_SESSION['error']="Error Result SQL"; 
} else {
  while ($data3 = mysqli_fetch_array($sql2)) {
    $fecha_autori = $data3['fecha_autori'];
    $fecha_promesa = $data3['fecha_promesa'];
    $fecha_termino = $data3['fecha_termino'];
    $tip_val = $data3['tipo_valuacion'];
    $texto_c = $data3['text_compl'];
  }
}
$sql4 = mysqli_query($conexion, "SELECT * FROM taller WHERE orden_servicio = '$orden_OS'");
$result_sql4 = mysqli_num_rows($sql4);
if ($result_sql4 == 0) {
  header("Location: lista_unidades.php");
  $_SESSION['error']="Error Result SQL"; 
} else {
  while ($data4 = mysqli_fetch_array($sql4)) {
    if($data4['nom_meca'] == '') {
      $mecanico = "";
    }elseif ($data4['nom_meca'] == '1') {
      $mecanico = "Juan Morales";
    }elseif ($data4['nom_meca'] == '2') {
      $mecanico = "Rafael Escamilla";
    }elseif ($data4['nom_meca'] == '3') {
      $mecanico = "Javier Gonzalez";
    }elseif ($data4['nom_meca'] == '4') {
      $mecanico = "Enrique Ponce";
    }elseif ($data4['nom_meca'] == '5') {
      $mecanico = "Juan Omaña";
    }elseif ($data4['nom_meca'] == '6') {
      $mecanico = "Oscar Lopez";
    }elseif ($data4['nom_meca'] == '7') {
      $mecanico = "Salvador Vargas";
    }elseif ($data4['nom_meca'] == '8') {
      $mecanico = "Jose Lopez";
    }elseif ($data4['nom_meca'] == '9') {
      $mecanico = "";
    }elseif ($data4['nom_meca'] == '10') {
      $mecanico = "";
    }
    $tip_repa = $data4['tipo_repa'];
  }
}
$check = mysqli_query($conexion, "SELECT dano FROM danos_siniestro WHERE orden_servicio = '$orden_OS'");
$result_sql1 = mysqli_num_rows($check);
$i=0;
if ($result_sql1 == 0) {
  header("Location: lista_unidades.php");
  $_SESSION['error']="Error Result SQL"; 
} else {
  while ($data2 = mysqli_fetch_array($check, MYSQLI_ASSOC)) {
    $arr[$i]=$data2['dano'];
    $i++;
  }
  
  $d1 =in_array('defensa', $arr);
  if ($d1) {
    $c1 = "checked";
  }else{
    $c1 = "";
  }
  $d2 =in_array('cofre', $arr);
  if ($d2) {
    $c2 = "checked";
  }else{
    $c2 = "";
  }
  $d3 =in_array('cabina', $arr);
  if ($d3) {
    $c3 = "checked";
  }else{
    $c3 = "";
  }
  $d4 =in_array('dormitorio', $arr);
  if ($d4) {
    $c4 = "checked";
  }else{
    $c4 = "";
  }
  $d5 =in_array('radiador', $arr);
  if ($d5) {
    $c5 = "checked";
  }else{
    $c5 = "";
  }
  $d6 =in_array('escape', $arr);
  if ($d6) {
    $c6 = "checked";
  }else{
    $c6 = "";
  }
  $d7 =in_array('tanq_comb', $arr);
  if ($d7) {
    $c7 = "checked";
  }else{
    $c7 = "";
  }
  $d8 =in_array('va_chasis', $arr);
  if ($d8) {
    $c8 = "checked";
  }else{
    $c8 = "";
  }
  $d9 =in_array('eje_del', $arr);
  if ($d9) {
    $c9 = "checked";
  }else{
    $c9 = "";
  }
  $d10 =in_array('sus_del', $arr);
  if ($d10) {
    $c10 = "checked";
  }else{
    $c10 = "";
  }
  $d11 =in_array('motor', $arr);
  if ($d11) {
    $c11 = "checked";
  }else{
    $c11 = "";
  }
  $d12 =in_array('sis_direc', $arr);
  if ($d12) {
    $c12 = "checked";
  }else{
    $c12 = "";
  }
  $d13 =in_array('eje_tras', $arr);
  if ($d13) {
    $c13 = "checked";
  }else{
    $c13 = "";
  }
  $d14 =in_array('sus_tras', $arr);
  if ($d14) {
    $c14 = "checked";
  }else{
    $c14 = "";
  }
  $d15 =in_array('deflectores', $arr);
  if ($d15) {
    $c15 = "checked";
  }else{
    $c15 = "";
  }
  $d16 =in_array('quin_rued', $arr);
  if ($d16) {
    $c16 = "checked";
  }else{
    $c16 = "";
  }
}

?>
<?php include_once "includes/header.php"; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <div class="row">
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
    <div class="col-lg-6 m-auto">
      <?php echo isset($alert) ? $alert : ''; ?>
      <div class="form-group">
        <label for="os">Orden de Servicio</label>
        <input type="text" class="form-control" name="os" id="os" value="<?php echo $orden_OS; ?>" disabled>
      </div>
      <div class="form-group">
        <label for="fecha_autori">Fecha Autorizaci&oacute;n</label>
        <input type="date" class="form-control" id="fecha_autori" value="<?php echo $fecha_autori; ?>" disabled>
      </div>
      <div class="form-group">
        <label for="fecha_promesa">Fecha Promesa</label>
        <input type="date" class="form-control" id="fecha_promesa" value="<?php echo $fecha_promesa; ?>" disabled>
      </div>
      <div class="form-group">
        <label for="seg_part">Seguro/Particular</label>
        <input type="text" class="form-control" id="seg_part" value="<?php echo $seg_part; ?>" disabled>
      </div>
      <div class="form-group">
        <label for="fecha_termino">Fecha T&eacute;rmino</label>
        <input type="text" class="form-control" id="fecha_termino" value="<?php echo $fecha_termino; ?>" disabled>
      </div>
      <div class="form-group">
        <label for="tip_val">Tipo Valuaci&oacute;n</label>
        <input type="text" class="form-control" id="tip_val" value="<?php echo $tip_val; ?>" disabled>
      </div>
      <div class="form-group">
        <label for="tip_val">Mec&aacute;nico</label>
        <input type="text" class="form-control" id="nombre" value="<?php echo $mecanico; ?>" disabled>
      </div>
      <div class="form-group">
        <label for="mecanico">Tipo Reparaci&oacute;n</label>
        <input type="text" class="form-control" id="mecanico" value="<?php echo $tip_repa; ?>" disabled>
      </div>
      <div class="form-group">
        <label for="areas">&Aacute;reas Dañadas del Siniestro</label>
        <table style="width:100%">
          <tr>
            <th>
              <div class="form-group" id="div_registro_areas">
                <input type="checkbox" id="checkbox" value="defensa" name="checkbox[]" <?php echo $c1; ?> disabled> <label for="defensa">DEFENSA</label><br>
                <input type="checkbox" id="checkbox" value="cofre" name="checkbox[]" <?php echo $c2; ?> disabled> <label for="cofre">COFRE</label><br>
                <input type="checkbox" id="checkbox" value="cabina" name="checkbox[]" <?php echo $c3; ?> disabled> <label for="cabina">CABINA</label><br>
                <input type="checkbox" id="checkbox" value="dormitorio" name="checkbox[]" <?php echo $c4; ?> disabled> <label for="dormitorio">DORMITORIO</label>
              </div>
            </th>
            <th>
              <div class="form-group" id="div_registro_areas2">
                <input type="checkbox" id="checkbox" value="radiador" name="checkbox[]" <?php echo $c5; ?> disabled> <label for="radiador">RADIADOR</label><br>
                <input type="checkbox" id="checkbox" value="escape" name="checkbox[]" <?php echo $c6; ?> disabled> <label for="escape">SISTEMA DE ESCAPE</label><br>
                <input type="checkbox" id="checkbox" value="tanq_comb" name="checkbox[]" <?php echo $c7; ?> disabled> <label for="tanq_comb">TANQUE DE COMB.</label><br>
                <input type="checkbox" id="checkbox" value="va_chasis" name="checkbox[]" <?php echo $c8; ?> disabled> <label for="va_chasis">VARAS CHAS&Iacute;S</label>
              </div>
            </th>
            <th>
              <div class="form-group" id="div_registro_areas3">
                <input type="checkbox" id="checkbox" value="eje_del" name="checkbox[]"<?php echo $c9; ?> disabled> <label for="eje_del">EJES DELANTEROS</label><br>
                <input type="checkbox" id="checkbox" value="sus_del" name="checkbox[]" <?php echo $c10; ?> disabled> <label for="sus_del">SUSPENSI&Oacute;N DELANTERA</label><br>
                <input type="checkbox" id="checkbox" value="motor" name="checkbox[]" <?php echo $c11; ?> disabled> <label for="motor">MOTOR</label><br>
                <input type="checkbox" id="checkbox" value="sis_direc" name="checkbox[]" <?php echo $c12; ?> disabled> <label for="sis_direc">SIST. DE DIRRECC.</label>
              </div>
            </th>
            <th>
              <div class="form-group" id="div_registro_areas4">
                <input type="checkbox" id="checkbox" value="eje_tras" name="checkbox[]" <?php echo $c13; ?> disabled> <label for="eje_tras">EJES TRASEROS</label><br>
                <input type="checkbox" id="checkbox" value="sus_tras" name="checkbox[]" <?php echo $c14; ?> disabled> <label for="sus_tras">SUSPENSI&Oacute;N TRASERA</label><br>
                <input type="checkbox" id="checkbox" value="deflectores" name="checkbox[]" <?php echo $c15; ?> disabled> <label for="deflectores">DEFLECTORES</label><br>
                <input type="checkbox" id="checkbox" value="quin_rued" name="checkbox[]" <?php echo $c16; ?> disabled> <label for="quin_rued">QUINTA RUEDA</label>
              </div>
            </th>
          </tr>
        </table>
        <div class="row">

          <?php
          include "../conexion.php";
          $res = mysqli_query($conexion, "SELECT nombre, imagen FROM imagenes WHERE orden_servicio = '$orden_OS'");
          while ($data3 = mysqli_fetch_array($res,MYSQLI_ASSOC)) {
//echo '<img width="100" src="data:image/jpeg;base64,'.base64_encode( $data3['imagen'] ).'"/> ';
            ?>
            <div class="col-lg-4">
              <div class="form-group">
                <img width="250" height="250" src="data:<?php echo $data3['tipo']; ?>;base64,<?php echo  base64_encode($data3['imagen']); ?>">
              </div>
            </div>
            <?php 
          }
          ?> 
        </div>
        <div id="div_vercompl" style="display: none;">
          <h4 class="text-center">COMPLEMENTOS</h4>
        <div class="form-group">
        <div class="row">
          <?php
          include "../conexion.php";
          $res = mysqli_query($conexion, "SELECT nombre, imagen FROM complementos WHERE orden_servicio = '$orden_OS'");
          while ($data4 = mysqli_fetch_array($res,MYSQLI_ASSOC)) {
//echo '<img width="100" src="data:image/jpeg;base64,'.base64_encode( $data3['imagen'] ).'"/> ';
            ?>
            <div class="col-lg-4">
              <div class="form-group">
                <img width="250" height="250" src="data:<?php echo $data3['tipo']; ?>;base64,<?php echo  base64_encode($data4['imagen']); ?>">
              </div>
            </div>
            <?php 
          }
          ?> 
        </div>
        <textarea type="text" name="" class="form-control" id="" disabled><?php echo $texto_c; ?></textarea>
        
      </div>
      </div>

        <a href="#" class="btn btn-primary btn_compl"><i class="fas fa-plus"></i> Complementos</a>
        <a href="#" class="btn btn-primary btn_vercompl"><i class="fas fa-plus"></i> Ver Complementos</a>
      </div>
      <div id="div_compl" style="display: none;">
        <form action="accion_compl.php" method="post" name="form_new_os" id="form_new_os" enctype="multipart/form-data">
          <input type="text" class="form-control" name="os" id="os" value="<?php echo $orden_OS; ?>" readonly>
          <div class="form-group">
            <label for="image[]">Fotos(Complementos)</label><br>
            <input type="file" class="btn btn-primary btn_new_fotos" name="imagen[]" id="imagen[]" multiple accept="image/*">
          </div>
          <div class="form-group">
            <label for="tex_compl">Daños(Complementos)</label>
            <textarea type="text" placeholder="Ingrese Complementos" name="tex_compl" class="form-control" id="tex_compl"></textarea>
          </div>
      
        <h4 class="text-center"><button type="submit" class="btn btn-primary">Guardar</button></h4>
        </form>
      </div>
      </div>
    </div>
  </div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<?php include_once "includes/footer.php"; ?>