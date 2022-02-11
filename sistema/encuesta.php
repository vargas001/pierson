<?php include_once "includes/header.php"; 
$os = $_REQUEST['orden_servicio'];
?>

<!-- Begin Page Content -->
<div class="container">
    <section class="row">
      <div class="col-md-12">
        <h1 class="text-center">Encuesta de Satisfacción.</h1>
        <p class="text-center">Pierson Tractoservicio S.A de C.V</p>
    </div>
</section>
<hr>
<form action="enviar_encuesta.php" method="post" name="form_new_os" id="form_new_os" enctype="multipart/form-data"><br>
<!--  PREGUNTA 1  -->
<input type="hidden" placeholder="" name="orden" id="orden" class="form-control" value="<?php echo $os; ?>" readonly>
<section class="row">
  <div class="col-md-6">
    <p style="font-size: 140%;">1- Se cumplió con la fecha promesa de entrega</p>
</div>
<div class="col-md-1">
    <label class="btn btn-outline-primary">
        <input type="radio" name="pregunta1" id="pregunta1" value="10"> 10
    </label>
</div>
<div class="col-md-1">
    <label class="btn btn-outline-primary">
        <input type="radio" name="pregunta1" id="pregunta1" value="9"> 9
    </label>
</div>
<div class="col-md-1">
    <label class="btn btn-outline-primary">
        <input type="radio" name="pregunta1" id="pregunta1" value="8"> 8
    </label>
</div>
<div class="col-md-1">
    <label class="btn btn-outline-primary">
        <input type="radio" name="pregunta1" id="pregunta1" value="7"> 7
    </label>
</div>
<div class="col-md-1">
    <label class="btn btn-outline-primary">
        <input type="radio" name="pregunta1" id="pregunta1" value="6"> 6
    </label>
</div>
<div class="col-md-1">
    <label class="btn btn-outline-primary">
        <input type="radio" name="pregunta1" id="pregunta1" value="5"> 5
    </label>
</div>
</section><br>
<!--  PREGUNTA 2  -->
<section class="row">
  <div class="col-md-6">
    <p style="font-size: 140%;">2- La calidad en la reparación fue: </p>
</div>
<div class="col-md-1">
    <label class="btn btn-outline-primary">
        <input type="radio" name="pregunta2" id="pregunta2" value="10"> 10
    </label>
</div>
<div class="col-md-1">
    <label class="btn btn-outline-primary">
        <input type="radio" name="pregunta2" id="pregunta2" value="9"> 9
    </label>
</div>
<div class="col-md-1">
    <label class="btn btn-outline-primary">
        <input type="radio" name="pregunta2" id="pregunta2" value="8"> 8
    </label>
</div>
<div class="col-md-1">
    <label class="btn btn-outline-primary">
        <input type="radio" name="pregunta2" id="pregunta2" value="7"> 7
    </label>
</div>
<div class="col-md-1">
    <label class="btn btn-outline-primary">
        <input type="radio" name="pregunta2" id="pregunta2" value="6"> 6
    </label>
</div>
<div class="col-md-1">
    <label class="btn btn-outline-primary">
        <input type="radio" name="pregunta2" id="pregunta2" value="5"> 5
    </label>
</div>
</section><br>
<!--  PREGUNTA 3  -->
<section class="row">
  <div class="col-md-6">
    <p style="font-size: 140%;">3- Considera que se le fue informando en todo momento sobre el proceso de reparación de su vehículo </p>
</div>
<div class="col-md-1">
    <label class="btn btn-outline-primary">
        <input type="radio" name="pregunta3" id="pregunta3" value="10"> 10
    </label>
</div>
<div class="col-md-1">
    <label class="btn btn-outline-primary">
        <input type="radio" name="pregunta3" id="pregunta3" value="9"> 9
    </label>
</div>
<div class="col-md-1">
    <label class="btn btn-outline-primary">
        <input type="radio" name="pregunta3" id="pregunta3" value="8"> 8
    </label>
</div>
<div class="col-md-1">
    <label class="btn btn-outline-primary">
        <input type="radio" name="pregunta3" id="pregunta3" value="7"> 7
    </label>
</div>
<div class="col-md-1">
    <label class="btn btn-outline-primary">
        <input type="radio" name="pregunta3" id="pregunta3" value="6"> 6
    </label>
</div>
<div class="col-md-1">
    <label class="btn btn-outline-primary">
        <input type="radio" name="pregunta3" id="pregunta3" value="5"> 5
    </label>
</div>
</section>
<!--  PREGUNTA 4  -->
<section class="row">
  <div class="col-md-6">
    <p style="font-size: 140%;">4- Como considera la calidad en las refacciones, que fueron sustituidas en su vehículo</p>
</div>
<div class="col-md-1">
    <label class="btn btn-outline-primary">
        <input type="radio" name="pregunta4" id="pregunta4" value="10"> 10
    </label>
</div>
<div class="col-md-1">
    <label class="btn btn-outline-primary">
        <input type="radio" name="pregunta4" id="pregunta4" value="9"> 9
    </label>
</div>
<div class="col-md-1">
    <label class="btn btn-outline-primary">
        <input type="radio" name="pregunta4" id="pregunta4" value="8"> 8
    </label>
</div>
<div class="col-md-1">
    <label class="btn btn-outline-primary">
        <input type="radio" name="pregunta4" id="pregunta4" value="7"> 7
    </label>
</div>
<div class="col-md-1">
    <label class="btn btn-outline-primary">
        <input type="radio" name="pregunta4" id="pregunta4" value="6"> 6
    </label>
</div>
<div class="col-md-1">
    <label class="btn btn-outline-primary">
        <input type="radio" name="pregunta4" id="pregunta4" value="5"> 5
    </label>
</div>
</section>
<!--  PREGUNTA 5  -->
<section class="row">
  <div class="col-md-6">
    <p style="font-size: 140%;">5- En términos generales, como calificaría el taller</p>
</div>
<div class="col-md-1">
    <label class="btn btn-outline-primary">
        <input type="radio" name="pregunta5" id="pregunta5" value="10"> 10
    </label>
</div>
<div class="col-md-1">
    <label class="btn btn-outline-primary">
        <input type="radio" name="pregunta5" id="pregunta5" value="9"> 9
    </label>
</div>
<div class="col-md-1">
    <label class="btn btn-outline-primary">
        <input type="radio" name="pregunta5" id="pregunta5" value="8"> 8
    </label>
</div>
<div class="col-md-1">
    <label class="btn btn-outline-primary">
        <input type="radio" name="pregunta5" id="pregunta5" value="7"> 7
    </label>
</div>
<div class="col-md-1">
    <label class="btn btn-outline-primary">
        <input type="radio" name="pregunta5" id="pregunta5" value="6"> 6
    </label>
</div>
<div class="col-md-1">
    <label class="btn btn-outline-primary">
        <input type="radio" name="pregunta5" id="pregunta5" value="5"> 5
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
          <textarea class="form-control" rows="6" name="comentarios" id="comentarios"></textarea>
        </div>
      </div>
    </section>
    <h4 class="text-center"><button type="submit" class="btn btn-primary">Enviar</button></h4>
</form>
<hr>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<?php include_once "includes/footer.php"; ?>
