
<div align="center">
	<form action="/TPBEER/Cervezas/insertar" class="form-style-7" method="post">
		<p>Ingrese nombre:</p><input type="text" name="nombre" placeholder="Nombre Cerveza">
		<p>Color:</p>
		<input type="radio" name="color" value="1" id="radio_rubia" checked><label for="radio_rubia"> Rubia/Dorada </label>
		<input type="radio" name="color" value="2" id="radio_negra"><label for="radio_negra"> Negra/Oscura </label>
		<input type="radio" name="color" value="3"  id="radio_rojo"><label for="radio_rojo"> Roja/Carmesi </label>
		<p>Precio</p><input type="number" name="precio">
		<p>Descripcion:</p>
		<input type="textarea" name="descripcion" placeholder="Deliciosa y Espumante! ;)">
		<!---<p>Foto</p><input type="file" name="fileToUpload">-->
		<br>
		<br>
		<br>
		<br>
		<input type="submit" name="upload" value="Subir Datos">
	</form>
	<h3 style="color: white; font-weight: bold"><a href="Vista/main">INICIO</a></h3>	
</div>
