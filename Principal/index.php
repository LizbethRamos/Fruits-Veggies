<?php 
 require_once "../controladores\ctrlFormularios.php"; 
 require_once "../modelos\mdlformularios.php";  
$productos= CtrlFormularios::ctrlSeleccionarProductos();
?>
<script> var orden_pedidos = [];</script>
<!DOCTYPE html>
	<head>
		<title>Fruits&Veggies</title>
		<!-- Animate.css -->
		<link rel="stylesheet" href="../css/animate.css">
		<!-- Icomoon Icon Fonts-->
		<link rel="stylesheet" href="../css/icomoon.css">
		<!-- Bootstrap  -->
		<link rel="stylesheet" href="../css/bootstrap.css">
		<!-- Theme style  -->
		<link rel="stylesheet" href="../css/style.css">
		<!-- Modernizr JS -->
		<script src="../js/modernizr-2.6.2.min.js"></script>
	</head>
	<body>

	<div id="fh5co-page">
		<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
		<aside id="fh5co-aside" role="complementary" class="border js-fullheight">

			<h1 id="fh5co-logo"><a href="index.php"><img src="../images/logo.png" alt="Fruits&Veggies"></a></h1>
			<nav id="fh5co-main-menu" role="navigation">
				<ul>
					<li class="fh5co-active"><a href="index.php">Productos</a></li>
					<li><a href="about.php">Nosotros</a></li>
					<li><a href="contact.php">Contacto</a></li>
					<li><a href="ingresar.php">Ingresar</a></li>
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
			<div class="fh5co-narrow-content">
				<h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">Catálogo</h2>
					<div class="row animate-box" data-animate-effect="fadeInLeft">
						<?php foreach($productos as $key=>$value):?>
							<div class="col-md-4 work-item">
								<img id="img1" src="<?php echo $value['img'] ?>" alt="M<?php echo $value['nombre']?>" class="img-responsive">
								<h3 id="h31" class="fh5co-work-title"><?php echo $value['nombre'] ?></h3>
								<p id="<?php echo $value['id_producto'] ?>">#<?php echo $value['id_producto'] ?> <?php echo $value['descripcion'] ?> <?php echo $value['precio'] ?>
								<a id="<?php echo $value['id_producto'] ?>" href="#">
								<i ></i>
								<button id="<?php echo $value['id_producto'] ?>" class="icon-shopping-cart" ></button>	
							</a></p>
							</div>
							<div class="clearfix visible-md-block visible-sm-block"></div>
						<?php endforeach?>
					<div class="clearfix visible-md-block"></div>
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
	
	<!-- MAIN JS -->
	<script src="../js/main.js"></script>
	
	</body>
</html>

