<?php
/**
* 
*/
class Registros
{
	#ATRIBUTOS--------------------------------------------------------------------------------------------------------------
	private $_idLugar;
	private $_idUsuario;
	private $_patente;
	private $_entrada;
	private $_monto;

	#CONSTRUCTOR-------------------------------------------------------------------------------------------------------------
	function __construct($lugar,$usuario,$patente,$entrada,$salida,$monto)
	{
		$this->_idLugar = $lugar;
		$this->_idUsuario = $usuario;
		$this->_patente = $patente;
		$this->_entrada = $entrada;
		$this->_salida= $salida;
		$this->_monto = $monto;
	}

	#GETTERS Y SETTERS-------------------------------------------------------------------------------------------------------
	public function GetLugar()
	{
		return $this->_idLugar;
	}
	public function GetUsuario()
	{
		return $this->_idUsuario;
	}
	public function GetPatente()
	{
		return $this->_patente;
	}
	public function GetMonto()
	{
		return $this->_monto;
	}
	public function GetEntrada()
	{
		return $this->_entrada;
	}
	public function GetSalida()
	{
		return $this->_salida;
	}
	#INGRESO REGISTRO----------------------------------------------------------------------------------------------------------------------------
	public static function IngresarRegistro($obj)
	{
		$resultado = FALSE;
		$pdo = new PDO("mysql:host = localhost; dbname=estacionamiento","root","");
		$db = $pdo->prepare("INSERT INTO registros (id_lugar,id_usuario,patente,hora_inicio,hora_fin,monto)
								VALUES(:idLugar,:idUsuario,:patente,:inicio,:fin,:monto)");
		$db->bindValue(':idLugar',$obj->GetLugar());
		$db->bindValue(':idUsuario',$obj->GetUsuario());
		$db->bindValue(':patente',$obj->GetPatente());
		$db->bindValue(':inicio',$obj->GetEntrada());
		$db->bindValue(':fin',$obj->GetSalida());
		$db->bindValue(':monto',$obj->GetMonto());
		if ($db->execute())
		{
			$resultado = TRUE;
		}
		return $resultado;
	}
	#ARRAY DE REGISTROS---------------------------------------------------------------------------------------------------------------------------
	public static function TraerAutosEstacionados()
	{
		$ListaDeAutos = array();
		$pdo = new PDO("mysql:host = localhost; dbname=estacionamiento","root","");
		$contenido = $pdo->query("SELECT * FROM autos");
		while($linea = $contenido->fetch(PDO::FETCH_ASSOC))
			{
				$unAuto = new Vehiculo($linea["patente"],$linea["id_lugar"],$linea["marca"],$linea["color"],$linea["hora"]);
				array_push($ListaDeAutos, $unAuto);
			}				
		return $ListaDeAutos;
	}
	#TABLA REGISTROS------------------------------------------------------------------------------------------------------------------------------
	public static function TraerTablaRegistros()
	{

	}
}
?>