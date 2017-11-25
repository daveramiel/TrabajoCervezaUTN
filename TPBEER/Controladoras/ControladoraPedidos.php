<?php namespace Controladoras;

///uses

class ControladoraPedidos
{
	private $arrayPedidos = array();
	
	function __construct()
	{
		if (!isset($_SESSION['pedidos']))
		{
			$_SESSION['pedidos'] = $this->$arrayPedidos;
		}
	}

	function crearPedido($arrayP)
	{
		
	}
}


 ?>