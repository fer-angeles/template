<?php
	
	require 'class/cn.php';

	$nombre          = $_POST['nombre'];
	$apellido_p      = $_POST['apellido_p'];
	$apellido_m      = $_POST['apellido_m'];
	$correo          = $_POST['correo'];
	$id_tipo_usuario = $_POST['id_tipo_usuario'];
	$activo          = isset($_POST['activo']) && $_POST['activo'] == 'on'?1:0;
	$id              = $_POST['id'];
	$fotoOld         = $_POST['fotoOld'];

	if(isset($_FILES['foto']) && $_FILES['foto']!='')
	{
		$foto = $_FILES['foto'];

		$check = getimagesize($foto['tmp_name']);

		if(isset($check['mime']))
		{
			$ext = explode('.', $foto['name']);

			$ext = end($ext);

			$nombre_archivo = date('Ymdhis').'.'.$ext;

			@move_uploaded_file($foto['tmp_name'], 'fotos/'.$nombre_archivo);
			@unlink('fotos/'.$fotoOld);

		}
	}
	else
	{
		$nombre_archivo = '';
	}

	$query_foto = $nombre_archivo !=''?",foto = '$nombre_archivo'":'';

	mysqli_query($cn,"
		UPDATE 
			usuario
		SET 
			nombres         = '$nombre', 
			apellido_p      = '$apellido_p', 
			apellido_m      = '$apellido_m',
			correo          = '$correo',
			id_tipo_usuario = '$id_tipo_usuario',  
			activo          = '$activo'
			".$query_foto."
		WHERE id ='$id'
	");

	header("Location:usuarios.php");