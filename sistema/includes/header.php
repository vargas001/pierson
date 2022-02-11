<?php
session_start();
if (empty($_SESSION['active'])) {
	header('location: ../');
}
include "includes/functions.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<style type="text/css">
		#notification-header {
			z-index: 99;
			background: #fff;
			padding: 6px;
			text-align: right;
			/* margin-top: 4px; */
			border-radius: 5px;
			margin-left: 5px;
			margin-right: 10px;
		}
		button#notification-icon {
			background: transparent;
			border: 0;
			position:relative;
			cursor:pointer;
		}
		#notification-count{
			position: absolute;
			left: -2px;
			top: -8px;
			font-size: 14px;
			color: #de5050;
			font-weight: bold;
		}
		#form-header {
			font-size:1.5em;
		}
		#frmNotification {
			padding:20px 30px;
		}
		.form-row{
			padding-bottom:20px;
		}
		#btn-send {
			background: #258bdc;
			color: #FFF;
			padding: 10px 40px;
			border: 0px;
		}
		div.demo-content input[type='text'],textarea{
			width: 100%;
			padding: 10px 5px;
			z-index: 99;
		}
		#notification-latest {
			z-index: 99;
			color: #555;
			position: absolute;
			right: 0px;
			background: #f5f5f5;
			box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.20);
			/* max-width: 250px; */
			text-align: left;
			font-size: 12px;
		}
		.notification-item {
			padding:10px;
			border-bottom: #ce2078 2px solid;
			cursor:pointer;
		}
		.notification-subject {		
			white-space: nowrap;
			overflow: hidden;
			text-overflow: ellipsis;
		}
		.notification-comment {		
			white-space: nowrap;
			overflow: hidden;
			text-overflow: ellipsis;
			font-style:italic;
		}
	</style>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>SOFTWARE SLDV VERSION BETA</title>

	<!-- Custom styles for this template-->
	<link href="css/sb-admin-2.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">
	
</head>

<body id="page-top">
	<?php
	include "../conexion.php";
	//CONTADOR
	$count = 0;
    $estado='';
    if ($_SESSION['nombre'] == "Eduardo") {
        $estado = 'estado_lalo';
    }elseif ($_SESSION['nombre'] == "Erick") {
        $estado = 'estado_erick';
    }elseif ($_SESSION['nombre'] == "Efrain") {
        $estado = 'estado_efrain';
    }elseif ($_SESSION['nombre'] == "Raul") {
        $estado = 'estado_raul';
    }elseif ($_SESSION['nombre'] == "Hilario") {
        $estado = 'estado_hilario';
    }elseif ($_SESSION['nombre'] == "Oscar") {
        $estado = 'estado_oscar';
    }elseif ($_SESSION['nombre'] == "Alejandra") {
        $estado = 'estado_alejandra';
    }elseif ($_SESSION['nombre'] == "Jose Luis") {
        $estado = 'estado_josel';
    }elseif ($_SESSION['nombre'] == "Reymundo") {
        $estado = 'estado_reymundo';
    }
    $sql2 = "SELECT * FROM chats WHERE $estado = 0";
    $result = mysqli_query($conexion, $sql2);
    $count = mysqli_num_rows($result);

	// datos Empresa
	$dni = '';
	$nombre_empresa = '';
	$razonSocial = '';
	$emailEmpresa = '';
	$telEmpresa = '';
	$dirEmpresa = '';
	$igv = '';

	$query_empresa = mysqli_query($conexion, "SELECT * FROM configuracion");
	$row_empresa = mysqli_num_rows($query_empresa);
	if ($row_empresa > 0) {
		while ($infoEmpresa = mysqli_fetch_assoc($query_empresa)) {
			$dni = $infoEmpresa['dni'];
			$nombre_empresa = $infoEmpresa['nombre'];
			$razonSocial = $infoEmpresa['razon_social'];
			$telEmpresa = $infoEmpresa['telefono'];
			$emailEmpresa = $infoEmpresa['email'];
			$dirEmpresa = $infoEmpresa['direccion'];
			$igv = $infoEmpresa['igv'];
		}
	}


	$query_data = mysqli_query($conexion, "CALL data();");
	$result_data = mysqli_num_rows($query_data);
	if ($result_data > 0) {
		$data = mysqli_fetch_assoc($query_data);
	}

	?>
	<!-- Page Wrapper -->
	<div id="wrapper">

		<?php include_once "includes/menu.php"; ?>
		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">
				<!-- Topbar -->
				<nav class="navbar navbar-expand navbar-light bg-primary text-white topbar mb-4 static-top shadow">

					<!-- Sidebar Toggle (Topbar) -->
					<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
						<i class="fa fa-bars"></i>
					</button>
					<div class="input-group">
						<h4>PIERSON TRACTOSERVICIO S.A DE C.V</h4>
						<p class="ml-auto"><strong>MÉXICO, </strong><?php echo fechaPeru(); ?></p>
					</div>
					<div class="demo-content">
						<div id="notification-header">
							<div style="position:relative">
								<button id="notification-icon" name="button" onclick="myFunction()" class="dropbtn"><span id="notification-count"><?php if($count>0) { echo $count; } ?></span><img src="./img/icono.png" /></button>
								<div id="notification-latest"></div>
							</div>          
						</div>
					</div>

					<!-- Topbar Navbar -->
					<ul class="navbar-nav ml-auto">

						<div class="topbar-divider d-none d-sm-block"></div>

						<!-- Nav Item - User Information -->
						<li class="nav-item dropdown no-arrow">
							<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="mr-2 d-none d-lg-inline small text-white"><?php echo $_SESSION['nombre']; ?></span>
							</a>
							<!-- Dropdown - User Information -->
							<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
								<a class="dropdown-item" href="#">
									<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
									<?php echo $_SESSION['email']; ?>
								</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="salir.php">
									<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
									Salir
								</a>
							</div>
						</li>

					</ul>

				</nav>
				<script src="https://code.jquery.com/jquery-2.1.1.min.js" crossorigin="anonymous"></script>
				<script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>
				<script src="js/popper.min.js"></script>
				<script src="js/bootstrap.min.js"></script>
				<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
				<script src="js/ie10-viewport-bug-workaround.js"></script>

				<script type="text/javascript">
					function myFunction() {
						$.ajax({
							url: "notificaciones.php",
							type: "POST",
							processData:false,
							success: function(data){
								$("#notification-count").remove();                  
								$("#notification-latest").show();$("#notification-latest").html(data);
							},
							error: function(){}           
						});
					}

					$(document).ready(function() {
						$('body').click(function(e){
							if ( e.target.id != 'notification-icon'){
								$("#notification-latest").hide();
							}
						});
					});                                     
				</script>
