<?php
/**
* 
*/
class Usuario
{
	#ATRIBUTOS-----------------------------------------------------------------------------------
	private $_id;
	private $_password;
	private $_nombre;
	private $_apellido;
	private $_tipo;
	private $_turno;

	#CONSTRUCTOR---------------------------------------------------------------------------------
	function __construct($nombre,$password,$apellido,$tipo,$turno,$id=null)
	{
		$this->_id = $id;
		$this->_nombre = $nombre;
		$this->_password = $password;
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
	public function GetPassword()
	{
		return $this->_password;
	}
	#---------------------------------------------------------------------------------------------
	public function GetNombre()
	{
		return $this->_nombre;
	}
	public function SetNombre($nombre)
	{
		$this->_nombre = $nombre;
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
		$db = $pdo->prepare("INSERT INTO usuarios (nombre,password,apellido,tipo,turno)VALUES(:nombre,:password,:apellido,:tipo,:turno)");
		$db->bindValue(':nombre',$obj->GetNombre());
		$db->bindValue(':password',$obj->GetPassword());
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
				$unUsuario = new Usuario($linea["nombre"],$linea["password"],$linea["apellido"],$linea["tipo"],$linea["turno"],$linea["id"]);
				array_push($ListaDeUsuarios, $unUsuario);
			}				
		return $ListaDeUsuarios;
	}

	public static function LoginUsuario($usuario,$password)
	{
		$rta = false;
		$pdo = new PDO("mysql:host = localhost; dbname=estacionamiento","root","");
		$db = $pdo->prepare("SELECT * FROM usuarios WHERE nombre=:nombre AND password=:password");
		$db->bindValue(':nombre',$usuario);
		$db->bindValue(':password',$password);
		$db->execute();
		while($linea = $db->fetch(PDO::FETCH_ASSOC))
		{
			$unUsuario = new Usuario($linea["nombre"],$linea["password"],$linea["apellido"],$linea["tipo"],$linea["turno"],$linea["id"]);
		}
		if(isset($unUsuario))
		{
			$_SESSION["id"]= $unUsuario->GetId();
			$_SESSION["nombre"] = $unUsuario->GetNombre();
			$_SESSION["turno"] = $unUsuario->GetTurno();
			$_SESSION["tipo"] = $unUsuario->GetTipo();
			$_SESSION["login"] = time();
			$_SESSION["apellido"] = $unUsuario->GetApellido();
			$rta =true;			
		}
		return $rta;
	}

	/*public static function LoginUser($usuario,$password)
	{
		$misUsuarios = array();
		$misUsuarios = Usuario::TraerUsuarios();
		$rta = FALSE;
		foreach ($misUsuarios as $users)
			{
				if($users->GetNombre()==$usuario && $users->GetPassword()==$password)
				{
					$_SESSION["id"]= $users->GetId();
					$_SESSION["nombre"] = $users->GetNombre();
					$_SESSION["turno"] = $users->GetTurno();
					$_SESSION["tipo"] = $users->GetTipo();
					$_SESSION["login"] = time();
				}
				if(isset($_SESSION["nombre"]) && isset($_SESSION["tipo"]))
				{
					$rta = TRUE;
				}
			}
		return $rta;	
	}*/
	public static function CerrarSesion($id,$login)
	{
		$rta = FALSE;
		$inicio = Usuario::GenerarDate($login);
		$fin = Usuario::GenerarDate(time());
		$pdo = new PDO("mysql:host = localhost; dbname=estacionamiento","root","");
		$db = $pdo->prepare("INSERT INTO registro_usuarios (id_usuario,login,logout)VALUES(:id,:login,:logout)");
		$db->bindValue(':id',$id);
		$db->bindValue(':login',$inicio);
		$db->bindValue(':logout',$fin);
		if($db->execute())
		{
			$rta = TRUE;
		}
		return $rta;
	}
	public static function GenerarDate($timestamp)
	{
		$fecha = getdate($timestamp);
		$dia = $fecha["mday"];
		$mes = $fecha["mon"];
		$anio = $fecha["year"];
		$hora = $fecha["hours"];
		$minuto = $fecha["minutes"];
		$fechaFormateada = date($dia."-".$mes."-".$anio."  ".$hora.":".$minuto);
		return $fechaFormateada;
	}
	public static function TablaUsuarios()
	{
		$inicio = "<table class='table table-hover'>
						<thead>
							<tr class='info'>
								<th>Id</th>
								<th>Nombre</th>
								<th>Apellido</th>
								<th>Turno</th>
								<th>Tipo</th>";
								if($_SESSION["tipo"] == "admin")
								{
									$inicio.="<th>Accion</th>
												</tr>
											</thead>";	
								}else
									{
										$inicio.="</tr>
													</thead>";
									}
		$fin = "</table>";
		$datos = "";
		$misUsuarios = array();
		$misUsuarios = Usuario::TraerUsuarios();
		foreach ($misUsuarios as $users)
		{
			$datos.="<tr>
						<td>".$users->GetId()."</td>
						<td>".$users->GetNombre()."</td>
						<td>".$users->GetApellido()."</td>
						<td>".$users->GetTurno()."</td>
						<td>".$users->GetTipo()."</td>";
						if($_SESSION["tipo"] == "admin")
						{
							$datos.="<td>
										<button class='btn btn-danger btn-xs' onclick='EliminarUsuario(\"".$users->GetId()."\")'>Eliminar</button>
										<button class='btn btn-success btn-xs' >Modificar</button>
										<button class='btn btn-warning btn-xs' >Suspender</button>
									</td>";
						}
						else
							{
								$datos.="</tr>";
							}
		}
		echo $inicio.$datos.$fin;
	}
	
}
?>