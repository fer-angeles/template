<?php require_once('layout/header.php');?>

<?php
	
	require_once 'class/cn.php';

	/*CREAR LA CONSULTA*/
	$query = 'SELECT * FROM usuario';
	
	/*EJECUTAN LA CONSULTA*/
	$ejecutar = mysqli_query($cn,$query);
?>
	<div class="row">
	    <div class="col-lg-12">
	       <h1 class="page-header">Usuarios</h1>
	    </div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-3">
					<a href="usuarios_nuevo.php" class="btn btn-block btn-primary">Nuevo Usuario</a>
				</div>
			</div>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>A. Paterno</th>
						<th>A. Materno</th>
						<th>Correo</th>
						<th>Tipo Usuario</th>
						<th>Activo</th>
						<th>Creado</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php

						while($row = mysqli_fetch_array($ejecutar))
						{
							echo "<tr>";
								echo "<td>".$row['nombres']."</td>";
								echo "<td>".$row['apellido_p']."</td>";
								echo "<td>".$row['apellido_m']."</td>";
								echo "<td>".$row['correo']."</td>";
								echo "<td>".$row['id_tipo_usuario']."</td>";
								echo "<td>".$row['activo']."</td>";
								echo "<td>".$row['creado']."</td>";
								echo "<td>";
								echo '<a class="btn btn-sm btn-info">Editar</a> <a class="btn btn-sm btn-danger">Eliminar</a> <a class="btn btn-sm btn-default">Correo</a>';
								echo"</td>";
							echo "</tr>";
						}

					?>
				</tbody>
			</table>
		</div>
	</div>
<?php require_once('layout/footer.php');?>
