<?php  namespace Controladoras;

class ControladoraVista
{
	public function main(){
		include_once ('Vistas/main.php');
	}

	public function cargaCerveza(){
		include_once ('Vistas/CargaCerveza.php');
	}

	public function buscarCerveza(){
			include_once ('Vistas/BuscarCerveza.php');
		}

	public function login(){
		include_once('Vistas/login.php');
	}

	public function registro(){
		include_once('Vistas/registro.php');
	}
	public function comprar(){
		include_once('Vistas/catalogo.php');
	}
}
 ?>