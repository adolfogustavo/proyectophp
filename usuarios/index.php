<?php
 include '../extend/header.php';
?>

<div class="row">
	<div class="col s12">
		<div class="card">
			<div class="card-content">
				<span class="card-title">Alta de usuarios</span>
				<form action="form" action="ins_usuarios.php" method="post" enctype="multipart/form-data">
					<div class="input-field">
						<input type="text" name="nick" required autofocus title="DEBE DE CONTENER ENTRE 8 Y 15 CARACTERES, SOLO LETRAS" pattern="[A-Za-z]{8,15}" id="nick" onblur="may(this.value, this.id)">
						<label for="nick">Nick: </label>
					</div>

					<div class="validacion">
						<input type="password" name="pass1" title="CONTRASEÑA CON NUMEROS, LETRAS, MAYUSCULAS Y MINUSCULAS ENTRE 8 Y 15 CARACTERES" pattern="[A-Za-z0-9]{8,15}" id="pass1" required>
						<label for="pass1">Contraseña: </label>
					</div>

					<div class="validacion">
						<input type="password" title="CONTRASEÑA CON NUMEROS, LETRAS, MAYUSCULAS Y MINUSCULAS ENTRE 8 Y 15 CARACTERES" pattern="[A-Za-z0-9]{8,15}" id="pass2" required>
						<label for="pass2">Confirmar contraseña: </label>
					</div>

					<select name="nivel" required>
						<option value="" disabled selected>ELIGE UN NIVEL DE USUARIO</option>
						<option value="ADMINISTRADOR">ADMINISTRADOR</option>
						<option value="ASESOR">ASESOR</option>
					</select>

					<div class="input-field">
						<input type="text" name="nombre" title="Nombre del usuario" pattern="" id="nombre" onblur="may(this.value, this.add)" required pattern="[A-Z/s]+">
						<label for="nombre">Nombre completo del usuario:</label>
					</div>

					<div class="input-field">
						<input type="email" name="correo" title="Correo electronico" id="correo">
						<label for="correo">Correo electronico</label>
					</div>

					<div class="file-field input-field">
						<div class="btn">
							<span>Foto</span>
							<input type="file" name="foto">
						</div>
						<div class="file-path-wrapper">
							<input class="file-path validate" type="text">
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>

<?php
 include '../extend/scripts.php';
?>

<script>
// Metodo AJAX 
	$('#nick').change(function() {
		$.post('ajax_validacion_nick.php',{
			nick:$('#nick').val(),

			beforeSend: function(){
				$('.validacion').html("Espere un momento por favor..");
			}

		}, function(respuesta){
		  $('.validacion').html(respuesta);
		});
	});
</script>

</body>
</html>