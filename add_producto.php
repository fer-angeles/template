<?php
	
	session_start();

	$id = $_GET['id'];

	if(isset($_SESSION['productos'])== false)
    {
        $_SESSION['productos'] = [];
    }
    else
    {
    	if(!array_search($id, $_SESSION['productos']))
    	{
    		$_SESSION['productos'][] = $id;
    	}
    }


    header('Location:tienda.php');
