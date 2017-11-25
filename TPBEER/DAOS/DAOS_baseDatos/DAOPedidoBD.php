<?php namespaces DAOS\DAOS_baseDatos;

	use PDO;
	use \DAOS\Conection as Conection;
	use \Modelos\LineaPedido as LineaPedido;
	use \Modelos\Pedido as Pedido;
	use \DAOS\SingletonAbstractDAO as SingletonAbstractDAO;
	use \DAOS\IDAO as IDAO;

	class DAOLineasPedidoBD extends Conection
	{
		protected $table_LineasPedidos = 'lineas_pedidos';
		protected $table_Pedidos = 'pedidos';

		function guardarLineaPedido($lineaPedido, $pk_idPedido)
		{
			
			$qwery = 'INSERT INTO ' . $this->table_LineasPedidos.'(fk_cerveza, fk_envase, cantidad, sub_total, fk_IDpedido) 	  								VALUES (:beer, :envase, :cant, :subTotal, :pedido)';
			$pdo = new Conection();
			$conection = $pdo->getConection();
			$command = $conection->prepare($qwery);

			$cerveza = $lineaPedido->getCerveza();//bajo la cerveza 
			$fk_cerveza = $cerveza->getIdCerveza();//guardo el id para usarlo de foreign key

			$envase = $lineaPedido->getEnvase();//bajo el envase
			$fk_envase = $envase->getIdEnvase();//guardo el id para usarlo de foreign key
			
			$cantidad = $lineaPedido->getCantidad();
			$subTotal = $lineaPedido->getSubtotal();
			
			$command->bindParam(':beer', $fk_cerveza);
			$command->bindParam(':envase', $fk_envase);
			$command->bindParam(':cantidad', $cantidad);
			$command->bindParam(':subTotal', $subTotal);
			$command->bindParam(':pedido', $pk_idPedido);
			$command->execute();

			$lineaPedido->setID($conection->lastInsertId());

			return $lineaPedido;			
		}

		function guardarPedido($pedido)
		{
			
			$qwery = 'INSERT INTO ' . $this->table_Pedidos.'(estado, fecha, fk_cliente) 	  										VALUES (:state, :date, :cliente)';
			$pdo = new Conection();
			$conection = $pdo->getConection();
			$command = $conection->prepare($qwery);

			$cliente = $pedido->getCliente();//bajo el cliente 
			$fk_cliente = $cliente->getIdCliente();//guardo el id para usarlo de foreign key

			
			$estado = $pedido->getEstado();
			$fecha = $pedido->getFecha();
			
			$command->bindParam(':state', $estado);
			$command->bindParam(':date', $fecha);
			$command->bindParam(':cliente', $fk_cliente);
			$command->bindParam(':subTotal', $subTotal);
			$command->execute();

			$pedido->setID($conection->lastInsertId());

			return $pedido;
		}

		function __guardarPedido_y_LineaPedido($object)
		{
			$array_LineasPedido = $object->getLineaPedidos;

			$pedido = $this->guardarPedido($object);
			$pk_pedido = $pedido->getIdPedido();

			while(!empty($array_LineasPedido))
			{
				$lineaPedido = array_shift($array_LineasPedido);//saco la linea qe acabo de guardar
				$this->guardarLineaPedido($lineasPedido, $pk_pedido);//guardo la linea con el pk en el DAO
			}
		}

		/*function listar_LineaPedido()
		{
			$arrayLineasPedido = array();
			$qwery = 'SELECT cer.nombre, env.nombre, LP.cantidad, LP.subTotal
						INNER JOIN cerveza cer on LP.fk_cerveza = cer.id_cerveza
						INNER JOIN envases env on LP.fk_envase = envase.id_envase
						FROM '.$this->table_LineasPedidos.' LP';

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
		}*/
	}

?>