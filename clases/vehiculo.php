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
		$this->_horaIngreso = time();
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
	public static function RetirarAuto($obj)
	{
		$resultado = FALSE;
		$pdo = new PDO("mysql:host = localhost; dbname=estacionamiento","root","");
		$db = $pdo->prepare("DELETE FROM autos WHERE patente = :patente");
		$db->bindValue(':patente',$obj->GetPatente());
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
		$estacionados = array()
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
							</tr>
						</thead>";
		$fin= "</table>";
		$datos= "";
		foreach ($estacionados as $auto)
		{
			$tiempo = time()-$auto->GetHora();
			$horas = ($tiempo/60)/60;
			$datos.= "<td>".."</td>";
		}
	}
	public static function CalcularMonto($tiempo)
	{
		$estadia = time()-$tiempo;
		$horas = ($estadia/60)/60;
		
	}	
}
?>