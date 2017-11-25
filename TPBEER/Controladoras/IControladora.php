<?php

interface IControladora #CRUD (Create, Read, Update y Delete)
{

	public function crear();#Create
	public function buscar();#Read
	public function borrar();#Delete
	public function modificar();#Update
	public function insertar();

}

?>