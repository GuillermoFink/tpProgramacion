<?php
/**
* 
*/
class Usuario
{
	#ATRIBUTOS-----------------------------------------------------------------------------------
	private $_id;
	private $_nombre;
	private $_apellido;
	private $_tipo;
	private $_turno;

	#CONSTRUCTOR---------------------------------------------------------------------------------
	function __construct($nombre,$apellido,$tipo,$turno,$id=null)
	{
		$this->_id = $id;
		$this->_nombre = $nombre;
		$this->_apellido = $apellido;
		$this->_tipo = $tipo;
		$this->_turno = $turno;
	}

	#GETTERS Y SETTERS----------------------------------------------------------------------------
	public function GetId()
	{
		return $this->_id;
	}
	#---------------------------------------------------------------------------------------------
	public function GetNombre()
	{
		return $this->_nombre;
	}
	public function SetNombre($nombre)
	{
		$this->_nombre = $nombre
	}
	#---------------------------------------------------------------------------------------------
	public function GetApellido()
	{
		return $this->_apellido;
	}
	public function SetApellido($apellido)
	{
		$this->_apellido = $apellido;
	}
	#---------------------------------------------------------------------------------------------
	public function GetTipo()
	{
		return $this->_tipo;
	}
	public function SetTipo($tipo)
	{
		$this->_tipo = $tipo;
	}
	#---------------------------------------------------------------------------------------------
	public function GetTurno()
	{
		return $this->_turno;
	}
	public function SetTurno($turno)
	{
		$this->_turno = $turno;
	}
	#---------------------------------------------------------------------------------------------

	#ALTA DE USUARIO------------------------------------------------------------------------------
	public static function AltaUsuario($obj)
	{
		$resultado = FALSE;
		$pdo = new PDO("mysql:host = localhost; dbname=estacionamiento","root","");
		$db = $pdo->prepare("INSERT INTO usuarios (nombre,apellido,tipo,turno)VALUES(:nombre,:apellido,:tipo,:turno)");
		$db->bindValue(':nombre',$obj->GetNombre());
		$db->bindValue(':apellido',$obj->GetApellido());
		$db->bindValue(':tipo',$obj->GetTipo());
		$db->bindValue(':turno',$obj->GetTurno());
		if($db->execute())
		{
			$resultado = TRUE;
		}
		return $resultado;	
	}
	#BAJA DE USUARIO------------------------------------------------------------------------------
	public static function BajaUsuario($id)
	{
		$resultado = FALSE;
		$pdo = new PDO("mysql:host = localhost; dbname=estacionamiento","root","");
		$db = $pdo->prepare("DELETE FROM usuarios WHERE id = :id");
		$db->bindValue(':id',$id);
		if ($db->execute())
		{
			$resultado = TRUE;
		}
		return $resultado;
	}
	#MODIFICACION DE USUARIO-----------------------------------------------------------------------
	public static function ModiUsuario($obj)
	{
		$resultado = FALSE;
		$pdo = new PDO("mysql:host = localhost; dbname=estacionamiento","root","");
		$db = $pdo->prepare("UPDATE usuarios SET nombre=:nombre, apellido=:apellido, tipo=:tipo, turno=:turno WHERE id=:id");
		$db->bindValue(':nombre',$obj->GetNombre());
		$db->bindValue(':apellido',$obj->GetApellido());
		$db->bindValue(':tipo',$obj->GetTipo());
		$db->bindValue(':turno',$obj->GetTurno());
		$db->bindValue(':id',$obj->GetId());
		if($db->execute())
		{
			$resultado = TRUE;
		}
		return $resultado;
	}
	#TRAER ARRAY USUARIOS---------------------------------------------------------------------------
	public static function TraerUsuarios()
	{
		$ListaDeUsuarios = array();
		$pdo = new PDO("mysql:host = localhost; dbname=estacionamiento","root","");
		$contenido = $pdo->query("SELECT * FROM usuarios");
		while($linea = $contenido->fetch(PDO::FETCH_ASSOC))
			{
				$unAuto = new Vehiculo($linea["nombre"],$linea["apellido"],$linea["tipo"],$linea["turno"],$linea["id"]);
				array_push($ListaDeUsuarios, $unAuto);
			}				
		return $ListaDeUsuarios;
	}
}
?>