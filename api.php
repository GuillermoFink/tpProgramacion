<?php
session_start();
require_once "vendor/autoload.php";
require_once "clases/usuarios.php";
require_once "clases/registros.php";
require_once "clases/lugares.php";
require_once "clases/vehiculo.php";


$app = new \Slim\App;

//GETS****************************************************************************************************************************
$app->get('/traertablaestacionados',function($request,$response)
	{
		$response->getbody()->write(Vehiculo::TablaEstacionados());

		return $response;
	});
$app->get('/traerTablaRegistros',function($request,$response)
	{
		$response->getbody()->write(Registros::TraerTablaRegistros());

		return $response;
	});
$app->get('/traerTablaUsuarios',function($request,$response)
	{
		$response->getBody()->write(Usuario::TablaUsuarios());

		return $response;
	});

//POSTS****************************************************************************************************************************
$app->post('/traerLugaresLibres',function($request,$response)
	{
		$pisos = $request->getParsedBody();
		$response->write(Lugares::LugaresLibres($pisos["piso"]));

		return $response;
	});
$app->post('/ingresarAuto',function($request,$response)
	{
		$datos = $request->getParsedBody();
		$unAuto = new Vehiculo($datos["patente"],$datos["lugar"],$datos["marca"],$datos["color"],time());
		$response->write(Vehiculo::IngresarAuto($unAuto));

		return $response;
	});
$app->post('/cerrarSesion',function($request,$response)
	{
		$datos = $request->getParsedBody();
		$response->write(Usuario::CerrarSesion($datos["cerrarSesion"],$datos["tiempo"]));

		return $response;
	});
$app->post('/retiroPorPatente',function($request,$response)
	{
		$datos= $request->getParsedBody();
		$response->write(Vehiculo::TraerAutoPorPatente($datos["retiroPorPatente"]));

		return $response;
	});
$app->post('/grillaLugares',function($request,$response)
	{
		$datos = $request->getParsedBody();
		$response->write(Lugares::GrillaLugares($datos["mapaLugares"]));

		return $response;
	});

//DELETES***************************************************************************************************************************
$app->delete('/RetirarAuto',function($request,$response)
	{
		$datos = $request->getParsedBody();
		$unRegistro = new Registros($datos["idlugar"],$datos["iduser"],$datos["pat"],$datos["hora"],time(),$datos["monto"]);
		Registros::IngresarRegistro($unRegistro);
		Lugares::LiberarLugar($datos["idlugar"]);
		Vehiculo::RetirarAuto($datos["pat"]);
		$respuesta = Vehiculo::TablaEstacionados();
		$response->write($respuesta);
		return $response;
	});
$app->run();
?>