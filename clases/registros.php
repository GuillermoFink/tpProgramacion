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
	private $_tiempo;
	private $_monto;

	#CONSTRUCTOR-------------------------------------------------------------------------------------------------------------
	function __construct($lugar,$usuario,$patente,$tiempo,$monto)
	{
		$this->_idLugar = $lugar;
		$this->_idUsuario = $usuario;
		$this->_patente = $patente;
		$this->_tiempo = $tiempo;
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
	public function GetTiempo()
	{
		return $this->_tiempo;
	}
	public function GetMonto()
	{
		return $this->_monto;
	}
}
?>