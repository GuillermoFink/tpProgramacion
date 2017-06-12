<?php
session_start();
require_once "vendor/autoload.php";
require_once "clases/usuarios.php";
require_once "clases/registros.php";
require_once "clases/lugares.php";
require_once "clases/vehiculo.php";


$app = new \Slim\App;

$app->get('/traertablaestacionados',function($request,$response)
	{
		$response->getbody()->write(Vehiculo::TablaEstacionados());

		return $response;
	});
$app->post('/ingresarAuto',function($request,$response)
	{
		$datos = $request->getParsedBody();
		$unAuto = new Vehiculo($datos["patente"],$datos["lugar"],$datos["marca"],$datos["color"],time());
		$response->write(Vehiculo::IngresarAuto($unAuto));

		return $response;
	});
$app->run();
?>