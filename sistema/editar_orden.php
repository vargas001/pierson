<?php
include "../conexion.php";
// Mostrar Datos

if (empty($_REQUEST['orden_servicio'])) {
  header("Location: lista_unidades.php");
}
$os = $_REQUEST['orden_servicio'];

$sql = mysqli_query($conexion, "SELECT * FROM registro_unidad WHERE orden_servicio = '$os'");
$result_sql = mysqli_num_rows($sql);
if ($result_sql == 0) {
  header("Location: lista_unidades.php");
} else {

  $sop1="";
  $sop2="";
  $sop3="";
  $sop4="";
  $sop5="";
  $sop6="";
  $sop7="";
  $sop8="";
  $sop9="";

  $sel_gar1="";
  $sel_gar2="";
  while ($data = mysqli_fetch_array($sql)) {
    $id_reg = $data['id'];
    $sel_gar = $data['garantia'];

    if ($sel_gar == 'Nueva') {
      $sel_gar1 = "selected";
    }elseif ($sel_gar == 'Garantia') {
      $sel_gar2 = "selected";
    }

    $fecha_ing = $data['fecha'];
    $seg_par = $data['seguro_particular'];

    if ($seg_par == 'Qualitas') {
      $sop1 = "selected";
    }elseif ($seg_par == 'Banorte') {
      $sop2 = "selected";
    }elseif ($seg_par == 'Afirme') {
      $sop3 = "selected";
    }elseif ($seg_par == 'General de Seguros') {
      $sop4 = "selected";
    }elseif ($seg_par == 'Map-Fre') {
      $sop5 = "selected";
    }elseif ($seg_par == 'ADI') {
      $sop6 = "selected";
    }elseif ($seg_par == 'Inbursa') {
      $sop7 = "selected";
    }elseif ($seg_par == 'SURA') {
      $sop8 = "selected";
    }elseif ($seg_par == 'Particular') {
      $sop9 = "selected";
    }
    $nom_con = $data['nombre_cont'];
    $num_con = $data['numero_cont'];
    $cor_con = $data['correo_cont'];
  }
}

