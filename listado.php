<?php
$data = [];


foreach ($_SESSION['productos'] as $pp) {
	$query = mysql_query("SELECT * FROM productos WHERE id='$pp'");

	$row = mysql_fetch_assoc($query);

	$data[] = $row;
}
?>

<table>
	<tbody>
		
	</tbody>
</table>