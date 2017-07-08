<?php

require_once 'class/tabla.php';


$titulos = ['Nombre','Apellido', 'Dirección', 'Teléfono'];
$datos = [

	[
		'nombre' => 'Priscilla',
		'apellido'=> 'Sheridan',	
		'direccion' => 'leon',
		'telefono' => '4772590689'
	],
	[
		'nombre' => 'Luis',
		'apellido'=> 'López',
		'direccion' => 'Monterrey',
		'telefono' => '8183492372'		
	],
	[
		'nombre' => 'Alejandro',
		'apellido'=> 'García',
		'direccion' => 'Aguascalientes',
		'telefono' => '4426838401'		
	],
	[
		'nombre' => 'Karime',
		'apellido'=> 'Marroquín',
		'direccion' => 'Ciudad de México',
		'telefono' => '5556729475'		
	]

];

$table = new Tabla($titulos,$datos);

$table->render();




