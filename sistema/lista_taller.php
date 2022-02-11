<?php include_once "includes/header.php"; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Taller</h1>
	</div>
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
	<div class="row">
		<div class="col-lg-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered" id="table">
					<thead class="thead-dark">
						<tr>
							<th>OS</th>
							<th>N° ESTACI&Oacute;N</th>
							<th>MEC&aacute;NICO</th>
							<th>TIPO DE REPARACI&Oacute;N</th>
							<th>FECHA PROMESA</th>
							<?php if ($_SESSION['rol'] == 1) { ?>
								<th>ACCIONES</th>
							<?php } ?>
						</tr>
					</thead>
					<tbody>
						<?php
						include "../conexion.php";

						$query = mysqli_query($conexion, "SELECT * FROM taller ORDER BY orden_servicio DESC");
						$result = mysqli_num_rows($query);
						if ($result > 0) {
							while ($data = mysqli_fetch_assoc($query)) { 
								$os =  $data['orden_servicio']; 
								if($data['nom_meca'] == '') {
									$nombre = "";
								}elseif ($data['nom_meca'] == '1') {
									$nombre = "Juan Morales";
								}elseif ($data['nom_meca'] == '2') {
									$nombre = "Rafael Escamilla";
								}elseif ($data['nom_meca'] == '3') {
									$nombre = "Javier Gonzalez";
								}elseif ($data['nom_meca'] == '4') {
									$nombre = "Enrique Ponce";
								}elseif ($data['nom_meca'] == '5') {
									$nombre = "Juan Omaña";
								}elseif ($data['nom_meca'] == '6') {
									$nombre = "Oscar Lopez";
								}elseif ($data['nom_meca'] == '7') {
									$nombre = "Salvador Vargas";
								}elseif ($data['nom_meca'] == '8') {
									$nombre = "Jose Lopez";
								}elseif ($data['nom_meca'] == '9') {
									$nombre = "";
								}elseif ($data['nom_meca'] == '10') {
									$nombre = "";
								}
								?>
								<tr>
									<td><?php echo $data['orden_servicio']; ?></td>
									<td><?php echo $data['n_estacion']; ?></td>
									<td><?php echo $nombre; ?></td>
									<td><?php echo $data['tipo_repa']; ?></td>
									<?php
									include "../conexion.php";
									$query2 = mysqli_query($conexion, "SELECT * FROM valuacion where orden_servicio = '$os' ORDER BY orden_servicio DESC");
									$result2 = mysqli_num_rows($query2);
									if ($result2 > 0) {
										while ($data2 = mysqli_fetch_assoc($query2)) { ?>
											<td><?php echo $data2['fecha_promesa']; ?></td>									<?php if ($_SESSION['rol'] == 1) { ?>
												<td>
													<a href="editar_taller.php?orden_servicio=<?php echo $data2['orden_servicio']; ?>" class="btn btn-success"><i class='fas fa-edit'></i></a>
												</td>
											<?php } ?>
										</tr>
										<?php 
									}
								}
							}
						} ?>
					</tbody>

				</table>
			</div>

		</div>
	</div>
	<script>
		$(function () {
			$('#table_taller').dataTable( {
				paging: true,
				lengthChange: false,
				searching: true,
				ordering: true,
				info: true,
				autoWidth: false
			} );
	</script>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<?php include_once "includes/footer.php"; ?>