<?php

	require_once 'class/cn.php';
	
	require_once 'vendor/autoload.php';
	
	$mail             = new PHPMailer;
	$mail->isSMTP();
	$mail->Host       = 'smtp.gmail.com';
	$mail->SMTPAuth   = true;
	$mail->Username   = 'juanfernandoangeles@gmail.com';
	$mail->Password   = 'topvsrcuftnjszld';
	$mail->SMTPSecure = 'tls';
	$mail->Port       = 587;
	$mail->setFrom('juanfernandoangeles@gmail.com', 'Fernando');

	//$mail->addCC('juanfernandoangeles@gmail.com');
	$mail->isHTML(true);
	


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

				$mail->addAddress($correo, $nombre);
				$mail->Subject    = 'Hola '.$nombre;
				$mail->Body       = '
						<!DOCTYPE html>
						<html lang="en">
						<head>
							<meta charset="UTF-8">
							<title>Correo de Notificación</title>
							<style>
								.firma{
									width: 100%;
									border-left: green solid 3px;
									height: 70px;
								}
							</style>
						</head>
						<body>

							<img src="http://compras.recba.company/assets/img/logo.png">
							<br>
							<br>
							<p>Hola <strong>'.$nombre.'</strong>, tu cuenta ya ha sido creada.</p>
							<div class="firma">
								ATTE: MI EMPRESA
							</div>
						</body>
						</html>

				';

				$mail->send();

			}


		}
			
		header('Location:usuarios.php');
		
	}
	else
	{
		echo "Tienes un campo vacio";
	}





