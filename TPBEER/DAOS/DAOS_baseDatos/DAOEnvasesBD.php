<?php namespace DAOS\DAOS_baseDatos;
	
	use PDO;
	use \DAOS\Conection as Conection;
	use \Modelos\Envase as Envases;
	use \DAOS\SingletonAbstractDAO as SingletonAbstractDAO;
	use \DAOS\IDAO as IDAO;

	class DAOEnvasesBD extends SingletonAbstractDAO implements IDAO
	{
		private $table = 'envases';

		public function guardar($object)
		{
			$qwery = 'INSERT INTO ' . $this->table.'(nombre, modificador_precio, estado) 	  								VALUES (:name, :precio, :state)';
			$pdo = new Conection();
			$conection = $pdo->getConection();
			$command = $conection->prepare($qwery);

			$name = $object->getNombreCantidad();
			$precio = $object->getModificadorPrecio();
			$state = $object->getEstado();

			$command->bindParam(':name', $name);
			$command->bindParam(':precio', $precio);
			$command->bindParam(':state', $state);
			$command->execute();

			$object->setIdEnvase($conection->lastInsertId());

			return $object;			
		}
		public function buscarNombre($name)
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
				$rta = new Envase($row['nombre'],$row['modificador_precio']);
				$rta->setIdEnvase($row['id_envase']);
				$rta->setEstado($row['estado']);
			}
			return $rta;
		}
		public function modificar($object)
		{
			$rta = false;

			$qwery2 = '
						UPDATE $this->table 
						SET
							nombre = :name,
							modificador_precio = :precio,
							estado = :state
						WHERE id_envase = :idEnvase
					';

			$pdo = new Conection();
			$conection = $pdo->getConection();
			$command = $conection->prepare($qwery2);

			$name = $object->getNombreCantidad();
			$precio = $object->getModificadorPrecio();
			$estado = $object->getEstado();

			$command->bindParam(':name', $name);
			$command->bindParam(':precio', $precio);
			$command->bindParam(':state', $estado);
			
			$rta = $command->execute();/// execute devuelve true si se pudo ejecutar la qwery - false si no se pudo

			return $rta;
		}
		public function borrar($name)
		{
			$rta = false;//variable para devolver si se borro correctamente
			
			$envaseAUX = $this->buscarNombre($name);// busco el envase y la bajo en una variable
			$envaseAUX->setEstado(false);//modifico el estado del estado

			$rta = $this->modificar($cervezaAUX);//modifico el estado del envase en la base de datos, y lo devuelvo a la variable para retornar

			return $rta;//variable qe trae lo qe me devuelve modificar	
		}
		public function listar()
		{
			$arrayEnvases = array();
			$qwery = 'SELECT * FROM '.$this->table;

			$pdo = new Conection();
			$conection = $pdo->getConection();
			$command = $conection->prepare($qwery);
			$command->execute();

			while ($row = $command->fetch())
			{
				if($row['estado'] == true)
				{
					$envase = new Envase($row['nombre'],$row['modificador_precio']);
					$envase->setIdEnvase($row['id_envase']);
					$envase->setEstado($row['estado']);

					array_push($arrayEnvase, $envase);
				}
			}
			return $arrayCerveza;
		}
	}
?>