	<?php

$pdo = new PDO("mysql:host = localhost; dbname=estacionamiento","root","");
		$db = $pdo->prepare("INSERT INTO autos (id_lugar,patente,marca,color,hora)VALUES(:idLugar,:patente,:marca,:color,:hora)");
		$db->bindValue(':patente',"aaa 123");
		$db->bindValue(':marca',"audi");
		$db->bindValue(':color',"rojo");
		$db->bindValue(':hora',time());
		$db->bindValue(':idLugar',102);
		var_dump($db->execute());
		/*
	$pdo = new PDO("mysql:host = localhost; dbname=estacionamiento","root","");
		$db = $pdo->prepare("INSERT INTO lugares (`id_piso`, `id_lugar`, `ocupado`, `discapacitado`)VALUES(:piso,:lugar,:ocupado,:discapacitado)");
		$db->bindValue(':discapacitado',false);
		$db->bindValue(':piso',1);
		$db->bindValue(':lugar',101);
		$db->bindValue(':ocupado',false);
		$rta=$db->execute();
			var_dump($rta);*/
		
	/*
		$rta = false;
		$pdo = new PDO("mysql:host = localhost; dbname=estacionamiento","root","");
		$db = $pdo->prepare("INSERT INTO lugares (id_piso,id_lugar,ocupado,discapacitado)VALUES(:piso,:lugar,:ocupado,:discapacitado");
		$piso1 = 100;
		$piso2 = 200;
		$piso3 = 300;
		for ($i = 0 ; $i < 30 ; $i++)
		{
			if($i < 3)
			{
				$db->bindValue(':discapacitado',true);
			}else
			{
				$db->bindValue(':discapacitado',false);
			}
			$num = $piso1+$i;
			$db->bindValue(':piso',1);
			$db->bindParam(':lugar',$num);
			$db->bindValue(':ocupado',false);
			$rta=$db->execute();
			var_dump($rta);
		}
		for ($i = 0 ; $i < 30 ; $i++)
		{
			if($i < 3)
			{
				$db->bindValue(':discapacitado',true);
			}else
			{
				$db->bindValue(':discapacitado',false);
			}
			$num = $piso2+$i;
			$db->bindValue(':piso',2);
			$db->bindValue(':lugar',$num+$i);
			$db->bindValue(':ocupado',false);
			$db->bindValue(':discapacitado',false);
			$rta=$db->execute();
			var_dump($rta);
		}
		for ($i = 0 ; $i < 30 ; $i++)
		{
			if($i < 3)
			{
				$db->bindValue(':discapacitado',true);
			}else
			{
				$db->bindValue(':discapacitado',false);
			}
			$num = $piso3+$i;
			$db->bindValue(':piso',3);
			$db->bindValue(':lugar',$num);
			$db->bindValue(':ocupado',false);
			$db->bindValue(':discapacitado',false);
			$rta=$db->execute();
			var_dump($rta);
		}
		echo $rta;
		var_dump($rta);
	*/
	?>