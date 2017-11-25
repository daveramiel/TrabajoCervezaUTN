<?php namespace DAOS;
	
	interface IDAO{
		public function guardar($object);
		public function buscarNombre($name);
		public function modificar($object);
		public function borrar($name);
		public function listar();
	}
?>