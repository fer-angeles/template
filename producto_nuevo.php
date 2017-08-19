<?php
	
	/*
		Contiene el menu y submenus de la plantilla
		*/	
	require_once 'Layout/header.php';

	// CONTIENE TODOS LOS ARCHIVOS DE CONEXION A LA DB
	require_once 'class/cn.php';
?>

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Captura de Producto</h1>
		</div>		
	</div>

	<form action="" method="POST" enctype="multipart/form-data">
		<div class="form-group">
			<label for="nombre">Nombre</label>
			<input type="text" id="nombre" name="nombre" required class="form-control">
		</div>
		<div class="form-group">
			<label for="precio">Precio</label>
			<input type="number" id="precio" name="precio" required class="form-control" placeholder="$">
		</div>
		<div class="form-group">
			<label for="stock">Stock</label>
			<input type="number" id="stock" name="stock" required class="form-control">
		</div>
		<div class="form-group">
			<label for="categoria">Categorias</label>
			<select name="categoria" id="categoria" class="form-control">
				<option value="">Selecciona ....</option>
				<?php
					
					$query = mysqli_query($cn, "SELECT * FROM productos_cat");
					while ($row = mysqli_fetch_array($query)) {

						echo '<option value="'.$row['id'].'">'.$row['descripcion'].'</option>';
					
					}

				?>

			</select>
		</div>
		<div class="form-group">
			<label for="sub_categoria">Sub-Categorias</label>
			<select name="sub_categoria" id="sub_categoria" class="form-control" disabled></select>
		</div>
		<div class="form-group">
			<label for="foto">Foto</label>
			<input type="file" name="foto" id="foto" class="form-control">
		</div>
	</form>
	
<?php
	/*
		CONTIENE TODAS LAS LIBRERIAS JAVASCRIPT PARA EL TEMPLATE
	*/
	require_once 'Layout/footer.php';
?>

<script>
	
	$(document).ready(function(){


		$('#categoria').change(function(event) {


			var id = $(this).val();

			
			$.ajax({
				url: 'productos_cat_sub.php',
			    type: 'POST',
			    data: {
					'idSub':id
				},
			    success: function (data) {
			        
			        
			     
			    },
			    error:function() {
			        alert('Tenemos Problemas =(');
			    },
			      
			    beforeSend:function(){
			    	$("#sub_categoria").html('<option>Cargando .....</option>');
			    }
		    });

			
		});

	});


</script>

