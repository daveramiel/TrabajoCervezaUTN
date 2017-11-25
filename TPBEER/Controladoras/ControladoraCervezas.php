<?php namespace Controladoras;

//use \DAOS\DAOS_listas\DAOCervezas as DAOCervezas;
use \DAOS\DAOS_baseDatos\DAOCervezasBD as DAOCervezas;
use \Modelos\Cerveza as Cervezas;

class ControladoraCervezas
{	
	private $cerveza;
	private $DaoCerveza;
	
	function __construct()
	{
		$this->DaoCerveza = DAOCervezas::getInstance();
	}

	function Cerveza()
	{
		require("Vistas/Cerveza.php");
	}

	function insertar($nombre,$color,$precio,$descripcion)
	{
		$nuevaCerveza = new Cervezas($nombre,$color,$precio,$descripcion,1);

		$this->DaoCerveza->guardar($nuevaCerveza);

		if (isset($this->DaoCerveza)){
			include_once("Vistas/Exito.php");
		}

	}

	function buscarXnombre($name)
	{	

		$this->cerveza = $this->DaoCerveza->buscarNombre($name);
		if (isset($this->cerveza))
		{
			include_once("Vistas/ListarCerveza.php");#VISTAA 

		}
		else
		{
			echo '<script type="text/javascript">alert("Cerveza no encontrada");</script>';
			include_once("Vistas/BuscarCerveza.php");
		}

	}


	public function modificar($beerMod,$nombre,$receta,$precioxLT,$descripcion)
	{	
		$Arraykeys= [$nombre,$receta,$precioxLT,$descripcion];
		$flag= true;

		foreach($arraykey as $key => $value)
		{

			if(isset($value) && !empty($value))
			{
				$flag=flase;
			}
		}

		if ($flag)
		{
			$nuevaCerveza = new Cervezas($nombre,$color,$precioxLT,$descripcion);
			$nuevaCerveza->setID($beerMod->getID());

			$this->Cerveza = $nuevaCerveza;
			$this->DaoCervezas->modificar($this->Cerveza);
		}

		else
		{
			#ver si agrego
			require('vista error falta llenar lugares');
		}



	}

	public function borrar($name)
	{

		$flag = $this->DaoCervezas->borrar($name);

		#$classe='Cerveza';// si despues decido mostrar que se elimino.

		if($flag== true)
		{
			
			require('Vista/exito.php');
		}

		else
		{

			require('Vista/NotDelete.php');

		}

	}

	private function verificacion(...$Arraykeys)
	{
		$flag= true;

		foreach($arraykey as $key => $value)
		{

			if(isset($value) && !empty($value))
			{
				$flag=false;
			}
		}
		return $flag;
	}
	function traerTodas()
	{
		$cervezaArray=array();
		$cervezaArray= $this->DaoCerveza->listarActivos();
		include_once("Vistas/ListarCerveza.php");
	}

		function Catalogo()
	{
		$cervezaArray=array();
		$cervezaArray= $this->DaoCerveza->listarActivos();
		include_once("Vistas/catalogo.php");
	}
}

?>
