<?php require_once "../controladores\ctrlFormularios.php"; ?>
<?php require_once "../modelos\mdlformularios.php"; ?>
<?php

	if(isset($_GET['id'])){
		$conn = Conexion :: conectar();
		$id = $_GET['id'];
		$query = $conn->prepare("SELECT * FROM productos WHERE id_producto = $id");
		$query->execute();
		$productos = $query -> fetch();
	}
?>
<!DOCTYPE html>
	<head>
	<title>Modificar Productos</title>
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
		<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle dark"><i></i></a>
		<aside id="fh5co-aside" role="complementary" class="js-fullheight">

			<h1 id="fh5co-logo"><a href="../index.php"><img src="../images/logo.png" alt="Fruits&Veggies"></a></h1>
			
			<nav id="fh5co-main-menu" role="navigation">
				<ul>
					<li ><a href="admin_logeado.php">Productos</a></li>
					<li class="fh5co-active"><a href="administrador.php">Admin</a></li>
					<li ><a href="../Principal/index.php">Salir</a></li>
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
					<form class="modificarProd" method="POST" >
						<fieldset>
							<legend> Modificar Producto</legend>
							<div class="row">
								<div class="col-md-4">
									<div class="fh5co-feature fh5co-feature-sm animate-box" data-animate-effect="fadeInLeft">
										<div class="fh5co-icon">
											<i class="icon-search"></i>
										</div>
										<div class="fh5co-text" >
											<input type="text" name="idMod" value="<?php echo $productos["id_producto"] ?>" readonly>
										</div>								
									</div>
									<div class="fh5co-feature fh5co-feature-sm animate-box" data-animate-effect="fadeInLeft">
										<div class="fh5co-icon">
											<i class="icon-file-photo-o"></i>
										</div>
										<div class="fh5co-text">
											<input type= "url" name="linkProd" value="<?php echo $productos['img'] ?>"/>
										</div>
									</div>
									<div class="fh5co-feature fh5co-feature-sm animate-box" data-animate-effect="fadeInLeft">
										<div class="fh5co-icon">
											<i class="icon-dollar"></i>
										</div>
										<div class="fh5co-text">
											<input type= "number" name="precioProd" value="<?php echo $productos["precio"] ?>"/>
										</div>								
									</div>
								</div>
								<div class="col-md-4">
									<div class="fh5co-feature fh5co-feature-sm animate-box" data-animate-effect="fadeInLeft">
										<div class="fh5co-icon">
											<i class="icon-edit"></i>
										</div>
										<div class="fh5co-text" >
												<input type="text" name="nombreProd" value="<?php echo $productos["nombre"] ?>"/>
										</div>								
									</div>
									
									<div class="fh5co-feature fh5co-feature-sm animate-box" data-animate-effect="fadeInLeft">
										<div class="fh5co-icon">
											<i class="icon-th-list"></i>
										</div>
										<div class="fh5co-text">
											<textarea name="descripcionProd" cols="22" ><?php echo $productos["descripcion"] ?></textarea>
										</div>
									</div>
									<div class="fh5co-feature fh5co-feature-sm animate-box" data-animate-effect="fadeInLeft">
										<div class="fh5co-icon">
											<i class="icon-check"></i>
										</div>
										<div class="fh5co-text">
											<input type= "number" name="nModProd" value="<?php echo $productos["existencia"] ?>" />
										</div>
									</div>
									<div class="fh5co-feature fh5co-feature-sm animate-box" data-animate-effect="fadeInLeft">
										<div class="fh5co-text">
											<input type= "submit" name="datProd"/>
										</div>
										
									</div>
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

	</body>

	<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$modificar=CtrlFormularios::ctrlModificarProducto();
		if($modificar=="ok"){
			echo '<script language = "javascript">
				window.location="administrador.php";
				</script>';
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
</html>

