<?php namespaces DAOS\DAOS_baseDatos;

	use PDO;
	use \DAOS\Conection as Conection;
	use \Modelos\LineaPedido as LineaPedido;
	use \DAOS\SingletonAbstractDAO as SingletonAbstractDAO;
	use \DAOS\IDAO as IDAO;

	class DAOLineasPedidoBD extends Conection
	{
		protected $table = 'lineas_pedidos';


		function guardar($object)
		{
			
			$qwery = 'INSERT INTO ' . $this->table.'(fk_cerveza, fk_envase, cantidad, sub_total) 	  								VALUES (:beer, :envase, :cant, :subTotal)';
			$pdo = new Conection();
			$conection = $pdo->getConection();
			$command = $conection->prepare($qwery);

			$cerveza = $object->getCerveza();//bajo la cerveza 
			$fk_cerveza = $cerveza->getIdCerveza();//guardo el id para usarlo de foreign key

			$envase = $object->getEnvase();//bajo el envase
			$fk_envase = $envase->getIdEnvase();//guardo el id para usarlo de foreign key
			
			$cantidad = $object->getCantidad();
			$subTotal = $object->getSubtotal();
			
			$command->bindParam(':beer', $fk_cerveza);
			$command->bindParam(':envase', $fk_envase);
			$command->bindParam(':cantidad', $cantidad);
			$command->bindParam(':subTotal', $subTotal);
			$command->execute();

			$object->setID($conection->lastInsertId());

			return $object;			
		}

		function listar()
		{
			$arrayLineasPedido = array();
			$qwery = 'SELECT * FROM '.$this->table.
						' INNER JOIN cerveza on '.$this->table.'.fk_cerveza = cerveza.id_cerveza INNER JOIN envases on '.$this->table.'.fk_envase = envase.id_envase';//hay qe chekear inner join con cerveza y envases

			$pdo = new Conection();
			$conection = $pdo->getConection();
			$command = $conection->prepare($qwery);
			$command->execute();

			while ($row = $command->fetch())
			{
				$lineaPedido = new LineaPedido(($row['fk_cerveza']), ($row['fk_envase']), ($row['cantidad']), ($row['sub_total']));

				$lineaPedido->setID($conection->lastInsertId())
					
				array_push($arrayLineasPedido, $lineaPedido);
			}
			return $arrayLineasPedido;
		}
	}

?>