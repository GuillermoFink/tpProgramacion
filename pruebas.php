	<?php
		include_once "clases/lugares.php";
		$piso=1;
		$inicio="<select>";
		$fin = "</select>";
		$datos = "";
		$pdo = new PDO("mysql:host = localhost; dbname=estacionamiento","root","");
		$db = $pdo->prepare("SELECT * FROM lugares WHERE id_piso = :piso");
		$db->bindValue(':piso',$piso);
		$db->execute();
		while($linea = $db->fetch(PDO::FETCH_ASSOC))
		{
			if ($linea["ocupado"] != true)
			{
				$datos.="<option>".$linea["id_lugar"]."</option>";
			}
		}
		echo $inicio.$datos.$fin;
	/*
		include_once 'clases/usuarios.php';
		$lalala = time();
		echo Usuario::CerrarSesion(1,$lalala);
*/


		#FORMATEO DE HORA------------------------------------------------------------------------------------------------
		/*
		$hora = time();
		$lala2 = getdate($hora);
		$dia = $lala2["mday"];
		$mes = $lala2["mon"];
		$anio = $lala2["year"];
		$hora = $lala2["hours"];
		$minuto = $lala2["minutes"];
		$lala = date($dia."-".$mes."-".$anio."  ".$hora.":".$minuto);
		echo $lala;
		*/
	?>