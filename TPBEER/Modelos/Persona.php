<?php namespace Modelos;

class Persona
{
		private $nombre;
		private $apellido;
		private $domicilio;
		private $telefono;
	
	function __construct($nomb,$ape,$domi,$tel)
	{
		$this->setNombre($nomb);
		$this->setApellido($ape);
		$this->setDomicilio($domi);
		$this->setTelefono($tel);
	}

	public function getNombre(){
		return $this->nombre;
	}
	public function getApellido(){
		return $this->apellido;
	}
	public function getDomicilio(){
		return $this->domicilio;
	}
	public function getTelefono(){
		return $this->telefono;
	}

	public function setNombre($nomb){
		$this->nombre = $nomb;
	}
	public function setApellido($ape){
		$this->apellido = $ape;
	}
	public function setDomicilio($dom){
		$this->domicilio = $dom;
	}
	public function setTelefono($tel){
		$this->telefono = $tel;
	}



}
?>