<?php

session_start();

require_once 'class/cn.php';
$query = mysqli_query($cn,"SELECT * FROM productos");


?>

<table border="1" style="width: 100%">
	<thead>
		
	</thead>
	<tbody>
		<?php
			while($row = mysqli_fetch_assoc($query))
			{
				echo '
					<tr>
						<td><a href="add_producto.php?id='.$row['id'].'">agregar producto</a></td>
						<td>'.$row['nombre'].'</td>
						<td>'.$row['precio'].'</td>
						<td>'.$row['stock'].'</td>
					</tr>

				';
			}
		?>
		
	</tbody>
</table>


<?php
	if(isset($_SESSION['productos'])== false)
    {
        $total = 0;
    }
    else
    {
    	$total = count($_SESSION['productos']);
    }


    echo "Productos agregados:".$total;
?>