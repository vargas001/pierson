<?php include_once "includes/header.php"; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Listado de Unidades Entregadas</h1>
		<a href="nueva_orden.php" class="btn btn-primary">Nuevo</a>
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
							<th>SEGURO</th>
							<th>FECHA PROMESA</th>
							<th>FECHA T&Eacute;RMINO</th>
							<th>TIPO VALUACI&Oacute;N</th>
							<?php if ($_SESSION['rol'] == 1 || $_SESSION['user'] == 'Raul' || $_SESSION['user'] == 'JoseL') { ?>
								<th>ACCIONES</th>
							<?php } ?>
						</tr>
					</thead>
					<tbody>
						<?php
						include "../conexion.php";
						$query = mysqli_query($conexion, "SELECT ru.orden_servicio, ru.seguro_particular, v.fecha_promesa, v.fecha_termino, v.tipo_valuacion FROM registro_unidad ru INNER JOIN valuacion v ON ru.orden_servicio = v.orden_servicio where v.estatus = 'Entregado'");
						$result = mysqli_num_rows($query);
						if ($result > 0) {
							while ($data = mysqli_fetch_assoc($query)) { 
								$os =  $data['orden_servicio'];?>
								<tr>
									<td><?php echo $data['orden_servicio']; ?></td>
									<td><?php echo $data['seguro_particular']; ?></td>
									<td><?php echo $data['fecha_promesa']; ?></td>
									<td><?php echo $data['fecha_termino']; ?></td>
									<td><?php echo $data['tipo_valuacion']; ?></td>
													<?php if ($_SESSION['rol'] == 1) { ?>
														<td>
															<a href="detalles_orden2.php?orden_servicio=<?php echo $data['orden_servicio']; ?>" class="btn btn-primary"><i class='fas fa-folder-open'></i></a>
															<a href="editar_orden.php?orden_servicio=<?php echo $data['orden_servicio']; ?>" class="btn btn-success"><i class='fas fa-edit'></i></a>
															<form action="eliminar_unidad.php?id=<?php echo $data['id']; ?>" method="post" class="confirmar d-inline">
																<button class="btn btn-danger" type="submit"><i class='fas fa-trash-alt'></i> </button>
															</form>
														</td>
													<?php }elseif ($_SESSION['user'] == 'Raul' && isset($data2['fecha_termino']) && !isset($data2['fecha_entrega']) || $_SESSION['user'] == 'JoseL' && isset($data2['fecha_termino']) && !isset($data2['fecha_entrega'])) { ?>
														<td>
															<a href="encuesta.php?orden_servicio=<?php echo $data['orden_servicio']; ?>" class="btn btn-primary"><i class='fas fa-question'></i></a>
														</td>
													<?php }else{ ?>
														<td></td>
													<?php }?>
												</tr>
												<?php
											}
										} 
						?>
					</tbody>

				</table>
			</div>

		</div>
	</div>

	</div>
	<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<?php include_once "includes/footer.php"; ?>