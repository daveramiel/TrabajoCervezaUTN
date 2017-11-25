	<div align="center">
		<table class="table table-dark">
			<tr>
				<th>Nombre</th>
				<th>Color</th>
				<th>Precio</th>
				<th>Descripcion</th>
			</tr>
			<?php foreach ($cervezaArray as $birra) { ?>
			<tr>
				<td><?= $birra->getNombre()?></td>
				<td><?= $birra->getColor()?></td>
				<td><?= $birra->getPrecio()?></td>
				<td><?= $birra->getDescripcion()?></td>
			</tr>
			<?php } ?>
		</table>
	</div>
	<div>
		<p><a href="Vista/main">INICIO</a></p>
	</div>
