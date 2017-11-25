<?php namespace Modelos;

class Admin extends Persona
{
	private $id_admin;
	
	
	function __construct($nomb,$ape,$domi,$tel){
		parent::__construct($nomb,$ape,$domi,$tel);
	}

	function getIdAdmin(){
		return $this->id_admin;
	}

	function setIdAdmin($id){
		$this->id_admin = $id;
	}
}

?>