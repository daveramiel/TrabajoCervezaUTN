<?php namespace Vistas; ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Muestra Cerveza</title>
</head>
<body>
	<div>
		<table border="1">
			<tr>
				<th>Nombre</th>
				<th>Color</th>
				<th>Precio</th>
				<th>Descripcion</th>
			</tr>
			<tr>
				<td><?= $this->cerveza->getNombre()?></td>
				<td><?= $this->cerveza->getColor()?></td>
				<td><?= $this->cerveza->getPrecio()?></td>
				<td><?= $this->cerveza->getDescripcion()?></td>
			</tr>
		</table>
	</div>
	<div>
		<input type="button" name="main" value="Main" onclick="location='<?=BASE?>Main/main'">
	</div>
</body>
</html>