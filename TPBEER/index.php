<base href="/TPBEER/">

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'Config/Config.php';	
require 'Config/Autoload.php';

Config\Autoload::Start();

session_start();



$request=new Config\Request();

require_once("Vistas/header.php");

//if (isset $_SESSION['login']){
	$router=Config\Router::Rutea($request);
//} else{
//	require_once("Vistas/login.php");
//}
require_once("Vistas/footer.php");


?>

