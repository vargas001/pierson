<?php
include "../conexion.php";
//Variables Globales
$p1_10 = $p1_9 = $p1_8 = $p1_7 = $p1_6 = $p1_5 = '';
$p2_10 = $p2_9 = $p2_8 = $p2_7 = $p2_6 = $p2_5 = '';
$p3_10 = $p3_9 = $p3_8 = $p3_7 = $p3_6 = $p3_5 = '';
$p4_10 = $p4_9 = $p4_8 = $p4_7 = $p4_6 = $p4_5 = '';
$p5_10 = $p5_9 = $p5_8 = $p5_7 = $p5_6 = $p5_5 = '';

// Mostrar Datos

if (empty($_REQUEST['orden_servicio'])) {
  $_SESSION['error']="Error empty"; 
  header("Location: lista_unidades.php");
}
$orden_OS = $_REQUEST['orden_servicio'];
$sql = mysqli_query($conexion, "SELECT * FROM encuesta WHERE orden_servicio = '$orden_OS'");
$result_sql = mysqli_num_rows($sql);
if ($result_sql == 0) {
  header("Location: lista_unidades.php");
  $_SESSION['error']="Error Result SQL"; 
} else {
  while ($data = mysqli_fetch_array($sql)) {
    $preg_1 = $data['preg_1'];
    $preg_2 = $data['preg_2'];
    $preg_3 = $data['preg_3'];
    $preg_4 = $data['preg_4'];
    $preg_5 = $data['preg_5'];
    $comentarios = $data['comentarios'];
  }
  //Pregunta 1
  if ($preg_1 == 10) {
    $p1_10 = "checked";
  }elseif ($preg_1 == 9) {
    $p1_9 = "checked";
  }elseif ($preg_1 == 8) {
    $p1_7 = "checked";
  }elseif ($preg_1 == 7) {
    $p1_7 = "checked";
  }elseif ($preg_1 == 6) {
    $p1_6 = "checked";
  }elseif ($preg_1 == 5) {
    $p1_5 = "checked";
  }
  if ($p1_10 == "checked") {
    $gp1_10 = "btn-primary";
  }else{
    $gp1_10 = "btn-outline-primary";
  }
  if ($p1_9 == "checked") {
    $gp1_9 = "btn-primary";
  }else{
    $gp1_9 = "btn-outline-primary";
  }
  if ($p1_8 == "checked") {
    $gp1_8 = "btn-primary";
  }else{
    $gp1_8 = "btn-outline-primary";
  }
  if ($p1_7 == "checked") {
    $gp1_7 = "btn-primary";
  }else{
    $gp1_7 = "btn-outline-primary";
  }
  if ($p1_6 == "checked") {
    $gp1_6 = "btn-primary";
  }else{
    $gp1_6 = "btn-outline-primary";
  }
  if ($p1_5 == "checked") {
    $gp1_5 = "btn-primary";
  }else{
    $gp1_5 = "btn-outline-primary";
  }
  //Pregunta 2
  if ($preg_2 == 10) {
    $p2_10 = "checked";
  }elseif ($preg_2 == 9) {
    $p2_9 = "checked";
  }elseif ($preg_2 == 8) {
    $p2_7 = "checked";
  }elseif ($preg_2 == 7) {
    $p2_7 = "checked";
  }elseif ($preg_2 == 6) {
    $p2_6 = "checked";
  }elseif ($preg_2 == 5) {
    $p2_5 = "checked";
  }
  if ($p2_10 == "checked") {
    $gp2_10 = "btn-primary";
  }else{
    $gp2_10 = "btn-outline-primary";
  }
  if ($p2_9 == "checked") {
    $gp2_9 = "btn-primary";
  }else{
    $gp2_9 = "btn-outline-primary";
  }
  if ($p2_8 == "checked") {
    $gp2_8 = "btn-primary";
  }else{
    $gp2_8 = "btn-outline-primary";
  }
  if ($p2_7 == "checked") {
    $gp2_7 = "btn-primary";
  }else{
    $gp2_7 = "btn-outline-primary";
  }
  if ($p2_6 == "checked") {
    $gp2_6 = "btn-primary";
  }else{
    $gp2_6 = "btn-outline-primary";
  }
  if ($p2_5 == "checked") {
    $gp2_5 = "btn-primary";
  }else{
    $gp2_5 = "btn-outline-primary";
  }
  //Pregunta 3
  if ($preg_3 == 10) {
    $p3_10 = "checked";
  }elseif ($preg_3 == 9) {
    $p3_9 = "checked";
  }elseif ($preg_3 == 8) {
    $p3_7 = "checked";
  }elseif ($preg_3 == 7) {
    $p3_7 = "checked";
  }elseif ($preg_3 == 6) {
    $p3_6 = "checked";
  }elseif ($preg_3 == 5) {
    $p3_5 = "checked";
  }
  if ($p3_10 == "checked") {
    $gp3_10 = "btn-primary";
  }else{
    $gp3_10 = "btn-outline-primary";
  }
  if ($p3_9 == "checked") {
    $gp3_9 = "btn-primary";
  }else{
    $gp3_9 = "btn-outline-primary";
  }
  if ($p3_8 == "checked") {
    $gp3_8 = "btn-primary";
  }else{
    $gp3_8 = "btn-outline-primary";
  }
  if ($p3_7 == "checked") {
    $gp3_7 = "btn-primary";
  }else{
    $gp3_7 = "btn-outline-primary";
  }
  if ($p3_6 == "checked") {
    $gp3_6 = "btn-primary";
  }else{
    $gp3_6 = "btn-outline-primary";
  }
  if ($p3_5 == "checked") {
    $gp3_5 = "btn-primary";
  }else{
    $gp3_5 = "btn-outline-primary";
  }
  //Pregunta 4
  if ($preg_4 == 10) {
    $p4_10 = "checked";
  }elseif ($preg_4 == 9) {
    $p4_9 = "checked";
  }elseif ($preg_4 == 8) {
    $p4_7 = "checked";
  }elseif ($preg_4 == 7) {
    $p4_7 = "checked";
  }elseif ($preg_4 == 6) {
    $p4_6 = "checked";
  }elseif ($preg_4 == 5) {
    $p4_5 = "checked";
  }
  if ($p4_10 == "checked") {
    $gp4_10 = "btn-primary";
  }else{
    $gp4_10 = "btn-outline-primary";
  }
  if ($p4_9 == "checked") {
    $gp4_9 = "btn-primary";
  }else{
    $gp4_9 = "btn-outline-primary";
  }
  if ($p4_8 == "checked") {
    $gp4_8 = "btn-primary";
  }else{
    $gp4_8 = "btn-outline-primary";
  }
  if ($p4_7 == "checked") {
    $gp4_7 = "btn-primary";
  }else{
    $gp4_7 = "btn-outline-primary";
  }
  if ($p4_6 == "checked") {
    $gp4_6 = "btn-primary";
  }else{
    $gp4_6 = "btn-outline-primary";
  }
  if ($p4_5 == "checked") {
    $gp4_5 = "btn-primary";
  }else{
    $gp4_5 = "btn-outline-primary";
  }
  //Pregunta 5
  if ($preg_5 == 10) {
    $p5_10 = "checked";
  }elseif ($preg_5 == 9) {
    $p5_9 = "checked";
  }elseif ($preg_5 == 8) {
    $p5_7 = "checked";
  }elseif ($preg_5 == 7) {
    $p5_7 = "checked";
  }elseif ($preg_5 == 6) {
    $p5_6 = "checked";
  }elseif ($preg_5 == 5) {
    $p5_5 = "checked";
  }
  if ($p5_10 == "checked") {
    $gp5_10 = "btn-primary";
  }else{
    $gp5_10 = "btn-outline-primary";
  }
  if ($p5_9 == "checked") {
    $gp5_9 = "btn-primary";
  }else{
    $gp5_9 = "btn-outline-primary";
  }
  if ($p5_8 == "checked") {
    $gp5_8 = "btn-primary";
  }else{
    $gp5_8 = "btn-outline-primary";
  }
  if ($p5_7 == "checked") {
    $gp5_7 = "btn-primary";
  }else{
    $gp5_7 = "btn-outline-primary";
  }
  if ($p5_6 == "checked") {
    $gp5_6 = "btn-primary";
  }else{
    $gp5_6 = "btn-outline-primary";
  }
  if ($p5_5 == "checked") {
    $gp5_5 = "btn-primary";
  }else{
    $gp5_5 = "btn-outline-primary";
  }
}
?>
<?php include_once "includes/header.php"; ?>

