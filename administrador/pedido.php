<?php 
 require_once "../controladores\ctrlFormularios.php"; 
 require_once "../modelos\mdlformularios.php";  
$pedido = CtrlFormularios::ctrlConsultarPedidos();
?>

<!DOCTYPE html>
	<head>
	<title>Pedidos</title>
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

		<h1 id="fh5co-logo"><a href="index.php"><img src="../images/logo.png" alt="Fruits&Veggies"></a></h1>
			
			<nav id="fh5co-main-menu" role="navigation">
				<ul>
					
					<li ><a href="admin_logeado.php">Productos</a></li>
					<li ><a href="administrador.php">Admin.</a></li>
					<li class="fh5co-active" ><a href="pedido.php">Pedidos</a></li>
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
					<div class="row">
                        <h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">Lista de Pedidos</h2>
						<div class="col-md-3">
							<form action="">
								<div class="fh5co-feature fh5co-feature-sm animate-box" data-animate-effect="fadeInLeft">
									<div class="fh5co-icon">
										<i class="icon-sticky-note"></i> 
									</div>
									<div class="fh5co-text">
										<p><a>ID Pedido</a></p>
									</div>								
								</div>
							</div>
							<div class="col-md-3">
								<div class="fh5co-feature fh5co-feature-sm animate-box" data-animate-effect="fadeInLeft">
									<div class="fh5co-icon">
										<i class="icon-download2"></i> 
									</div>
									<div class="fh5co-text">
										<p><a>Estado</a></p>
									</div>								
								</div>
							</div>
							<div class="col-md-3">
								<div class="fh5co-feature fh5co-feature-sm animate-box" data-animate-effect="fadeInLeft">
									<div class="fh5co-icon">
										<i class="icon-calendar"></i>
									</div>
									<div class="fh5co-text">
										<p><a>Fecha de incio del pedido</a></p>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="fh5co-feature fh5co-feature-sm animate-box" data-animate-effect="fadeInLeft">
									<div class="fh5co-icon">
										<i class="icon-calendar"></i>
									</div>
									<div class="fh5co-text">
										<p><a>Fecha de entrega</a></p>
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="fh5co-feature fh5co-feature-sm animate-box" data-animate-effect="fadeInLeft">
									<table class="Tabla">
										<?php foreach($pedido as $key=>$value):?>
										<tr>
											<td><?php echo $value['id_pedido'] ?></td>
											<td><?php echo $value['estado'] ?></td>
											<td><?php echo $value['fecha_realizacion'] ?></td>
											<td><?php echo $value['fecha_entrega'] ?></td>
											<td class="fh5co-icon" ><a href="pedido_detallado.php?id=<?php echo $value['id_pedido'];?>" ><i class="icon-edit"></i></a></td>
										</tr>
										<?php endforeach?>
									</table>
								</div>
							</form>
                        </div>
					</div>
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

