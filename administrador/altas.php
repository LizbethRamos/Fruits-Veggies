<?php require_once "../controladores\ctrlFormularios.php"; ?>
<?php require_once "../modelos\mdlformularios.php"; ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Alta de productos</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
	<meta name="keywords" content="free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="FreeHTML5.co" />

  <!-- 
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE 
	DESIGNED & DEVELOPED by FreeHTML5.co
		
	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
	 -->



	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="../favicon.ico">	
	<!-- Animate.css -->
	<link rel="stylesheet" href="../css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="../css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="../css/bootstrap.css">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="../css/owl.carousel.min.css">
	<link rel="stylesheet" href="../css/owl.theme.default.min.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="../css/style.css">

	<!-- Modernizr JS -->
	<script src="../js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>

	<div id="fh5co-page">
		<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle dark"><i></i></a>
		<aside id="fh5co-aside" role="complementary" class="js-fullheight">

			<h1 id="fh5co-logo"><a href="../index.php"><img src="../images/logo.png" alt="Fruits&Veggies"></a></h1>
			
			<nav id="fh5co-main-menu" role="navigation">
				<ul>
					
					<li><a href="admin_logeado.php">Productos</a></li>
					<li class="fh5co-active"><a href="administrador.php">Admin</a></li>
					<li><a href="../Principal/index.php">Salir</a></li>
				</ul>
			</nav>

			<div class="fh5co-footer">
				<p><small>&copy;Fruits&Veggies</span> <span>Designed by <a href="#">Fruits&Veggies</a> </span> <span>Distributed by: <a href="#">Fruits&Veggies</a></span></small></p>
				<ul>
					<li><a href="#"><i class="icon-facebook"></i></a></li>
					<li><a href="#"><i class="icon-twitter"></i></a></li>
					<li><a href="#"><i class="icon-instagram"></i></a></li>
					<li><a href="#"><i class="icon-linkedin"></i></a></li>
				</ul>
			</div>

		</aside>

		<div id="fh5co-main">
			<div class="fh5co-more-contact">
				<div class="fh5co-narrow-content">
					<form class="agregarProd"  method="POST">
						<fieldset>
							<legend> Agregar Producto</legend>
							<div class="row">
								<div class="col-md-4">
									<div class="fh5co-feature fh5co-feature-sm animate-box" data-animate-effect="fadeInLeft">
										<div class="fh5co-icon">
											<i class="icon-edit"></i>
										</div>
										<div class="fh5co-text" >
												<input type="text" name="nombreProd" placeholder="Nombre del Producto" />
										</div>								
									</div>
									<div class="fh5co-feature fh5co-feature-sm animate-box" data-animate-effect="fadeInLeft">
										<div class="fh5co-icon">
											<i class="icon-dollar"></i>
										</div>
										<div class="fh5co-text">
											<input type= "number" name="precioProd" placeholder="Precio del Producto $" />
										</div>								
									</div>
									<div class="fh5co-feature fh5co-feature-sm animate-box" data-animate-effect="fadeInLeft">
										<div class="fh5co-icon">
											<i class="icon-check"></i>
										</div>
										<div class="fh5co-text">
											<input type= "number" name="nProd" placeholder="Existencia" />
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="fh5co-feature fh5co-feature-sm animate-box" data-animate-effect="fadeInLeft">
										<div class="fh5co-icon">
											<i class="icon-file-photo-o"></i>
										</div>
										<div class="fh5co-text">
											<input type= "url" name="linkProd" placeholder="Link de la Imagen" />
										</div>
									</div>
									<div class="fh5co-feature fh5co-feature-sm animate-box" data-animate-effect="fadeInLeft">
										<div class="fh5co-icon">
											<i class="icon-th-list"></i>
										</div>
										<div class="fh5co-text">
											<textarea name="descripcionProd" cols="25" placeholder="Descripción del Producto" ></textarea>
										</div>
									</div>
									
									<div class="fh5co-feature fh5co-feature-sm animate-box" data-animate-effect="fadeInLeft">
										<div class="fh5co-text">
											<input type= "submit" name="datProd"  method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"/>
										</div>
									</div>
									<?php  
									//FORMA NO ESTATICA: solo funciona una vez no se puede utilizar mas ese objeto
 									//$login = new CtrlFormularios();
									//$login->ctrlLogin();
									//FORMA ESTATICA: podemos reutilzar el valor
 									?>
								</div>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- jQuery -->
	<script src="../js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="../js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="../js/bootstrap.min.js"></script>
	<!-- Carousel -->
	<script src="../js/owl.carousel.min.js"></script>
	<!-- Stellar -->
	<script src="../js/jquery.stellar.min.js"></script>
	<!-- Waypoints -->
	<script src="../js/jquery.waypoints.min.js"></script>
	<!-- Counters -->
	<script src="../js/jquery.countTo.js"></script>
	<!-- Google Map -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCefOgb1ZWqYtj7raVSmN4PL2WkTrc-KyA&sensor=false"></script>
	<script src="../js/google_map.js"></script>

	
	
	<!-- MAIN JS -->
	<script src="../js/main.js"></script>

	<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$altas=CtrlFormularios::ctrlRegistroProducto();
		if($altas=="ok"){
			echo '<script language = "javascript">
				
				if(window.history.replaceState){
					window.history.replaceState(null,null,window.location.href);
				}
				
				</script>';
				echo '<div class="col-md-6">
				</div>
				<div class="col-md-3">
				<div class="alert alert-success">Producto registrado correctamente</div>
				</div>';
		}else{
			echo '<script>
			if(window.history.replaceState){
				window.history.replaceState(null,null,window.location.href);
			}
			</script>';
			echo '<div class="alert alert-warning">Producto no agregado</div>';
		}
	}
	?>
	</body>


</html>
