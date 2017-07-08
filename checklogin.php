<?php

	require_once 'class/cn.php';

	/*RECOGER LOS DATOS*/

	$usuario = $_POST['email'];
	$pwd = $_POST['password'];

	/*CREAR LA CONSULTA*/	

	$query ="SELECT id,correo,password FROM usuario WHERE correo = '$usuario' AND password= '$pwd'";

	/*EJECUTAR LA CONSULTA*/

	$ejecutar =mysqli_query($cn,$query);
	$resultado =mysqli_fetch_array($ejecutar);

	/*ACCIÓN DESPUÉS DE EJECUTAR*/
	if(mysqli_num_rows($ejecutar) == 1)
	{
		session_start();
		$_SESSION['id'] = $resultado['id'];
		$_SESSION['email'] = $resultado['correo'];

		header('location:index.php');
	}
	else
	{
		header('location:login.php');
	}