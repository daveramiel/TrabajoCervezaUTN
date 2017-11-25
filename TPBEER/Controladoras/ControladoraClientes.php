<?php namespace Controladoras;

use Modelos\Cliente as cliente;
use DAOS\DaoClientes as Daocliente;


class ControladoraClientes
{	
	private $cliente;
	private $DaoClientes;
	
	function __construct()
	{
		$this->DaoClientes=DaoClientes::getInstance();
	}

	function cliente()
	{
		require("Vistas/Cliente.php");
	}

	function insertar($nombre,$apellido,$domicilio,$telefono)
	{
		if(verificacion($nombre,$apellido,$domicilio,$telefono))
		{
			$nuevoCliente = new Clientes($nombre,$apellido,$domicilio,$telefono);
			$this->DaoClientes->insert($nuevoCliente);
			#include
			#vista despues de ingresar exitosamente un cliente
		}
		else
		{
			#include
			#vista error por default
		}

		#si el if y el else no funciona borrarlo que no afecta a la logica del sistema.
	}

	function buscarXnombre($name)
	{	

		$this->cliente = $this->DaoClientes->buscarNombre($name);

		if ($cliente!= null)
		{
			require("vista");#VISTAA
			#esta vista tendria muestra un cliente luego de ser buscado. 

		}
		else
		{
			echo "<script> if(confirm('el cliente ingresado no existe'));";
			require("vista");#VISTAA
			#esta vista muestra un error al buscar un cliente inexistente
		}

	}

	public function modificar($beerMod)
	{
		$this->cliente = $clienteAmodificar;

		$beer->setUsuario($newvalor);

		
		Insertar();

	}

	private function verificacion(...$Arraykeys)
	{
		$flag= true;

		foreach($arraykey as $key => $value)
		{

			if(!isset($value) && empty($value))
			{
				$flag= false;
			}
		}
		return $flag;
	}

}

?>