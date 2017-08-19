<?php

	require_once 'class/cn.php';

	//DATO PARA LA CONSULTA CLAUSULA
	$id = $_POST['idSub'];
	
	//CONSULTA CON EL USO DE CLAUSULA
	$query = mysqli_query($cn,"SELECT * FROM productos_cat_sub WHERE id_categoria='$id'");

	//ARREGLO VACIO PARA RELLENARLO DESPUES
	$data = [];

	//JUNTANDO LOS DATOS Y METIENDOLOS A LA ARREGLO DATA
	while($row = mysqli_fetch_assoc($query))
	{
		$data[] = $row;
	}

	//CABECERAS DE RESPUESTA
	header('Content-Type: application/json');
	
	//CODIFICANDO ARREGLO PHP, CONVIRTIENDOLO EN JSON O DATOS PARA JAVASCRIPT
	echo json_encode($data);