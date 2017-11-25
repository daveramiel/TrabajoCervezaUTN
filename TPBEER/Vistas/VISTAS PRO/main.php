<?php namespace Vistas; ?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Main Page</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<link href="/TPBEER/Vistas/css/bootstrap.css" rel='stylesheet' type='text/css' />
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<!-- Custom Theme files -->
		<link href="/TPBEER/Vistas/css/style.css" rel='stylesheet' type='text/css' />
		<!-- Custom Theme files -->
		<!--webfont-->
		<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
		<!-- start menu -->
		<link href="/TPBEER/Vistas/css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
		<script type="text/javascript" src="js/megamenu.js"></script>
		<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
		<script src="js/jquery.easydropdown.js"></script>
		<script src="js/simpleCart.min.js"> </script>
	</head>
	<body>
		<div class="banner">
			<div class="container">
				<div class="header_top">
					<div class="header_top_left">
						<div class="box_11"><a href="/TPBEER/Vistas/checkout.html">
							<h4><p>Carrito: <span class="simpleCart_total"></span> (<span id="simpleCart_quantity" class="simpleCart_quantity"></span> items)</p><img src="/TPBEER/Vistas/images/bag.png" alt=""/><div class="clearfix"> </div></h4>
						</a></div>
						<p class="empty"><a href="javascript:;" class="simpleCart_empty">Carrito vacio</a></p>
						<div class="clearfix"> </div>
					</div>
					<div class="header_top_right">
						<ul class="header_user_info">
							<a class="login" href="/TPBEER/Vistas/login.html">
								<i class="user"> </i> 
								<li class="user_desc">Mi Cuenta</li>
							</a>
							<div class="clearfix"> </div>
						</ul>
						<!-- start search-->
						<div class="search-box">
							<div id="sb-search" class="sb-search">
								<form>
									<input class="sb-search-input" placeholder="Enter your search term..." type="search" name="search" id="search">
									<input class="sb-search-submit" type="submit" value="">
									<span class="sb-icon-search"> </span>
								</form>
							</div>
						</div>
						<!----search-scripts---->
						<script src="js/classie1.js"></script>
						<script src="js/uisearch.js"></script>
						<script>
							new UISearch( document.getElementById( 'sb-search' ) );
						</script>
						<!----//search-scripts---->
						<div class="clearfix"> </div>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="header_bottom">
					<div class="logo">
						<h1><a href="/TPBEER/Vistas/main.php"><span class="m_1">B</span>irra</a></h1>
					</div>
					<div class="menu">
						<ul class="megamenu skyblue">
							<li><a class="color2" href="#">Cervezas</a></li>
							<li><a class="color4" href="#">Clientes</a></li>				
							<li><a class="color10" href="/TPBEER/Vistas/brands.php">Tu vieja</a></li>
							<li class="active grid"><a class="color3" href="/TPBEER/Vistas/main.php">Envases</a></li>
							<li><a class="color7" href="404.php">About</a></li>
							<div class="clearfix"> </div>
						</ul>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
		<div class="footer">
			<div class="container">
				<div class="newsletter">
					<h3>Newsletter</h3>
					<p>El perro esta en la cucha.</p>
					<form>
						<input type="text" value="" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='';}">
						<input type="submit" value="SUBSCRIBE">
					</form>
				</div>
				<div class="cssmenu">
					<ul>
						<li class="active"><a href="#">Pirata</a></li>
						<li><a href="#">Terminos</a></li>
						<li><a href="#">Mapa Sitio</a></li>
						<li><a href="#">About</a></li>
						<li><a href="/TPBEER/Vistas/contact.php">Contact</a></li>
					</ul>
				</div>
				<ul class="social">
					<li><a href="www.xvideos.com"> <i class="instagram"> </i> </a></li>
					<li><a href=""><i class="fb"> </i> </a></li>
					<li><a href=""><i class="tw"> </i> </a></li>
				</ul>
				<div class="clearfix"></div>
				<div class="copy">
					<p> &copy; 2017 Birra. Todo original | Design by <a target="_blank">El mono</a></p>
				</div>
			</div>
		</div>
	</body>
	</html>		