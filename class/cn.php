<?php

	$host = 'localhost';
	$usr = 'vapros';
	$pwd = 'vapros';

	$cn = mysqli_connect($host,$usr,$pwd);
	
	if($cn)
	{
		mysqli_select_db($cn,'empresa');
	}
	else
	{
		echo "no se conectó";
	}