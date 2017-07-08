<?php


?>

<?php require_once 'Layout/header.php';?>
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Nuevo Usuario</h1>
		</div>
	</div>
	
	<form action="usuarios_guardar.php">
		<div class="form-group">
			<label for="nombre">Nombre</label>
			<input type="text" class="form-control" name="nombre" id="nombre">
		</div>
		<div class="form-group">
			<label for="apellido_p">Apellido Paterno</label>
			<input type="text" class="form-control" name="apellido_p" id="apellido_p">
		</div>
		<div class="form-group">
			<label for="apellido_m">Apellido Materno</label>
			<input type="text" class="form-control" name="apellido_m" id="apellido_m">
		</div>
		<div class="form-group">
			<label for="correo">Correo</label>
			<input type="email" class="form-control" name="correo" id="correo">
		</div>
		<div class="form-group">
			<label for="password">Contraseña</label>
			<input type="text" class="form-control" name="password" id="password">
		</div>
		<div class="form-group">
			<label for="password2">Repetir Contraseña</label>
			<input type="text" class="form-control" name="password2" id="password2">
		</div>
		<div clas="form-group">
			<label for="id_tipo_usuario">Tipo Usuario</label>
			<select name="id_tipo_usuario" id="id_tipo_usuario" class="form-control">
				<?php
					require_once 'class/cn.php';

					/*CREAR LA CONSULTA*/
					$query_tipo_usuario = 'SELECT * FROM usuario_tipo';

					/*EJECUTAR LA CONSULTA*/
					$ejecutar_tipo_usuario = mysqli_query($cn,$query_tipo_usuario);

					/*IMPRIMIR*/
					while($row_tipo = mysqli_fetch_array($ejecutar_tipo_usuario))
					{
						echo '<option value="'.$row_tipo['id'].'">'.ucfirst($row_tipo['tipo_usuario']).'</option>';		
					}
				?>
			</select>
		</div>
	</form>
	<br>
	<br>
	<br>
	<br>
	<br>

<?php require_once 'Layout/footer.php';?>