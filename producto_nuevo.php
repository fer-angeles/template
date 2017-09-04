<?php
	
	/*
		Contiene el menu y submenus de la plantilla
		*/	
	require_once 'Layout/header.php';

	// CONTIENE TODOS LOS ARCHIVOS DE CONEXION A LA DB
	require_once 'class/cn.php';

	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		$row2 = mysqli_fetch_assoc(mysqli_query($cn,"SELECT * FROM productos WHERE id='$id'"));
	}
	else
	{
		$row2 = [];
	}
	
?>

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Captura de Producto</h1>
		</div>		
	</div>

	<form action="producto_guardar.php" id="frmProductos" method="POST" enctype="multipart/form-data">
		<div class="form-group">
			<label for="nombre">Nombre</label>
			<input type="text" id="nombre" name="nombre" required class="form-control" value="<?=isset($row2['nombre'])?$row2['nombre']:''?>">
		</div>
		<div class="form-group">
			<label for="precio">Precio</label>
			<input type="number" id="precio" name="precio" required class="form-control" placeholder="$" value="<?=isset($row2['precio'])?$row2['precio']:''?>">
		</div>
		<div class="form-group">
			<label for="stock">Stock</label>
			<input type="number" id="stock" name="stock" required class="form-control" value="<?=isset($row2['precio'])?$row2['precio']:''?>">
		</div>
		<div class="form-group">
			<label for="categoria">Categorias</label>
			<select name="id_categoria" id="categoria" class="form-control">
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
			<select name="id_subcategoria" id="sub_categoria" class="form-control" disabled></select>
		</div>
		<div class="form-group">
			<label for="foto">Foto</label>
			<input type="file" name="foto" id="foto" class="form-control">
		</div>
		<div class="row">
			<div class="col-md-6">
				<a href="productos.php" class="btn btn-default btn-block">
					Cancelar
				</a>
			</div>
			<div class="col-md-6">
				<button type="submit" class="btn btn-primary btn-block">
					Guardar
				</button>
			</div>
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
			    beforeSend:function(){
			    	$("#sub_categoria").html('<option>Cargando .....</option>');
			    },
			    success: function (data, status) {
			    	
			    	//VARIABLE VACIA
			    	var contenido = '';
			    	
			    	//CHECANDO CUANTOS DATOS TIENE LA RESPUESTA
			    	if(data.length>0)
			    	{
			    		//CONTATENANDO LOS DATOS A LA VARIABLE CONTENIDO
			    		for(var ii in data)
			    		{
			    			console.log(data[ii]);
			    			//CREANDO EL OPTION DE HTML PARA LAS SUBCATEGORIA
			    			contenido +='<option value="'+data[ii].id+'">'+data[ii].descripcion+'</option>';
			    		}
			    	}
			    	//IMPRIMIENDO LOS DATOS EN EL SELECT DE SUBCATEGORIA
			    	$("#sub_categoria").html(contenido);
			    	$("#sub_categoria").prop('disabled',false);

			    },
			    error:function() {
			        
			        alert('Tenemos Problemas =(');

			        $("#sub_categoria").html('');
			    },
		    });
		});

		$('#frmProductos')

	});


</script>

