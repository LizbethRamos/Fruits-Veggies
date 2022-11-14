<?php require_once "../controladores\ctrlFormularios.php"; ?>
<?php require_once "../modelos\mdlformularios.php"; ?>
<?php
	session_start();
	if(isset($_GET['id_producto'])){
		$conn = Conexion :: conectar();
		$id = $_GET['id_producto'];
		$query = $conn->prepare("SELECT * FROM productos WHERE id_producto = $id");
		$query->execute();
		$producto = $query -> fetch();
	}
?>

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
		<aside id="fh5co-aside" role="complementary" class="border js-fullheight">
		<h1 id="fh5co-logo"><a href="index.php"><img src="../images/logo.png" alt="Fruits&Veggies"></a></h1>
			<nav id="fh5co-main-menu" role="navigation">
				<ul>
					<li ><a href="clientelogeado.php">Productos</a></li>
					<li><a href="about_logeado.php">Nosotros</a></li>
					<li><a href="contacto_logeado.php">Contacto</a></li>
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
			<div class="fh5co-narrow-content">
				<h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">Compra</h2>

					<div class="row animate-box" data-animate-effect="fadeInLeft">
					<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						<input type="text" value="<?php echo $producto['id_producto'] ?>" name="id_producto" hidden >
	                    <div class="col-md-5 col-sm-6 col-xs-6 col-xxs-12 work-item fh5co-icon">
							<img id="img1" src="<?php echo $producto['img'] ?>" alt="M<?php echo $producto['nombre']?>" class="img-responsive">
							<h3 id="" class="fh5co-work-title"><?php echo $producto['nombre'] ?></h3>
							<p id="<?php echo $producto['id_producto'] ?>">#<?php echo $producto['id_producto'] ?> <?php echo $producto['descripcion'] ?> <?php echo $producto['precio'] ?></p>
						</div>
						<div class="col-md-5 col-sm-6 col-xs-6 col-xxs-12 work-item fh5co-icon">
							<div>
								<h3>Detalles del pedido</h3>
								<label>Ingrese la candidad</label>
								<input type="number" name="cantidad" value=0/>
							</div>
							<h5></h5>
							<div class="fh5co-page">
								<input type="submit" class="btn btn-primary btn-md" value="Pedir" name="Pedir" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
								<a href="clientelogeado.php"><input class="btn btn-primary btn-md" value="Cancelar" name="Cancelar"></a>
							</div>
						</div>
					</form>
					</div>
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
	<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
			echo "Id_producto", $producto['id_producto'];
			
			echo "Id_Usuario", $_SESSION["usuario"];
			$id_pedido=CtrlFormularios::ctrlAgregarPedido($_POST['id_producto'], $_SESSION["usuario"]);
			if($id_pedido == "ok"){
				echo '<div class="alert alert-warning">Pedido agregado</div>';
			}else{
				echo '<div class="alert alert-warning">Pedido no agregado</div>';
			}

			echo '<script>
			if(window.history.replaceState){
				window.history.replaceState(null,null,window.location.href);
			}
			window.location="clientelogeado.php";
			 </script>';
	}
	?>

</html>
