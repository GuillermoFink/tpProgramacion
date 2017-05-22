<?php
session_start();
include_once 'clases/lugares.php';
include_once 'clases/vehiculo.php';
include_once 'clases/usuarios.php';

if (isset($_POST["queHago"]))
{
	if(Lugares::PrimerUso())
	{
		echo "ok";
	}else
	{
		echo "no ok";
	}
}
if(isset($_POST["pat"]) && isset($_POST["marca"]) && isset($_POST["color"]) && isset($_POST["lugar"]))
{
	$miauto = new Vehiculo($_POST["pat"],$_POST["lugar"],$_POST["marca"],$_POST["color"],time());
	if (Vehiculo::IngresarAuto($miauto) && Lugares::OcuparLugar($miauto->GetId()))
	{
		echo "ok";
	}else
	{
		echo "no ok";
	}
}
if(isset($_POST["user"]) && isset($_POST["pw"]))
{
	$rta="Usuario o Password incorrecto";
	if(Usuario::LoginUsuario($_POST["user"],$_POST["pw"]))
	{
		$rta="Ok";
	}
	echo $rta;
}
if(isset($_POST["idParaEliminar"]))
{
	if (Usuario::BajaUsuario($_POST["idParaEliminar"]))
	{
		Usuario::TablaUsuarios();
	}else
	{
		echo "error";
	}
}
if(isset($_POST["cerrarSesion"]))
{
	if(Usuario::CerrarSesion($_POST["cerrarSesion"],$_POST["tiempo"]))
	{
		session_destroy();
		echo "ok";
	}else
	{
		echo "error";
	}
}
if(isset($_POST["piso"]))
{
	Lugares::LugaresLibres($_POST["piso"]);
}
if(isset($_POST["marca"]) && isset($_POST["color"]) && isset($_POST["patente"]) && isset($_POST["lugar"]))
{
	$miauto = new Vehiculo($_POST["patente"],$_POST["lugar"],$_POST["marca"],$_POST["color"],time());
	if(Vehiculo::IngresarAuto($miauto))
	{
		if(Lugares::OcuparLugar($miauto->GetId()))
		{
			Vehiculo::TablaEstacionados();	
		}else
		{
			echo "error";
		}
		
	}else
	{
		echo "error";
	}
}
?>