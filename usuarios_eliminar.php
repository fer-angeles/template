<?php


	if(isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT))
	{
		require_once 'class/cn.php';
		$id = $_GET['id'];

		$row = mysqli_query($cn,"SELECT foto FROM usuario WHERE id='$id'");
		$row = mysqli_fetch_array($row);
		var_dump($row);
		//mysqli_query($cn,"DELETE FROM usuario where id='$id'");
		//header('Location:usuarios.php');	
	}
	else
	{
		header('Location:usuarios.php');
	}