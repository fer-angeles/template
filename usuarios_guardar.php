<?php

	require_once('class/cn.php');
	
	$nombre          = $_POST['nombre'];
	$apellido_p      = $_POST['apellido_p'];
	$apellido_m      = $_POST['apellido_m'];
	$password        = $_POST['password'];
	$correo          = $_POST['correo'];
	$id_tipo_usuario = $_POST['id_tipo_usuario'];
	$activo          = $_POST['activo'];

	//window.location='';
	//var_dump($_FILES['foto']);

	if($nombre!='' && $apellido_p!='' && $apellido_m!='' && $password!='' && $correo!='' && $id_tipo_usuario !='' && $activo!='' && filter_var($correo,FILTER_VALIDATE_EMAIL))
	{
		$foto = $_FILES['foto'];

		$check = getimagesize($foto['tmp_name']);

		if(isset($check['mime']))
		{
			$ext = explode('.', $foto['name']);

			$ext = end($ext);

			$nombre_archivo = date('Ymdhis').'.'.$ext;

			@move_uploaded_file($foto['tmp_name'], 'fotos/'.$nombre_archivo);

			if(file_exists('fotos/'.$nombre_archivo))
			{

				$activo = $activo =='on'?1:0;
				
				$password = hash('whirlpool', $password);

				/*CREAR CONSULTA*/
				$query = "INSERT INTO usuario (nombre,apellido_p,apellido_m,correo,password,id_tipo_usuario,activo,foto,creado) VALUE ('$nombre','$apellido_p','$apellido_m','$correo','$id_tipo_usuario','$activo','$nombre_archivo',NOW())";	

				/*EJECUTAR CONSULTA*/
				mysqli_query($cn,$query);

			}


		}
			
		header('Location:usuarios.php');
		
	}
	else
	{
		echo "Tienes un campo vacio";
	}





