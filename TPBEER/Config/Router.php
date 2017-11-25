<?php namespace Config;

    class Router {

        public static function Rutea(Request $request) {


            $controlador = 'Controladora'.$request->getControlador();

            $metodo = $request->getMetodo();

            $parametros = $request->getParametros();

            $mostrar = "Controladoras\\". $controlador;

            $controlador = new $mostrar;

            if(!isset($parametros)) {
                call_user_func(array($controlador, $metodo));
            } else {
                call_user_func_array(array($controlador, $metodo), $parametros);
            }
        }
    }

?>