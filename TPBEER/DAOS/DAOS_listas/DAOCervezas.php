<?php namespace DAOS\DAOS_listas;
	
	use \DAOS\SingletonAbstractDAO as SingletonAbstractDAO;
	use \DAOS\IDAO as IDAO;
	use \Modelo\Cerveza as Cerveza;
	
	class DAOCervezas extends SingletonAbstractDAO implements IDAO
	{
		
		private $arrayCervezas = array();

		public function __construct()
		{
			if(isset($_SESSION['cerveza']))
			{

				$this->arrayCervezas = $_SESSION['cerveza'];
			}
			else
			{
				$_SESSION['cerveza'] = $this->arrayCervezas;//no estoy seguro de esto
			}
		}

		public function listar()
		{
			$rta = null;
			if(isset($_SESSION['cerveza']))
			{
				$rta = $_SESSION['cerveza'];
			}
			return $rta;
		}

		public function guardar($element)
		{
			$rta = false;
			$flag = end($this->arrayCervezas);//me posiciono en el ultimo elemento del arreglo y extrae una copia
			if ($flag){
				$element->setIdCerveza($flag->getIdCerveza()+1);//le sumo 1 al id del ultimo elemento	
			}
			else
				$element->setIdCerveza = 1;
			
			if(array_push($this->arrayCervezas, $element))
			{
				$rta = true;//seteo variable de retorno
			}
			$_SESSION['cerveza'] = $this->arrayCervezas;
			return $rta;///retorna true si se pudo guardar, false si no se pudo
		}

		public function buscarNombre($nomb){
			$rta = null;
			foreach ($this->arrayCervezas as $key => $value)
			{
				if(strcmp($value->getNombre(),$nomb)==0)///si el nombre coincide
				{
					$rta = $value;///guardo la cerveza
				}
			}
			$_SESSION['cerveza'] = $this->arrayCervezas;
			return $rta;///devuelvo la cerveza, sino null
		}

		public function modificar($element)
		{
			$rta = false;
			foreach ($this->arrayCervezas as $key => $value)
			{
				if($value->getIdCerveza() == $element->getIdCerveza())
				{
					$value = $element;///remplazo la cerveza del arreglo con la nueva cerveza
					$rta = true;
				}
			}
			$_SESSION['cerveza'] = $this->arrayCervezas;
			return $rta;
		}

		public function borrar($nomb)
		{
			$rta = false;
			foreach ($this->arrayCervezas as $key => $value)
			{
				if($value->getNombre() == $nomb)
				{
					unset($this->arrayCervezas[$key]);///unset borra y reacomoda los indices del arreglo.
					$rta = true;
				}
			}
			$_SESSION['cerveza'] = $this->arrayCervezas;
			return $rta;
		}

	}
?>