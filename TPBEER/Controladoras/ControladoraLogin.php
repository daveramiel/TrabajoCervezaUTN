<?php namespace Controladoras;

use \DAOS\DAOS_baseDatos\DAOUsuariosBD as DAOUsuario;
use \Modelos\Cuenta as Cuenta;
use \Modelos\Cliente as Cliente;

class ControladoraLogin
{
	private $DaoUsuario;
	private $user;
	

	function __construct()
	{
		$this->DaoUsuario = DAOUsuario::getInstance();
	}

	function login()
	{
		require("Vistas/Login.php");
	}

	function validar($username,$pass)
	{
		if ($this->verificacion($username, $pass))
		{
			$user = $this->DaoUsuario->buscarNombre($username);#tengo que usar el buscar del dao.
			if ($user != null){
			if ( $user->getPassword() == $pass)#tengo que usar el getpass de algo.
			{
				$_SESSION['user']= $user;
				if ($user->getTipoCuenta() instanceof Cliente)#tengo que usar el getTipo de algo.
				{
					include_once('Vistas/main.php');
				}
				else
				{
					include_once('Vistas/main.php');
				}
			}
			else
			{
				#scrip de error de contraseña;
				echo "Nahuel gato";
				include_once('vista si ingresa mal la contraseña');
			}
		}

	}
	else
	{
		include_once('vista si no cargo los campos.');
		echo "nahuel mas gato";
			#los campos no estan seteados.
	}
}

function closeSession(){
	$_SESSION = array();
	session_destroy();
	include_once("Vistas/Login.php");
}

	private function verificacion(...$Arraykeys) #no puedo pensar
	{
		$flag = true;

		foreach($Arraykeys as $key => $value)
		{

			if(!isset($value) && empty($value))
			{
				$flag = false;
			}
		}
		return $flag;
	}
}


?>