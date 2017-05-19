	<?php
		include_once 'clases/usuarios.php';
		$lalala = time();
		echo Usuario::CerrarSesion(1,$lalala);



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