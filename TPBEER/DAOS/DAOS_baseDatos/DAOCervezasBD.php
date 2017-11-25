<?php namespace DAOS\DAOS_baseDatos;

use PDO;
use \DAOS\Conection as Conection;
use \Modelos\Cerveza as Cervezas;
use \DAOS\SingletonAbstractDAO as SingletonAbstractDAO;
use \DAOS\IDAO as IDAO;

class DAOCervezasBD extends Conection implements IDAO
{
	protected $table = 'cervezas';

	function __construct(){
		parent::__construct();
	}

	function guardar($object){
		
		$qwery = 'INSERT INTO ' . $this->table.'(nombre, color, precio, descripcion, estado) 	  								VALUES (:name, :rec, :precio, :desc, :state)';
		$pdo = new Conection();
		$conection = $pdo->getConection();
		$command = $conection->prepare($qwery);

		$name = $object->getNombre();
		$rec = $object->getColor();
		$precio = $object->getPrecio();
		$desc = $object->getDescripcion();
		$state = $object->getEstado();

		$command->bindParam(':name', $name);
		$command->bindParam(':rec', $rec);
		$command->bindParam(':precio', $precio);
		$command->bindParam(':desc', $desc);
		$command->bindParam(':state', $state);
		$command->execute();

		$object->setIdCerveza($conection->lastInsertId());

		return $object;			
	}
	function buscarNombre($name)
	{
		$rta = null;

		$qwery = 'SELECT * FROM '.$this->table.' WHERE nombre = :name';

		$pdo = new Conection();
		$conection = $pdo->getConection();
		$command = $conection->prepare($qwery);

		$command->bindParam(':name', $name);
		$command->execute();

		while($row = $command->fetch())
		{
			$rta = new Cervezas($row['nombre'],$row['color'],$row['precio'],$row['descripcion'],$row['estado']);
				//$rta->setIdCerveza($row['Id_cerveza']);
				//$rta->setNombre($row['Nombre']);
				//$rta->setColor($row['Color']);
				//$rta->setPrecio($row['Precio']);
				//$rta->setDescripcion($row['Descripcion']);
				//$rta->setEstado($row['Estado']);
		}
		return $rta;
	}

	function listarActivos()
	{
		$arrayCerveza = array();
		$qwery = 'SELECT * FROM '.$this->table;

		$pdo = new Conection();
		$conection = $pdo->getConection();
		$command = $conection->prepare($qwery);
		$command->execute();

		while ($row = $command->fetch())
		{
			if($row['estado'] == 1)
			{

				$cerveza = new Cervezas($row['id_cerveza'],$row['id_cerveza'],$row['nombre'],$row['color'],$row['precio'],$row['descripcion']);
				array_push($arrayCerveza, $cerveza);
			}
		}
		return $arrayCerveza;
	}
	function listar()
	{
		$arrayCerveza = array();
		$qwery = 'SELECT * FROM '.$this->table;

		$pdo = new Conection();
		$conection = $pdo->getConection();
		$command = $conection->prepare($qwery);
		$command->execute();

		while ($row = $command->fetch())
		{			
			$cerveza = new Cervezas();
			$cerveza->setIdCerveza($row['id_cerveza']);
			$cerveza->setNombre($row['nombre']);
			$cerveza->setColor($row['color']);
			$cerveza->setPrecioXLt($row['drecio']);
			$cerveza->setDescripcion($row['Descripcion']);

			array_push($arrayCerveza, $cerveza);	
		}
		return $arrayCerveza;
	}

	function modificar($object)
	{
		$rta = false;

		$qwery2 = '
		UPDATE $this->table 
		SET
		Nombre = :name,
		Receta = :receta,
		Precio = :precio,
		Descripcion = :descripcion,
		Estado = :state
		WHERE Id_cerveza = :IdCerveza
		';

		$conection = $pdo->getConection();
		$command = $conection->prepare($qwery2);

		$command->bindParam(':name', $object->getNombre());
		$command->bindParam(':receta', $object->getReceta());
		$command->bindParam(':precio', $object->getPrecioXLt());
		$command->bindParam(':descripcion', $object->getDescripcion());
		$command->bindParam(':state', $object->getEstado());
		$command->bindParam(':IdCerveza', $object->getIdCerveza());

			$rta = $command->execute();/// execute devuelve true si se pudo ejecutar la qwery - false si no se pudo

			return $rta;
		}

		function borrar($name)
		{
			$rta = false;//variable para devolver si se borro correctamente
			
			$cervezaAUX = $this->buscarNombre($name);// busco la cerveza y la bajo en una variable
			$cervezaAUX->setEstado(false);//modifico el estado de la cerveza

			$rta = $this->modificar($cervezaAUX);//modifico el estado de la cerveza en la base de datos, y lo devuelvo a la variable para retornar

			return $rta;//variable qe trae lo qe me devuelve modificar
		}
	}
	?>