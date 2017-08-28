<?php

require_once 'class/cn.php';
require_once 'vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;
//http://localhost/template/pdf.php?id=1
if(!isset($_GET['id']))
{
	echo "Te faltan datos";
	exit();
}

$id    = $_GET['id'];

$query = mysqli_query($cn,"SELECT * FROM usuario WHERE id='$id'");

if(mysqli_num_rows($query) == 1)
{
	$row = mysqli_fetch_assoc($query);
	$pdf   = new Html2Pdf();

	$pdf->writeHTML('
		
		<page>
			<table style="width:100%;" cellspacing="0" cellpadding="0">
				<thead>
					<tr>
						<th>
							Nombre
						</th>
						<th>
							Apellido Paterno
						</th>
						<th>
							Apellido Materno
						</th>
						<th>
							Correo
						</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td style="width:25%;border-top: 1px solid red;border-bottom: 1px solid red;border-left: 1px solid red;">
							'.$row['nombres'].'
						</td>
						<td style="width:25%;border-top: 1px solid red;border-bottom: 1px solid red;border-left: 1px solid red;">
							'.$row['apellido_p'].'
						</td>
						<td style="width:25%;border-top: 1px solid red;border-bottom: 1px solid red;border-left: 1px solid red;">
							'.$row['apellido_m'].'
						</td>
						<td style="width:25%;border: 1px solid red;">
							<table border="1">
								<tbody>
									<tr>
										<td>djhsdjhds</td>
									</tr>
								</tbody>
							</table>
						</td>
					</tr>
				</tbody>
			</table>
		</page>
	');
	$pdf->output();
}



