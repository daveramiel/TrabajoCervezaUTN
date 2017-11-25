<?php namespace DAOS;

	use PDO;
	use \DAOS\SingletonAbstractDAO as SingletonAbstractDAO;
	
	class Conection extends SingletonAbstractDAO
	{

		private $conection;

		function __construct()
		{
			try
			{
				$pdo = new PDO("mysql:host=".DB_HOST."; dbname=".DB_NAME,DB_USER,DB_PASS);//crear la conexion a la BD

				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//atributos para captar el error y poder mostrarlo luego

				$this->conection = $pdo;
			}
			catch (PDOException $e)//excepcion de PDO 
			{
				echo 'Fail Conection:......' . $e->getMessage();//funcion de php
				die();//cortar la ejecucion de php.
			}
		}

		function __destruct()
		{
			$this->conection = null;
		}

		function getConection()
		{
			return $this->conection;
		}
	}
?>