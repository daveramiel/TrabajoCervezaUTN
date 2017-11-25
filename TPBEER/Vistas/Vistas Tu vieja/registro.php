<div class="center">
	<form action="/TPBEER/Cuentas/insertar" method="post" class="form-style-7">
		<ul>
			<li>
				<label for="name">Nombre</label>
				<input type="text" name="nombre" maxlength="100">
				<span>Nombre</span>
			</li>
			<li>
				<label for="name">Apelldio</label>
				<input type="text" name="apellido" maxlength="100">
				<span>Apellido</span>
			</li>
			<li>
				<label for="name">Domicilio</label>
				<input type="text" name="domicilio" maxlength="100">
				<span>Donde Vivis?</span>
			</li>
			<li>
				<label for="name">Telefono</label>
				<input type="text" name="telefono" maxlength="100">
				<span>Fono</span>
			</li>
			<li>
				<label for="email">Email</label>
				<input type="email" name="email" maxlength="100">
				<span>E-Mail</span>
			</li>
			<li>
				<label for="url">Password!</label>
				<input type="text" name="pass" maxlength="100">
				<span>La clave super Secreta es...</span>
			</li>
			<li>
				<input type="submit" value="A Darle Atomos" >
			</li>
		</ul>
	</form>
</div>

<script type="text/javascript">
//auto expand textarea
function adjust_textarea(h) {
    h.style.height = "20px";
    h.style.height = (h.scrollHeight)+"px";
}
</script>