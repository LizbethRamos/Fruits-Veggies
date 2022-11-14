<?php 
 require_once "../controladores\ctrlFormularios.php"; 
 require_once "../modelos\mdlformularios.php";  
$productos= CtrlFormularios::ctrlSeleccionarProductos();
session_start();
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
					<li class="fh5co-active"><a href="clientelogeado.php">Productos</a></li>
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
				<h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">Catálogo</h2>
					<div class="row animate-box" data-animate-effect="fadeInLeft">
						<?php foreach($productos as $key=>$value):?>
							<div class="col-md-4 work-item">
								<img id="img1" src="<?php echo $value['img'] ?>" alt="M<?php echo $value['nombre']?>" class="img-responsive">
								<h3 id="h31" class="fh5co-work-title"><?php echo $value['nombre'] ?></h3>
								<p id="<?php echo $value['id_producto'] ?>">#<?php echo $value['id_producto'] ?> <?php echo $value['descripcion'] ?> <?php echo $value['precio'] ?>
								<a id="<?php echo $value['id_producto'] ?>" href="hacerPedido.php?id_producto=<?php echo $value['id_producto'];?>">
								<i ></i>
								<button id="<?php echo $value['id_producto'] ?>" class="icon-shopping-cart" ></button>	
							</a></p>
							</div>
							<div class="clearfix visible-md-block visible-sm-block"></div>
						<?php endforeach?>
						<!--  
					<div class="clearfix visible-md-block visible-sm-block"></div>

					<div class="clearfix visible-sm-block"></div>
					<div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 work-item">
						<img id="img9" src="https://media.istockphoto.com/photos/full-frame-peaches-at-the-farmers-market-picture-id1023568100?b=1&k=6&m=1023568100&s=170667a&w=0&h=cJaT0Q7ffgtoludDaTy86nPstpBefk-CLmaad-DGXxk=" class="img-responsive">
						<h3 class="fh5co-work-title">Durazno</h3>
						<p>#9 Caja 18kg $900.00
							<a href="#">
								<i class="icon-shopping-cart"></i>
							</a>						
						</p>
					</div>-->
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
	<script>
		function agregar_producto(id){
			if(orden_pedidos.indexOf(id) < 0){
				orden_pedidos.push(id);
				alert(orden_pedidos);
			}
		}		

		function guardar(){
			localStorage.setItem('orden_pedidos', JSON.stringify(orden_pedidos));
			
		}
	</script>
	</body>
</html>

