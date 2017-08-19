<?php

class Tabla
{
	private $titulos;
	private $datos;
	
	#CONSTRUCTOR ES LO PRIMERO QUE CARGA ANTES DE TODO
	
	public function __construct ($titulos = [], $datos = [])
	{
		$this->titulos = $titulos;
		$this->datos = $datos;
	}

	
	#DIBUJAR LA TABLA

	public function render ()
	{
	
		$this->table();
	}

	private function table()

	{
		echo '<table border="1">';
		$this->header();
		$this->body();
		echo '</table>';

	}
	
	private function header ()
	{

		if(count($this->titulos)>0)
		{
			echo "<thead>";
				echo "<tr>";
					foreach ($this->titulos as $titulo) {
						echo"<th>".$titulo."</th>";
				}
				echo"</tr>";
			echo "</thead>";
		}
	}


	private function body()
	{

		if(count($this->datos)>0)
		{
			echo "<tbody>";
				
					foreach ($this->datos as $dato) {
						echo "<tr>";
							foreach ($dato as $d) {
								echo"<td>".$d."</td>";
						}
					}
				echo"</tr>";
			echo "</tbody>";
		}
}
}


?>
