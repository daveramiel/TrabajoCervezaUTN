	<div align="center">
		<form action="Pedido/comprar" method="post">
			<table class="table">
				<tr>
					<th>Nombre</th>
					<th>Color</th>
					<th>Precio</th>
					<th>Descripcion</th>
					<th>Sumalo al Carrito!</th>
				</tr>
				<?php foreach ($cervezaArray as $birra) { ?>
				<tr>
					<td><?= $birra->getNombre()?></td>
					<td><?= $birra->getColor()?></td>
					<td><?= $birra->getPrecio()?></td>
					<td><?= $birra->getDescripcion()?></td>
					<td><label>Comprar!</label><input type="number" name="comprar"><</td>
				</tr>
				<?php } ?>
			</table>
			<input type="submit" name="pedido" value="Comprar YA!">
		</form>
		<p><a href="Vista/main">INICIO</a></p>
	</div>