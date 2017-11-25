<?php  namespace Config;

class Router
{

	public static function Rutea(Request $request){
		$controladora = 'Controladora'.$request->getControladora();
		$metodo = $request->getMetodos();
		$parametros = $request->getParametros();

		$ruta= 'Controladoras/'.$controladora.".php";



		require_once $ruta;

		$mostrar = "Controladoras\\".$controladora;

		$controlador = new $mostrar;

		echo "<br>";
		echo "ACA DEBERIAN DE IR LOS PARAMETROS" . $parametros;

		if (!isset($parametros)){
			call_user_func(array($controlador,$metodo));
		}
		else {
			call_user_func_array(array($controlador,$metodo), $parametros);
		}

	}

}


?>