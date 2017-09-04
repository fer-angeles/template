<?php require_once('layout/header.php');?>

<?php
	
	require_once 'class/cn.php';

	/*CREAR LA CONSULTA*/
	$query = 'SELECT
  productos.*,
  productos_cat.descripcion as categoria,
  productos_cat_sub.descripcion as subcategoria
FROM  productos
INNER JOIN productos_cat ON productos_cat.id = productos.id_categoria
INNER JOIN productos_cat_sub ON  productos_cat_sub.id = productos.id_subcategoria';
	
	/*EJECUTAN LA CONSULTA*/
	$ejecutar = mysqli_query($cn,$query);
?>
	

	<div class="row">
	    <div class="col-lg-12">
	       <h1 class="page-header">Productos</h1>
	    </div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-3">
					<a href="producto_nuevo.php" class="btn btn-block btn-primary">Nuevo Producto</a>
				</div>
			</div>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Precio</th>
						<th>Stock</th>
						<th>Categoria</th>
						<th>Subcategoria</th>
						<th>Foto</th>
						
					</tr>
				</thead>
				<tbody>
					<?php

						while($row = mysqli_fetch_array($ejecutar))
						{
							echo "<tr>";
								echo "<td>".$row['nombre']."</td>";
								echo "<td>".$row['precio']."</td>";
								echo "<td>".$row['stock']."</td>";
								echo "<td>".$row['categoria']."</td>";
								echo "<td>".$row['subcategoria']."</td>";
								echo "<td>".$row['foto']."</td>";
								echo "<td>";
								echo '<a class="btn btn-sm btn-info" href="editar_producto.php?id="'.$row['id'].'"">Editar</a> <a class="btn btn-sm btn-danger eliminarProducto" data-id="'.$row['id'].'">Eliminar</a> <a class="btn btn-sm btn-default">Correo</a>';
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

		$('.eliminarProducto').click(function(event) {

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
				window.location = 'productos_eliminar.php?id='+id;
			}
			
		});

	});

</script>
