<?php namespace Config;

class Request
{
	private $controladora;
	private $metodos;
	private $parametros;
	private static $instance;

	public static function getInstance(){
		if(self::$instance == null){
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function __construct()
	{
		///elimina caract ilegales de la url - Get_input es constante que indica que filtrar
		$url = filter_input(INPUT_GET, 'url' ,FILTER_SANITIZE_URL); 	
		///Limpia el url de los \ y guarda en array
		$arrayToUrl = explode("/",$url); 	
		///Se limpia el array.							
		$arrayClean = array_filter($arrayToUrl); 						
		if(!empty($arrayClean)) {
			  ///$this->controladora = is_array($arrayClean) ? array_shift($arrayClean) : NULL 	
			$this->controladora = ucwords(array_shift($arrayClean)); 		
		} else{
			///$this->controladora = NULL ?? 'controladoraDefault';
			$this->controladora = 'Login';
		}

		if(!empty($arrayClean)){
			///$this->metodos = is_array($arrayClean ? array_shift($arrayClean) : NULL;
			$this->metodos= array_shift($arrayClean); 
		} 
		else {
			///$this->metodos = NULL ?? 'metodosDefault';
			$this->metodos = 'login';
		}
		$metodoRequest = $this->getRequestMetodo();
		if ($metodoRequest == 'POST') {
			if(!empty($arrayClean)){
				///$this->parametros = is_array($arrayClean) ? $_POST : NULL;
				$this->parametros= $_POST;			
			}   ///$this->parametros = NULL ?? 'parametrosDefault';
		} else {									///sino viene por GET
			    $cant = count($_GET);
                $tags = array_keys($_GET);// obtiene los nombres de las varibles
                $valores = array_values($_GET);// obtiene los valores de las varibles

                // crea las variables y les asigna el valor
                for($i = 1; $i < $cant; $i++)
                {
                	if(strcmp($tags[$i], 'url') != 0){
                		array_push($arrayClean, $valores[$i]);
                	}
                }

                if(!empty($ArregloUrl))
                {
                	$this->parametros = $arrayClean;
                }
            }


        }

        public function getControladora()
        {
        	return $this->controladora;
        }

        public function getMetodos()
        {
        	return $this->metodos;
        }


        public function getParametros()
        {
        	return $this->parametros;
        }

        private function getRequestMetodo(){
    	return $_SERVER['REQUEST_METHOD']; ///La variable contiene la ultima solicitud  si es GET O POST
    }

}

?>