$sql2 = mysqli_query($conexion, "SELECT dano FROM danos_siniestro WHERE orden_servicio = '$os'");
$result_sql2 = mysqli_num_rows($sql2);
$i=0;
if ($result_sql2 == 0) {
  header("Location: lista_unidades.php");
  $_SESSION['error']="Error Result SQL"; 
} else {
  while ($data2 = mysqli_fetch_array($sql2, MYSQLI_ASSOC)) {
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

$sql3 = mysqli_query($conexion, "SELECT * FROM valuacion WHERE orden_servicio = '$os'");
$result_sql3 = mysqli_num_rows($sql3);
if ($result_sql3 == 0) {
  header("Location: lista_unidades.php");
} else {
  while ($data3 = mysqli_fetch_array($sql3)) {
    $id_val = $data3['id'];
    $estatus = $data3['estatus'];
    $fecha_auto = $data3['fecha_autori'];
    $fecha_pro = $data3['fecha_promesa'];
    $fecha_ter = $data3['fecha_termino'];
    $tipo_val = $data3['tipo_valuacion'];
    $fecha_refa = $data3['fecha_refa'];
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
$sql4 = mysqli_query($conexion, "SELECT * FROM taller WHERE orden_servicio = '$os'");
$result_sql4 = mysqli_num_rows($sql4);
if ($result_sql4 == 0) {
  header("Location: lista_unidades.php");
} else {
  while ($data4 = mysqli_fetch_array($sql4)) {
    $id_tal = $data4['id'];
    $oss = $data4['orden_servicio'];
    $n_estacion = $data4['n_estacion'];
    $nom_meca = $data4['nom_meca'];
    $tipo_repa = $data4['tipo_repa'];
    $danos_repa = $data4['danos_repa'];
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
  }
}
?>
<?php include_once "includes/header.php"; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <div class="row">
    <div class="col-lg-6 m-auto">
      <h4 class="text-center">EDITAR ORDEN</h4>
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
      <form class="" action="accion_editaorden.php" method="post" enctype="multipart/form-data">
        <?php echo isset($alert) ? $alert : ''; ?>
        <input type="hidden" name="id_reg" value="<?php echo $id_reg; ?>">
        <input type="hidden" name="id_val" value="<?php echo $id_val; ?>">
        <input type="hidden" name="id_tal" value="<?php echo $id_tal; ?>">
        <div class="form-group">
          <label for="os">Orden Servicio</label>
          <input type="text" placeholder="" name="os" id="os" class="form-control" value="<?php echo $os; ?>" required>
        </div>
        <div class="form-group">
          <label for="sel_gar">Garant&iacute;a</label>
          <select name="sel_gar" class="form-control" required>
            <option value="Nueva" <?php echo $sel_gar1; ?> >Nueva</option>
            <option value="Garantia" <?php echo $sel_gar2; ?> >Garant&iacute;a</option>
          </select>
        </div>
        <div class="form-group">
          <label for="fecha_ingreso">Fecha Ingreso</label>
          <input type="date" placeholder="Ingrese Fecha Ingreso" name="fecha_ingreso" class="form-control" id="fecha_ingreso" value="<?php echo $fecha_ing; ?>" required>
        </div>
        <div class="form-group">
          <label for="seg_part">Seguro/Particular</label>
          <select name="seg_part" class="form-control" required>
            <option value="">Seleccione...</option>
            <option value="Qualitas" <?php echo $sop1; ?>>Qu&aacute;litas</option>
            <option value="Banorte" <?php echo $sop2; ?>>Banorte</option>
            <option value="Afirme" <?php echo $sop3; ?>>Afirme</option>
            <option value="General de Seguros" <?php echo $sop4; ?>>General de Seguros</option>
            <option value="Map-Fre" <?php echo $sop5; ?>>Map-Fre</option>
            <option value="ADI" <?php echo $sop6; ?>>ADI</option>
            <option value="Inbursa" <?php echo $sop7; ?>>Inbursa</option>
            <option value="SURA" <?php echo $sop8; ?>>SURA</option>
            <option value="Particular" <?php echo $sop9; ?>>Particular</option>
          </select>
        </div>
        <div class="form-group">
          <label for="nom_con">Nombre Contacto</label>
          <input type="text" placeholder="" name="nom_con" id="nom_con" class="form-control" value="<?php echo $nom_con; ?>" required>
        </div>
        <div class="form-group">
          <label for="num_con">N&uacute;mero Contacto</label>
          <input type="text" placeholder="" name="num_con" id="num_con" class="form-control" value="<?php echo $num_con; ?>" required>
        </div>
        <div class="form-group">
          <label for="cor_con">Correo Contacto</label>
          <input type="text" placeholder="" name="cor_con" id="cor_con" class="form-control" value="<?php echo $cor_con; ?>" required>
        </div>
        <div class="form-group">
        <label for="dni">&Aacute;reas Dañadas del Siniestro</label>
        <table style="width:100%">
          <tr>
            <th>
              <div class="form-group" id="div_registro_areas">
                <input type="checkbox" id="checkbox" value="defensa" name="checkbox[]" <?php echo $c1; ?> > <label for="defensa">DEFENSA</label><br>
                <input type="checkbox" id="checkbox" value="cofre" name="checkbox[]" <?php echo $c2; ?> > <label for="cofre">COFRE</label><br>
                <input type="checkbox" id="checkbox" value="cabina" name="checkbox[]" <?php echo $c3; ?> > <label for="cabina">CABINA</label><br>
                <input type="checkbox" id="checkbox" value="dormitorio" name="checkbox[]" <?php echo $c4; ?> > <label for="dormitorio">DORMITORIO</label>
              </div>
            </th>
            <th>
              <div class="form-group" id="div_registro_areas2">
                <input type="checkbox" id="checkbox" value="radiador" name="checkbox[]" <?php echo $c5; ?> > <label for="radiador">RADIADOR</label><br>
                <input type="checkbox" id="checkbox" value="escape" name="checkbox[]" <?php echo $c6; ?> > <label for="escape">SISTEMA DE ESCAPE</label><br>
                <input type="checkbox" id="checkbox" value="tanq_comb" name="checkbox[]" <?php echo $c7; ?> > <label for="tanq_comb">TANQUE DE COMB.</label><br>
                <input type="checkbox" id="checkbox" value="va_chasis" name="checkbox[]" <?php echo $c8; ?> > <label for="va_chasis">VARAS CHAS&Iacute;S</label>
              </div>
            </th>
            <th>
              <div class="form-group" id="div_registro_areas3">
                <input type="checkbox" id="checkbox" value="eje_del" name="checkbox[]"<?php echo $c9; ?> > <label for="eje_del">EJES DELANTEROS</label><br>
                <input type="checkbox" id="checkbox" value="sus_del" name="checkbox[]" <?php echo $c10; ?> > <label for="sus_del">SUSPENSI&Oacute;N DELANTERA</label><br>
                <input type="checkbox" id="checkbox" value="motor" name="checkbox[]" <?php echo $c11; ?> > <label for="motor">MOTOR</label><br>
                <input type="checkbox" id="checkbox" value="sis_direc" name="checkbox[]" <?php echo $c12; ?> > <label for="sis_direc">SIST. DE DIRRECC.</label>
              </div>
            </th>
            <th>
              <div class="form-group" id="div_registro_areas4">
                <input type="checkbox" id="checkbox" value="eje_tras" name="checkbox[]" <?php echo $c13; ?> > <label for="eje_tras">EJES TRASEROS</label><br>
                <input type="checkbox" id="checkbox" value="sus_tras" name="checkbox[]" <?php echo $c14; ?> > <label for="sus_tras">SUSPENSI&Oacute;N TRASERA</label><br>
                <input type="checkbox" id="checkbox" value="deflectores" name="checkbox[]" <?php echo $c15; ?> > <label for="deflectores">DEFLECTORES</label><br>
                <input type="checkbox" id="checkbox" value="quin_rued" name="checkbox[]" <?php echo $c16; ?> > <label for="quin_rued">QUINTA RUEDA</label>
              </div>
            </th>
          </tr>
        </table>
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
          <label for="fecha_autori">Fecha Autorizaci&oacute;n</label>
          <input type="date" placeholder="Ingrese Fecha de Autorizaci&oacute;n" name="fecha_autori" class="form-control" id="fecha_autori" value="<?php echo $fecha_auto; ?>" required>
        </div>
        <div class="form-group">
          <label for="fecha_promesa">Fecha Promesa</label>
          <input type="date" placeholder="Ingrese Fecha Promesa" name="fecha_promesa" class="form-control" id="fecha_promesa" value="<?php echo $fecha_pro; ?>" required>
        </div>
        <div class="form-group">
          <label for="fecha_promesa">Fecha T&eacute;rmino</label>
          <input type="date" placeholder="Ingrese Fecha Termino" name="fecha_termino" class="form-control" id="fecha_termino" value="<?php echo $fecha_ter; ?>" required>
        </div>
        
        <div class="form-group">
          <label for="tipo_val">Tipo de Valuaci&oacute;n</label>
          <select name="tipo_val" class="form-control" required>
            <option value="">Seleccione...</option>
            <option value="Global" <?php echo $sel_vt1; ?> >Global</option>
            <option value="Normal" <?php echo $sel_vt2; ?> >Normal</option>
          </select>
        </div>
        <div class="form-group">
          <label for="fecha_refa">Fecha de Entrega de Refacciones</label>
          <input type="date" placeholder="Ingrese Fecha de Entrega de Refacciones" name="fecha_refa" class="form-control" id="fecha_refa" value="<?php echo $fecha_refa; ?>" required>
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
          <label for="danos_repa">Daños a Reparar</label>
          <textarea type="text" placeholder="Ingrese Daños a Reparar" name="danos_repa" class="form-control" id="danos_repa" required><?php echo $danos_repa; ?></textarea>
        </div>
        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Fotos de la Unidad</label><br>
                                <input type="file" class="btn btn-primary btn_new_fotos" name="imagen[]" id="imagen[]" multiple accept="image/*">
                            </div>
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