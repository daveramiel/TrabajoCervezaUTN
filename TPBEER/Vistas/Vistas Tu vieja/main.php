<?php namespace Vistas; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>MAIN</title>
</head>
<body>

	<form>
		<div>
			<input type="button" value="Cerveza Nueva" name="cervezas" onclick="location='<?=BASE?>Vistas/CargaCerveza'">
			<input type="button" value="Nuevos Usuario" name="Usuario" onclick="location.href='<?=BASE?>Vistas/CargaUsuario'">
			<input type="button" value="Buscar Cerveza" name="busquedaCerveza" onclick="location='<?=BASE?>Vistas/BuscarCerveza'">
			<input type="button" value="Cerrar Cesion" name="cesion" onclick="location='<?=BASE?>Login/closeSession'">
		</div>
		
	</form>

</body>
</html>