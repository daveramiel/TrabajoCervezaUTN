<?php namespace Modelos;

class Cliente extends Persona
{
	private $id_cliente;

	function __construct($nomb,$ape,$domi,$tel){
		parent::__construct($nomb,$ape,$domi,$tel);
	}

	function getIdCliente(){
		return $this->id_cliente;
	}

	function setIdCliente($id){
		$this->id_cliente = $id;
	}
}
?>