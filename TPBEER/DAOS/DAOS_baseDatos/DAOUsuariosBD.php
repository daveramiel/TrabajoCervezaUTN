<?php namespace DAOS\DAOS_baseDatos;
	
	use PDO;
	use \DAOS\Conection as Conection;
	use \Modelos\Cliente as Cliente;
	use \Modelos\Cuenta as Cuenta;
	use \Modelos\Admin as Admin;
	use \DAOS\IDAO as IDAO; 
	use \DAOS\SingletonAbstractDAO as SingletonAbstractDAO;


	class DAOUsuariosBD extends SingletonAbstractDAO implements IDAO
	{
		protected $table = 'usuarios';

		function guardar($object)
		{
			$qwery = '
						INSERT INTO '.$this->table.' (nombre, apellido, domicilio, telefono, email, pass, tipocuenta) 
						VALUES (:name, :ape, :dom, :tel, :email, :pass, :tipocuenta)
					 ';

			$pdo = new Conection();
			$conection = $pdo->getConection();
			$command = $conection->prepare($qwery);
			
			$cliente = $object->getTipoCuenta();   
			var_dump($cliente);
			$nombre=$cliente->getNombre();
			$apellido=$cliente->getApellido();
			$domicilio=$cliente->getDomicilio();
			$t3lefono=$cliente->getTelefono();
			$email=$object->getEmail();
			$pa55=$object->getPassword();
			$tipocuenta=1;
			$command->bindParam(':name', $nombre);
			$command->bindParam(':ape', $apellido);
			$command->bindParam(':dom', $domiclio);
			$command->bindParam(':tel', $t3lefono);
			$command->bindParam(':email',$email);
			$command->bindParam(':pass',$pa55);
			$command->bindParam(':tipocuenta',$tipocuenta);
			$command->execute();

			$object->setID($conection->lastInsertId());

			return $object;			
		}

		function buscarNombre($mail)
		{
			$rta = null;
			$qwery = 	' SELECT * FROM '.$this->table.' WHERE email = :email';

			$pdo = new Conection();
			$conection = $pdo->getConection();
			$command = $conection->prepare($qwery);

			$command->bindParam(':email', $mail);
			$command->execute();

			while($row = $command->fetch())
			{
				if($row['tipocuenta'] == 1)//los usuarios qe sean 1 en BASE DE DATOS son CLIENTES!!!
				{
					
					$id = $row['id_usuario'];
					$nombre = $row['nombre'];
					$apellido = $row['apellido'];
					$domicilio = $row['domicilio'];
					$telefono = $row['telefono'];

					$cliente = new Cliente($nombre, $apellido, $domicilio, $telefono);
				
					$email = $row['email'];
					$pass = $row['pass'];
					$rta = new Cuenta($email, $pass, $cliente);
				}
				else
				{
					$id = $row['id_usuario'];
					$nombre = $row['nombre'];
					$apellido = $row['apellido'];
					$domicilio = $row['domicilio'];
					$telefono = $row['telefono'];

					$admin = new Admin($nombre, $apellido, $domicilio, $telefono);

					$email = $row['email'];
					$pass = $row['pass'];
					$rta = new Cuenta($email, $pass, $admin);
				}
			}
			return $rta;
		}

		function modificar($object)
		{
			$rta = false;
			
			$qwery = '
						UPDATE $this->table 
						SET
							nombre = :name,
							apellido = :ape,
							domicilio = :dom,
							telefono = :tel,
							email = :email,
							pass = :pass
						WHERE id_cuenta = :id
					';
			$pdo = new Conection();
			$conection = $pdo->getConection();
			$command = $conection->prepare($qwery);
			
			$cliente = $object->getTipoCuenta();

			$nombre = $cliente->getNombre();
			$apellido = $cliente->getApellido();
			$domicilio = $cliente->getDomicilio();
			$telefono = $cliente->getTelefono();
			$email = $object->getEmail();
			$pass = $object->getPass();
			$id = $object->getIdCuenta();

			$command->bindParam(':name', $nombre);
			$command->bindParam(':ape', $apellido);
			$command->bindParam(':dom', $domicilio);
			$command->bindParam(':tel', $telefono);
			$command->bindParam(':email',$email);
			$command->bindParam(':pass',$pass);
			$command->bindParam(':id', $id);

			$rta = $command->execute();/// execute devuelve true si se pudo ejecutar la qwery - false si no se pudo

			return $rta;
		}
		function borrar($email)
		{
			$qwery = 'DELETE FROM $this->table
						WHERE email = :email
					 ';
			$pdo = new Conection();
			$conection = $pdo->getConection();
			$command = $conection->prepare($qwery);

			$command->bindParam(':email', $email);
			
			$rta = $command->execute();		
			
			return $rta;
		}
		function listar()
		{
			$arrayCuentas = array();
			$qwery = ' SELECT * FROM ' .$this->table;

			$pdo = new Conection();
			$conection = $pdo->getConection();
			$command = $conection->prepare($qwery);
			$command->execute();

			while ($row = $command->fetch())
			{
				if($row['tipocuenta'] == 1)//los usuarios qe sean 1 en BASE DE DATOS son CLIENTES!!!
				{

					$cliente = new Cliente($row['nombre'], $row['apellido'], $row['domicilio'], $row['telefono']);
					
					
					$email = $row['email'];
					$pass = $row['pass'];

					$cuenta = new Cuenta($email, $pass, $cliente);
					
					$cuenta->setid($row['id_usuario']);

					array_push($arrayCuenta, $cuenta);
				}
				else
				{
					$nombre = $row['nombre'];
					$apellido = $row['apellido'];
					$domicilio = $row['domicilio'];
					$telefono = $row['telefono'];

					$admin = new Admin($nombre, $apellido, $domicilio, $telefono);
				
					$email = $row['email'];
					$pass = $row['pass'];
					
					$cuenta = new Cuenta($email, $pass, $admin);
					
					$cuenta->setid($row['id_usuario']);

					array_push($arrayCuenta, $cuenta);
				}
			}
			return $arrayCuenta;
		}
	}///fin de la clase
?>