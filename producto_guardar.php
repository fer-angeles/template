<?php

	require_once 'class/cn.php';
	
	$nombre          = $_POST['nombre'];
	$precio          = $_POST['precio'];
	$stock           = $_POST['stock'];
	$id_categoria    = $_POST['id_categoria'];
	$id_subcategoria = $_POST['id_subcategoria'];
	
	var_dump(mysqli_query($cn,"INSERT INTO productos (nombre, precio, stock, id_categoria, id_subcategoria,foto) VALUES ('$nombre', '$precio', '$stock',$id_categoria, '$id_subcategoria', 'foto.png')"));

	header('Location:productos.php');