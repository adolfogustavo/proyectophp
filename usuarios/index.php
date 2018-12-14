<?php
 include '../extend/header.php';
?>

<div class="row">
	<div class="col s12">
		<div class="card">
			<div class="card-content">
				<span class="card-title">Alta de usuarios</span>
				<form action="ins_usuarios.php" method="post" enctype="multipart/form-data">
					<div class="input-field">
						<input type="text" name="nick" required autofocus title="DEBE DE CONTENER ENTRE 8 Y 15 CARACTERES, SOLO LETRAS" pattern="[A-Za-z]{4,15}" id="nick" onblur="may(this.value, this.id)">
						<label for="nick">Nick: </label>
					</div>

					<div class="validacion"></div>
						<input type="password" name="pass1" title="CONTRASEÑA CON NUMEROS, LETRAS, MAYUSCULAS Y MINUSCULAS ENTRE 8 Y 15 CARACTERES" id="pass1" required>
						<label for="pass1">Contraseña: </label>

						<!-- pattern="[A-Za-z0-9]{4,15}" -->

						<input type="password" title="CONTRASEÑA CON NUMEROS, LETRAS, MAYUSCULAS Y MINUSCULAS ENTRE 8 Y 15 CARACTERES" id="pass2" required>
						<label for="pass2">Confirmar contraseña: </label>

					<select name="nivel" required>
						<option value="" disabled selected>ELIGE UN NIVEL DE USUARIO</option>
						<option value="ADMINISTRADOR">ADMINISTRADOR</option>
						<option value="ASESOR">ASESOR</option>
					</select>

					<div class="input-field">
						<input type="text" name="nombre" title="Nombre del usuario" id="nombre" onblur="may(this.value, this.id)" required pattern="[A-Z/s]+">
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

					<button type="submit" name="button" class="btn black" id="btn_guardar">Guardar <i class="material-icons">send</i></button>

				</form>
			</div>
		</div>
	</div>
</div>


<div class="row">
	<div class="col s12">
		<nav class="brown lighten-3">
			<div class="nav-wrapper">
				<div class="input-field">
					<input type="search" id="buscar" autocomplete="off">
					<label for="buscar"><i class="material-icons">search</i></label>
					<i class="material-icon">close</i>
				</div>
			</div>
		</nav>
	</div>
</div>

<?php $sel = $con->query("SELECT * FROM usuario "); 
$row = mysqli_num_rows($sel);
?>
<div class="row">
	<div class="col s12">
		<div class="card">
			<div class="card-content">
				<span class="card-title">Usuarios (<?php echo $row ?>)</span>
				<table>
					<thead>
						<tr class="cabecera">
							<th>Nick</th>
							<th>Nombre</th>
							<th>Correo</th>
							<th>Nivel</th>
							<th>Foto</th>
							<th>Bloqueo</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<!-- Recorrer filas de la tabla -> fetch_assoc -->
					<?php while($f = $sel->fetch_assoc()) { ?>
						<tr>
							<td><?php echo $f['nick'] ?></td>
							<td><?php echo $f['nombre'] ?></td>
							<td><?php echo $f['correo'] ?></td>
							<td><?php echo $f['nivel'] ?></td>
							<td><img src="<?php echo $f['foto'] ?>" width="50" class="circle" alt=""></td>
							<td><?php echo $f['bloqueo'] ?></td>
							<td></td>
							<td></td>
						</tr>
					<?php } ?>
				</table>
			</div>
		</div>
	</div>
</div>

<?php
 include '../extend/scripts.php';
?>

<script src="../js/validacion.js"></script>

</body>
</html>