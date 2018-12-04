<?php
	include '../conexion/conexion.php';

	// Evitar que en nuestras consultas tengamos problemas de SQL Inyection
	$nick = $con->real_escape_string($_POST['nick']);

	$sel = $con->query("SELECT id FROM usuario WHERE nick = '$nick' ");
	$row = mysqli_num_rows($sel);
	
	if($row != 0){
		echo "<label style='color:red;'>El nombre de usuario ya existe</label>"; 
	} else{
		echo "<label style='color:green;'>El nombre de usuario está disponible</label>"; 
	}
	// No olvidar cerrar la conexion para minimizar recursos
	$con->close();


?>