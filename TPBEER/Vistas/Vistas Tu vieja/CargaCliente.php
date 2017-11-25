<?php namespace Vistas ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Cargar Cliente</title>
</head>
<body>
	<form action="Clientes\crear" method='POST' enctype="multipart/form-data">
		<input type="text" name="Nombre" placeholder="Nombre"><br>
		<input type="text" name="Apellido" placeholder="Apellido"><br>
		<input type="text" name="Telefono" placeholder="Telefono"><br>
		<input type="email" name="Email" placeholder="Email"><br>
		<input type="file" name="fileToUpload" id="fileToUpload"><br>
		<input type="submit" value="Cargar">
	</form>

</body>
</html>