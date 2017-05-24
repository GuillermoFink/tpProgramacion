<?php
/**
* 
*/
class Vehiculo
{
	#ATRIBUTOS-----------------------------------------------------------------------
	private $_idLugar;
	private $_color;
	private $_patente;
	private $_marca;
	private $_horaIngreso;

	#CONSTRUCTOR---------------------------------------------------------------------
	function __construct($patente,$idLugar,$marca=null,$color=null,$hora=null)
	{
		$this->_patente = $patente;
		$this->_color = $color;
		$this->_marca = $marca;
		$this->_idLugar = $idLugar;
		$this->_horaIngreso = $hora;
	}

	#GETTERS Y SETTERS---------------------------------------------------------------
	public function GetId()
	{
		return $this->_idLugar;
	}
	#--------------------------------------------------------------------------------
	public function GetHora()
	{
		return $this->_horaIngreso;
	}
	#--------------------------------------------------------------------------------
	public function GetColor()
	{
		return $this->_color;
	}
	public function SetColor($color)
	{
		$this->_color = $color;
	}
	#--------------------------------------------------------------------------------
	public function GetPatente()
	{
		return $this->_patente;
	}
	public function SetPatente($patente)
	{
		$this->_patente = $patente;
	}
	#--------------------------------------------------------------------------------
	public function GetMarca()
	{
		return $this->_marca;
	}
	public function SetMarca($marca)
	{
		$this->_marca = $marca;
	}
	#--------------------------------------------------------------------------------


	#INSERTAR AUTO EN DB-------------------------------------------------------------
	public static function IngresarAuto($obj)
	{
		$resultado = FALSE;
		$pdo = new PDO("mysql:host = localhost; dbname=estacionamiento","root","");
		$db = $pdo->prepare("INSERT INTO autos (id_lugar,patente,marca,color,hora)VALUES(:idLugar,:patente,:marca,:color,:hora)");
		$db->bindValue(':patente',$obj->GetPatente());
		$db->bindValue(':marca',$obj->GetMarca());
		$db->bindValue(':color',$obj->GetColor());
		$db->bindValue(':hora',$obj->GetHora());
		$db->bindValue(':idLugar',$obj->GetId());
		if($db->execute())
		{
			$resultado = TRUE;
		}
		return $resultado;		
	}

	#ELIMINAR AUTO DE DB-------------------------------------------------------------
	public static function RetirarAuto($patente)
	{
		$resultado = FALSE;
		$pdo = new PDO("mysql:host = localhost; dbname=estacionamiento","root","");
		$db = $pdo->prepare("DELETE FROM autos WHERE patente = :patente");
		$db->bindValue(':patente',$patente);
		if ($db->execute())
		{
			$resultado = TRUE;
		}
		return $resultado;
	}

	#ARRAY DE AUTOS------------------------------------------------------------------
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
	#TABLA DE VEHICULOS-----------------------------------------------------------------
	public static function TablaEstacionados()
	{
		$estacionados = array();
		$estacionados = Vehiculo::TraerAutosEstacionados();
		$inicio = "<table class='table table-hover'>
						<thead>
							<tr class='info'>
								<th>Patente</th>
								<th>Lugar</th>
								<th>Marca</th>
								<th>Color</th>
								<th>Hora</th>
								<th>Monto Actual</th>
								<th>Accion</th>
							</tr>
						</thead>";
		$fin= "</table>";
		$datos= "";
		foreach ($estacionados as $auto)
		{
			$actual = time();
			$tiempo = $actual - $auto->GetHora();
			$horas = round(($tiempo/60)/60,2);
			$monto = $horas * 10;
			$datos.= "<tr>
						<td>".$auto->GetPatente()."</td>
						<td>".$auto->GetId()."</td>
						<td>".$auto->GetMarca()."</td>
						<td>".$auto->GetColor()."</td>
						<td>".$horas."</td>
						<td>".$monto."</td>
						<td>
							<button class='btn btn-danger' 
								onclick='RetirarVehiculo(\"".$_SESSION["id"]."\",\"".$auto->GetPatente()."\",\"".$auto->GetHora()."\",\"".$monto."\",\"".$auto->GetId()."\")'>Retirar</button>
						</td>
					</tr>";
		}
		echo $inicio.$datos.$fin;
	}
	public static function CalcularMonto($tiempo)
	{
		$actual = time();
		$tiempo = $actual - $tiempo;
		$horas = round(($tiempo/60)/60,2);
		$monto = $horas*10;
		return $monto;
	}
	public static function TraerAutoPorPatente($patente)
	{
		# LLEGA BIEN $respuesta = $patente;
		$respuesta="Patente no encontrada";
		$pdo = new PDO("mysql:host = localhost; dbname=estacionamiento","root","");
		$db = $pdo->prepare("SELECT patente,id_lugar,hora  FROM autos WHERE patente=:pat");
		$db->bindValue(':pat',$patente);
		$db->execute();
		while($linea = $db->fetch(PDO::FETCH_ASSOC))
			{
				$monto = Vehiculo::CalcularMonto($linea["hora"]);
				$patente = $linea["patente"];
				$lugar = $linea["id_lugar"];
				$hora = $linea["hora"];
				$respuesta = $_SESSION["id"]."*".$patente."*".$lugar."*".$hora."*".$monto;
			}				
		return $respuesta;
	}	
}
?>