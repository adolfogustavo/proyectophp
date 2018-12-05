<?php 
include '../conexion/conexion.php';
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.3.2/sweetalert2.css">
		<title>Proyecto</title>

	</head>
<body>
	<?php 
		#Variables recibidas desde la url enviada en ins_usuarios
		$mensaje = htmlentities($_GET['msj']); // Variable mensaje 
		$c = htmlentities($_GET['c']);  // Variable carpeta
		$p = htmlentities($_GET['p']);	// Variable pagina
		$t = htmlentities($_GET['t']);  // Variable tipo

		switch ($c) {
			case 'us':
				$carpeta = '../usuarios';
				break;
		}

		switch ($p) {
			case 'in':     //in de index
				$pagina = '/index.php';
				break;
		}

		$dir = $carpeta.$pagina;

		if($t == "error"){
			$titulo = "Oppss..";
		} else {
			$titulo = "Buen trabajo";
		}


	?>

	

	 <script   src="https://code.jquery.com/jquery-3.1.1.min.js"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.3.2/sweetalert2.js"></script>

	 <script>
	 	// Script que recibe el mensaje al intentar eliminar
	 	swal({
  		  title: '<?php echo $titulo; ?>',
		  text: "<?php echo $mensaje ?>",
		  type: '<?php echo $t ?>',
		  confirmButtonColor: '#3085d6',
		  confirmButtonText: 'Ok'
		}).then(function() {
		  	location.href = '<?php echo $dir ?>';
		});

		$(document).click(function() {
			location.href='<?php echo $dir ?>';
		});

		//tecla 27 tecla escape
		$(document).keyup(function(e) {
			if(e.which == 27) {
				location.href="<?php echo $dir ?>";
			}
		});

	 </script>
</body>
</html>