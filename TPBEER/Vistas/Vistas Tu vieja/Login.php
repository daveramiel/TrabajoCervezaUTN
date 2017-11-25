<?php namespace Vistas;
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Logueo</title>
</head>
<body>

	<br/><br/>
		<div aling="center">LOGUEO</div>
		<br/><br/>
	<form action="Login\validar" method="POST" >
		<table align="center">
			<label for="email">Email:</label>
			<input type="email" name="user" id="user"  placeholder="Ingrese Mail">
			<br/><br/>
			<label for="pass">Contraseña:</label>
			<input type="password" name="pass" id="pass"  placeholder="Password">
			<br/><br/>
			<input type="submit" value="Loguear" style="width: 200px"><br><br>
		</table>
	</form>

</body>
</html>