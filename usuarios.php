<?php require_once('layout/header.php');?>

<?php
	
	require_once 'class/cn.php';

	/*CREAR LA CONSULTA*/
	$query = 'SELECT * FROM usuario';
	
	/*EJECUTAN LA CONSULTA*/
	$ejecutar = mysqli_query($cn,$query);
?>
	
	<div id="datosUsuario" data-id="20" data-nombre="fernando" data-direccion="León"> Fernando</div>

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
								echo '<a class="btn btn-sm btn-info">Editar</a> <a class="btn btn-sm btn-danger eliminarUsuario" data-id="'.$row['id'].'">Eliminar</a> <a class="btn btn-sm btn-default">Correo</a>';
								echo"</td>";
							echo "</tr>";
						}

					?>
				</tbody>
			</table>
		</div>
	</div>
<?php require_once('layout/footer.php');?>

<script>
	$(document).ready(function(){

		$('.eliminarUsuario').click(function(event) {

			/*
				FORMA 1 PARA SACAR DATOS DE LA TABLA
				var dd = $('table tbody tr:eq(0) td:eq(3)').text();
				console.log(dd);
			*/

			/*
				forma 3 del div que se llama datosUsuario 
				var rr = $('#datosUsuario').data();
				console.log(rr.nombre);
			*/

			$respuesta = confirm('Estas seguro de Eliminar el dato?');

			if($respuesta)
			{
				var id = $(this).data();
				id = id.id;
				window.location = 'usuarios_eliminar.php?id='+id;
			}
			
		});

	});

</script>
