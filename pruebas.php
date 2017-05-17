	<?php
		include_once 'clases/usuarios.php';
		$ListaDeUsuarios = array();
		$pdo = new PDO("mysql:host = localhost; dbname=estacionamiento","root","");
		$contenido = $pdo->query("SELECT * FROM usuarios");
		while($linea = $contenido->fetch(PDO::FETCH_ASSOC))
			{
				$unUsuario = new Usuario($linea["nombre"],$linea["password"],$linea["apellido"],$linea["tipo"],$linea["turno"],$linea["id"]);
				array_push($ListaDeUsuarios, $unUsuario);
			}				
		var_dump($ListaDeUsuarios);

	?>