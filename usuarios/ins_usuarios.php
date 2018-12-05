<?php 
include '.../conexion/conexion.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$nick = $con->real_escape_string(htmlentities($_POST['nick']));
	$pass1 = $con->real_escape_string(htmlentities($_POST['pass1']));
	//$pass1 = sha1($pass1);
	$nivel = $con->real_escape_string(htmlentities($_POST['nivel']));
	$nombre = $con->real_escape_string(htmlentities($_POST['nombre']));
	$correo = $con->real_escape_string($_POST['correo']);
	if (empty($nick) || empty($pass1) || empty($nivel) || empty($nombre)) {
		header('location:../extend/alerta.php?msj=Hay un campo sin especificar&c=us&p=in&t=error');
		exit;
	}
	#Comprobar que la variable nick contenga solo letras
	if(!ctype_alpha($nick)) {
		header('location:../extend/alerta.php?msj=El nick no contiene solo letras&c=us&p=in&t=error');
		exit;
	}

	if(!ctype_alpha($nivel)) {
		header('location:../extend/alerta.php?msj=El nivel no contiene solo letras&c=us&p=in&t=error');
		exit;
	}

	$caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZ ";
	// Busca si el nombre ingresado contiene letras, si no encuentra una letra da false
	for ($i = 0; $i < strlen($nombre); $i++){
		#trae la primera letra de la cadena
		$buscar = substr($nombre, $i, 1);
		if(strpos($caracteres, $buscar) === false){
			header('location:../extend/alerta.php?msj=El nombre no contiene solo letras&c=us&p=in&t=error');
		exit;
		}
	}

	$usuario = strlen($nick);
	$contra = strlen($pass);

	if($usuario < 8 || $usuario > 15){
		header('location:../extend/alerta.php?msj=El nick debe contener entre 8 y 15 caracteres&c=us&p=in&t=error');
		exit;
	}

	if($contra < 8 || $contra > 15){
		header('location:../extend/alerta.php?msj=La contraseña debe contener entre 8 y 15 caracteres&c=us&p=in&t=error');
		exit;
	}

	if(!empty($correo)){
		if(!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
			header('location:../extend/alerta.php?msj=El correo no es válido&c=us&p=in&t=error');
		exit;
		}
	}

	$extension = '';
	$ruta = 'foto_perfil';
	$archivo=$_FILES['foto']['tmp_name'];
	$nombrearchivo=$_FILES['foto']['name'];
	$info = pathinfo($nombrearchivo);

	if($archivo != '') {
		$extension = $info['extension'];
	} else {
		$ruta = "foto_perfil/perfil.jpg";
	}


} else {
	header('location:../extend/alerta.php?msj=Utiliza el formulario&c=us&p=in&t=error');

	/*echo "<script>
			alert('Utiliza el formulario');
			location.href='index.php';
		  </script>";*/


}



?>