<!-- Begin Page Content -->
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-8 m-auto">
      <?php echo isset($alert) ? $alert : ''; ?>
      <h1 class="text-center">Resultado de Encuesta de Satisfacción.</h1>
      <p class="text-center">Pierson Tractoservicio S.A de C.V</p>
      <div class="form-group">
        <hr>
        <label for="os">Orden de Servicio</label>
        <input type="text" class="form-control" name="os" id="os" value="<?php echo $orden_OS; ?>" disabled>
      </div>
      <!--  PREGUNTA 1  -->
      <input type="hidden" placeholder="" name="orden" id="orden" class="form-control" value="<?php echo $os; ?>" readonly>
      <section class="row">
        <div class="col-md-6">
          <p style="font-size: 140%;">1- Se cumplió con la fecha promesa de entrega</p>
        </div>
        <div class="col-md-1">
          <label class="btn <?php echo $gp1_10; ?>">
            <input type="radio" name="pregunta1" id="pregunta1" value="10" disabled>10
          </label>
        </div>
        <div class="col-md-1">
          <label class="btn <?php echo $gp1_9; ?>">
            <input type="radio" name="pregunta1" id="pregunta1" value="9"disabled> 9
          </label>
        </div>
        <div class="col-md-1">
          <label class="btn <?php echo $gp1_8; ?>">
            <input type="radio" name="pregunta1" id="pregunta1" value="8"disabled> 8
          </label>
        </div>
        <div class="col-md-1">
          <label class="btn <?php echo $gp1_7; ?>">
            <input type="radio" name="pregunta1" id="pregunta1" value="7" disabled> 7
          </label>
        </div>
        <div class="col-md-1">
          <label class="btn <?php echo $gp1_6; ?>">
            <input type="radio" name="pregunta1" id="pregunta1" value="6" disabled> 6
          </label>
        </div>  
        <div class="col-md-1">
          <label class="btn <?php echo $gp1_5; ?>">
            <input type="radio" name="pregunta1" id="pregunta1" value="5" disabled> 5
          </label>
        </div>
      </section><br>
      <!--  PREGUNTA 2  -->
      <section class="row">
        <div class="col-md-6">
          <p style="font-size: 140%;">2- La calidad en la reparación fue: </p>
        </div>
        <div class="col-md-1">
          <label class="btn <?php echo $gp2_10; ?>">
            <input type="radio" name="pregunta2" id="pregunta2" value="10" disabled>10
          </label>
        </div>
        <div class="col-md-1">
          <label class="btn <?php echo $gp2_9; ?>">
            <input type="radio" name="pregunta2" id="pregunta2" value="9" disabled> 9
          </label>
        </div>
        <div class="col-md-1">
          <label class="btn <?php echo $gp2_8; ?>">
            <input type="radio" name="pregunta2" id="pregunta2" value="8" disabled> 8
          </label>
        </div>
        <div class="col-md-1">
          <label class="btn <?php echo $gp2_7; ?>">
            <input type="radio" name="pregunta2" id="pregunta2" value="7" disabled> 7
          </label>
        </div>
        <div class="col-md-1">
          <label class="btn <?php echo $gp2_6; ?>">
            <input type="radio" name="pregunta2" id="pregunta2" value="6" disabled> 6
          </label>
        </div>
        <div class="col-md-1">
          <label class="btn <?php echo $gp2_5; ?>">
            <input type="radio" name="pregunta2" id="pregunta2" value="5" disabled> 5
          </label>
        </div>
      </section><br>
      <!--  PREGUNTA 3  -->
      <section class="row">
        <div class="col-md-6">
          <p style="font-size: 140%;">3- Considera que se le fue informando en todo momento sobre el proceso de reparación de su vehículo </p>
        </div>
        <div class="col-md-1">
          <label class="btn <?php echo $gp3_10; ?>">
            <input type="radio" name="pregunta3" id="pregunta3" value="10" disabled>10
          </label>
        </div>
        <div class="col-md-1">
          <label class="btn <?php echo $gp3_9; ?>">
            <input type="radio" name="pregunta3" id="pregunta3" value="9" disabled> 9
          </label>
        </div>
        <div class="col-md-1">
          <label class="btn <?php echo $gp3_8; ?>">
            <input type="radio" name="pregunta3" id="pregunta3" value="8" disabled> 8
          </label>
        </div>
        <div class="col-md-1">
          <label class="btn <?php echo $gp3_7; ?>">
            <input type="radio" name="pregunta3" id="pregunta3" value="7" disabled> 7
          </label>
        </div>
        <div class="col-md-1">
          <label class="btn <?php echo $gp3_6; ?>">
            <input type="radio" name="pregunta3" id="pregunta3" value="6" disabled> 6
          </label>
        </div>
        <div class="col-md-1">
          <label class="btn <?php echo $gp3_5; ?>">
            <input type="radio" name="pregunta3" id="pregunta3" value="5" disabled> 5
          </label>
        </div>
      </section>
      <!--  PREGUNTA 4  -->
      <section class="row">
        <div class="col-md-6">
          <p style="font-size: 140%;">4- Como considera la calidad en las refacciones, que fueron sustituidas en su vehículo</p>
        </div>
        <div class="col-md-1">
          <label class="btn <?php echo $gp4_10; ?>">
            <input type="radio" name="pregunta4" id="pregunta4" value="10" disabled>10
          </label>
        </div>
        <div class="col-md-1">
          <label class="btn <?php echo $gp4_9; ?>">
            <input type="radio" name="pregunta4" id="pregunta4" value="9" disabled> 9
          </label>
        </div>
        <div class="col-md-1">
          <label class="btn <?php echo $gp4_8; ?>">
            <input type="radio" name="pregunta4" id="pregunta4" value="8" disabled> 8
          </label>
        </div>
        <div class="col-md-1">
         <label class="btn <?php echo $gp4_7; ?>">
            <input type="radio" name="pregunta4" id="pregunta4" value="7" disabled> 7
          </label>
        </div>
        <div class="col-md-1">
          <label class="btn <?php echo $gp4_6; ?>">
            <input type="radio" name="pregunta4" id="pregunta4" value="6" disabled> 6
          </label>
        </div>
        <div class="col-md-1">
          <label class="btn <?php echo $gp4_5; ?>">
            <input type="radio" name="pregunta4" id="pregunta4" value="5" disabled> 5
          </label>
        </div>
      </section>
      <!--  PREGUNTA 5  -->
      <section class="row">
        <div class="col-md-6">
          <p style="font-size: 140%;">5- En términos generales, como calificaría el taller</p>
        </div>
        <div class="col-md-1">
          <label class="btn <?php echo $gp5_10; ?>">
            <input type="radio" name="pregunta5" id="pregunta5" value="10" disabled>10
          </label>
        </div>
        <div class="col-md-1">
          <label class="btn <?php echo $gp5_9; ?>">
            <input type="radio" name="pregunta5" id="pregunta5" value="9" disabled> 9
          </label>
        </div>
        <div class="col-md-1">
          <label class="btn <?php echo $gp5_8; ?>">
            <input type="radio" name="pregunta5" id="pregunta5" value="8" disabled> 8
          </label>
        </div>
        <div class="col-md-1">
          <label class="btn <?php echo $gp5_7; ?>">
            <input type="radio" name="pregunta5" id="pregunta5" value="7" disabled> 7
          </label>
        </div>
        <div class="col-md-1">
          <label class="btn <?php echo $gp5_6; ?>">
            <input type="radio" name="pregunta5" id="pregunta5" value="6" disabled> 6
          </label>
        </div>
        <div class="col-md-1">
          <label class="btn <?php echo $gp5_5; ?>">
            <input type="radio" name="pregunta5" id="pregunta5" value="5" disabled> 5
          </label>
        </div>
      </section>
      <hr>
      <!--  Comentarios  -->
      <section class="row">
        <div class="col-md-12">
          <h3>Comentarios.</h3>
          <p></p>
        </div>
      </section>
      <section class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label for="comment">Comentarios:</label>
            <textarea class="form-control" rows="6" name="comentarios" id="comentarios"><?php echo "$comentarios"; ?></textarea>
          </div>
        </div>
      </section>
      
      </div>
    </div>
  </div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<?php include_once "includes/footer.php"; ?>