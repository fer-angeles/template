<?php 

	if(!isset($_GET['id']))
	{
		echo "Te faltan datos";
		exit();
	}

	require_once 'class/cn.php';

	$id    = $_GET['id'];
	$query = mysqli_query($cn,"SELECT * FROM usuario WHERE id='$id'");
	if(mysqli_num_rows($query) <= 0)
	{
		header('Location:usuarios.php');
	}
	else
	{
		$row = mysqli_fetch_assoc($query);
	}

	require_once 'Layout/header.php';
?>
	
	<style>
		
		form div.form-group label span{
			color: red !important;
		}
	</style>
	
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Editar Usuario</h1>
		</div>
	</div>
	
	<form action="usuarios_guardar.php" method="POST" enctype="multipart/form-data"> 
		<div class="form-group">
			<label for="nombre">
				<span class="text-danger">*</span>Nombre
			</label>
			<input type="text" class="form-control" name="nombre" id="nombre" required>
		</div>
		<div class="form-group">
			<label for="apellido_p">
				<span>*</span>Apellido Paterno
			</label>
			<input type="text" class="form-control" name="apellido_p" id="apellido_p" required>
		</div>
		<div class="form-group">
			<label for="apellido_m">Apellido Materno</label>
			<input type="text" class="form-control" name="apellido_m" id="apellido_m">
		</div>
		<div class="form-group">
			<label for="correo">Correo</label>
			<input type="email" class="form-control" name="correo" id="correo" required>
		</div>
		<div class="form-group">
			<label for="password">Contraseña</label>
			<input type="text" class="form-control" name="password" id="password" required>
			<div class="mesajes"></div>
		</div>
		<div class="form-group">
			<label for="password2">Repetir Contraseña</label>
			<input type="text" class="form-control" name="password2" id="password2" required>
			<div class="mesajes"></div>
		</div>
		<div clas="form-group">
			<label for="id_tipo_usuario">Tipo Usuario</label>
			<select name="id_tipo_usuario" id="id_tipo_usuario" class="form-control" required>
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
		<div class="form-group">
			<label for="activo">Activo</label>
			<input type="checkbox" name="activo" id="activo">
		</div>
		<div class="form-group">
			<label for="foto"> Foto</label>
			<input type="file" name="foto" id="foto">
		</div>
		<div class="row">
			<div class="col-md-6">
				<button class="btn btn-block btn-primary" type="submit">Guardar</button>
			</div>
			<div class="col-md-6">
				<a href="usuarios.php" class="btn btn-block btn-danger">Cancelar</a>
			</div>
		</div>
	</form>
	
	<br>
	<br>
	<br>
	<br>
	<br>

<?php require_once 'Layout/footer.php';?>

<script>
	
	$(document).ready(function() {
		
		var pwd  = $('#password');
		var pwd2 = $('#password2');

		/*VALIDACION PARA CONTRASEÑA*/
		pwd.keyup(function(event) {
			
			var val1 = pwd.val();
			var padre = pwd.parents('.form-group');

			if(!val1.match(/^[a-zA-Z0-9]{8,20}$/))
			{	
				padre.find('.mesajes').html('<br><div class="alert alert-danger"><b>La contraseña tiene que ser menor a 20 caracteres y mayo a 8 caracteres, con numero y letras solamente<b/></div>');
			}
			else
			{
				padre.find('.mesajes').html('');
			}

		});

		/*VALIDACION DE IGUAL CONTRASEÑA*/
		pwd2.keyup(function() {


			///^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/


			//
			//^[0-9]{1,}[A-Za-z]{1,}$/

			
			var val1 = pwd.val();
			var val2 = pwd2.val();

			if( val1 != '')
			{
				var padre = pwd2.parents('.form-group');
				
				if(val1 === val2)
				{
					padre.find('.mesajes').html('<br><div class="alert alert-success"><b>Las contraseñas son iguales</b></div>');
				}
				else
				{
					padre.find('.mesajes').html('<br><div class="alert alert-danger"><b>Las contraseñas no son iguales</b></div>');
				}
			}
			else
			{
				alert('La contraseña esta esta vacia');
				pwd2.val('');
			}

		});


	});


</script>
