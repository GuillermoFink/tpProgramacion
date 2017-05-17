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
	if(Usuario::LoginUser($_POST["user"],$_POST["pw"]))
	{
		echo "Ok";
		#echo $_SESSION["tipo"];
	}else
	{
		echo "Usuario o Password incorrecto";
	}
}
?>