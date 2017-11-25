<?php namespace Controladoras;

use \DAOS\DAOS_baseDatos\DAOUsuariosBD as DAOUsuario;
use \Modelos\Cuenta as Cuenta;
use \Modelos\Cliente as Cliente;

class ControladoraCuentas
{	
		private $cuent;

		private $daoUsuario;


		function __construct()
		{
			$this->daoUsuario = DAOUsuario::getInstance();
		}

	public function Cuenta()
	{
		require("Vistas/Cuenta.php");
	}	

	public function Buscar($parametro)#Read 
	{	
		$cuent= null;

		if(strstr($parametro,'@',true))
		{
			$cuent= $this->daoCuenta->buscarXemail($parametro);
			#llama a buscar dao por email;
			require("vista");#VISTAA
		}
		else 
		{
			$cuent = $this->daoCuenta->bucarNombre($parametro);
			#busca por nombre la cuenta.
			require("vista");#VISTAA 
		}

	}

	public function Borrar($name)#Delete 
	{
		if ($name != null) 
		{
			$flag= $this->daoCuenta->borrar($name);

			#$classe='Cuenta';// si despues decido mostrar que se elimino.

			if($flag == true)
			{
			
				require('Vista/exito.php');
			}

			else
			{

			require('Vista/NotDelete.php');

			}
		}
		else
		{
			echo "<script> if(confirm('Ingrese el nombre'));";

			require("vista");# idem-VISTAA
		}
	}

	public function ModificarUser($parametro, $newvalor)
	#Update ver si paso el usuario o no
	{
		$cuent=Buscar($parametro);

		$cuent->setUsuario($newvalor);
	
		Insertar();

	}


	public function insertar($nombre,$apellido,$domicilio,$telefono,$email,$pass) 
	{	
		if ($this->verificacion($email,$pass,$nombre,$apellido,$domicilio,$telefono))
		{
			$nuevoCliente = new Cliente($nombre,$apellido,$domicilio,$telefono);

			if ($this->daoUsuario->buscarNombre($email) == null ) 
			{
				$nuevaCuenta = new Cuenta($email,$pass,$nuevoCliente);#creo un objeto cuenta
			}

			$this->daoUsuario->guardar($nuevaCuenta);#llamo al dao e inserto;
			echo "<script> if(confirm('Eeeeexito'))</script>;";
			include_once("Vistas/login.php");

		}
		else
		{
			include_once('algo no esta cargado correctamente');
		}


	}
		private function verificacion(...$Arraykeys)
	{
		$flag= true;

		foreach($Arraykeys as $key => $value)
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