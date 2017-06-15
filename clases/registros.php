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
	public static function TraerRegistros()
	{
		$ListaDeRegistros = array();
		$pdo = new PDO("mysql:host = localhost; dbname=estacionamiento","root","");
		$contenido = $pdo->query("SELECT * FROM registros");
		while($linea = $contenido->fetch(PDO::FETCH_ASSOC))
			{
				$unRegistro = new Registros($linea["id_lugar"],$linea["id_usuario"],$linea["patente"],$linea["hora_inicio"],$linea["hora_fin"],$linea["monto"]);
				array_push($ListaDeRegistros, $unRegistro);
			}				
		return $ListaDeRegistros;
	}
	#TABLA REGISTROS------------------------------------------------------------------------------------------------------------------------------
	public static function TraerTablaRegistros()
	{
		$inicio = "<table class='table table-hover'>
						<thead>
							<tr class='info'>
								<th>Lugar</th>
								<th>Usuario</th>
								<th>Patente</th>
								<th>Entrada</th>
								<th>Salida</th>
								<th>Monto</th>
							</tr>
						</thead>";
		$fin= "</table>";
		$datos= "";
		$registros = array();
		$registros = Registros::TraerRegistros();
		foreach ($registros as $item)
		{
			$entrada = date("d-m-y H:i:s",$item->GetEntrada());
			$salida = date("d-m-y H:i:s",$item->GetSalida());
			$datos.="<tr>
						<td>".$item->GetLugar()."</td>
						<td>".$item->GetUsuario()."</td>
						<td>".$item->GetPatente()."</td>
						<td>".$entrada."</td>
						<td>".$salida."</td>
						<td>".$item->GetMonto()."</td>
					</tr>";
		}
		echo $inicio.$datos.$fin;
	}
	public static function TablaFiltros()
	{
		$datos= "<div>
					<select id='selectFiltro' onchange='TablaFiltrada()'>
						<option>Usuario</option>
						<option selected='selected'>Cochera</option>
						<option>Cochera menos usada</option>
					</select>
				</div>
				<div id='resultadoFiltro'>

				</div>";

		return $datos;
	}
	public static function RegistrosFiltrados($condicion)
	{
		switch ($condicion)
		{
			case 'Usuario':
				$titulo = "Registros de Usuarios";
				$datos = Registros::InformacionUsuarios();
				break;
			
			default:
				$datos = "NULL";
				break;
		}
		$inicio= "<center><h3>".$titulo."</h3></center>
				<table class='table table-hover'>";		
		
		$fin ="</table>";	

		echo $inicio.$datos.$fin;
	}
	public static function InformacionUsuarios()
	{
		$titulos = "<th>
						<tr class='info'>
							<td>Nombre</td>
							<td>Apellido</td>
							<td>Log In</td>
							<td>Log Out</td>
						</tr>
					</th>";
		$datos="";
		$pdo = new PDO("mysql:host = localhost; dbname=estacionamiento","root","");
		$contenido = $pdo->query("SELECT usu.nombre, usu.apellido, regusu.login, regusu.logout FROM 
								  registro_usuarios AS regusu, usuarios AS usu 
								  WHERE usu.id = regusu.id_usuario");
		while($linea = $contenido->fetch(PDO::FETCH_ASSOC))
			{
				$datos.="<tr>
							<td>".$linea["nombre"]."</td>
							<td>".$linea["apellido"]."</td>
							<td>".$linea["login"]."</td>
							<td>".$linea["logout"]."</td>
						</tr>";
			}
		return $titulos.$datos;		
	}
	public static function OperacionesPorUsuario()
	{
		$titulos = "<th>
						<tr class='success'>
							<td>Nombre</td>
							<td>Apellido</td>
							<td>Operaciones</td>
							<td>Monto</td>
						</tr>
					<th>";
		$datos="";
		$pdo = new PDO("mysql:host = localhost; dbname=estacionamiento", "root","");
		$contenido = $pdo->query("SELECT usu.nombre,usu.apellido,count(reg.id_usuario),sum(reg.monto) FROM usuarios AS usu, registros AS reg WHERE usu.id = reg.id_usuario");
	}
}
?>