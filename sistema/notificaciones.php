<?php
session_start();
$conn = new mysqli("localhost","root","","sisptr");
$estado ='';
$ses = $_SESSION['nombre'];
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
$sql = "UPDATE chats SET $estado = 1 WHERE $estado = 0";	
$result = mysqli_query($conn, $sql);

$sql = "SELECT * FROM chats WHERE uname != '$ses' ORDER BY id DESC limit 5";
$result = mysqli_query($conn, $sql);

$response='';

while($row=mysqli_fetch_array($result)) {

	/* Formate fecha */
	$fechaOriginal = $row["dt"];
	$fechaFormateada = date("d-m-Y", strtotime($fechaOriginal));

	$response = $response . "<div class='notification-item'>" .
	"<div class='notification-subject'>". $row["uname"] . " - <span>". $fechaFormateada . "</span> </div>" . 
	"<div class='notification-comment'>" . $row["msg"]  . "</div>" .
	"</div>";
}
if(!empty($response)) {
	print $response;
}


?>