<?php 
 require_once "../controladores\ctrlFormularios.php"; 
 require_once "../modelos\mdlformularios.php";  

if(isset($_GET['id'])){
	$conn = Conexion :: conectar();
	$id = $_GET['id'];

	$query = $conn->prepare("SELECT * FROM pedidos WHERE id_pedido = $id");
	$query->execute();
	$pedido = $query -> fetch();

	$id_producto = $pedido['id_producto'];
	$query = $conn->prepare("SELECT * FROM productos WHERE id_producto = $id_producto");
	$query->execute();
	$producto = $query -> fetch();
}
?>
<!DOCTYPE html>
	<head>
	<title>Pedido</title>
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
					<li ><a href="index.php">Salir</a></li>
					<li ><a href="administrador.php">Admin.</a></li>
					<li class="fh5co-active"><a href="pedido.php">Pedidos</a></li>
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
                        <h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">Detalle de Pedidos</h2>
							<div class="fh5co-feature fh5co-feature-sm animate-box" data-animate-effect="fadeInLeft">
                                <div class="col-md-4"></div>
                                <div class="col-md-1">
                                    <div class="fh5co-icon-max">
									    <i class="icon-user"></i>
                                    </div>
                                </div>	
                                <div class="col-md-3">
									<input type="text" id="id_pedido" value="<?php echo $pedido['id_cliente'] ?>" hidden>
									<p class="fh5co-text"><?php echo $pedido['id_cliente'] ?></p>
                                    <p class="fh5co-text"><?php echo $pedido['estado'] ?>o</p>
                                </div>				
							</div>
                        <div class="col-md-12">
							<div class="fh5co-feature fh5co-feature-sm animate-box" data-animate-effect="fadeInLeft">
								<table class="Tabla-detalles">
									<thead>
										<td class="icon-sticky-note">ID Producto</td>
										<td class="icon-sort-numeric-desc"> Cantidad</td>
										<td class="icon-notebook"> Nombre del producto</td>
										<td class="icon-usd" > Precio por unidad</td>
										<td class="icon-dollar" > Total</td>
									</thead>
                                    <tr>
										<td><?php echo $pedido['id_producto'] ?></td>
										<td><?php echo $pedido['cantidad'] ?></td>
										<td><?php echo $producto['nombre'] ?></td>
										<td><?php echo $producto['precio'] ?></td>
										<td><?php echo $pedido['total'] ?></td>
                                    </tr>
                                </table>
                            </div>
						</div>
						<form action="" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
							<div class="col-md-8">
							</div>
							<div class="col-md-4">
								<div class="fh5co-feature fh5co-feature-sm animate-box" data-animate-effect="fadeInLeft">
									<button class="btn-block" type="" >Despachar</button>
								</div>
							</div>
						</form>
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

	<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$id_pedido = $_POST['id_pedido'];
			$respuesta=CtrlFormularios::ctrlActualizarPedido($id_pedido);
			if($respuesta=="ok"){
				echo '<script language = "javascript">
					
					if(window.history.replaceState){
						window.history.replaceState(null,null,window.location.href);
					}
					
					</script>';
					echo '<div class="col-md-6">
					</div>
					<div class="col-md-3">
					<div class="alert alert-success">Producto Entregado</div>
					</div>';
			}else{
				echo '<script>
				if(window.history.replaceState){
					window.history.replaceState(null,null,window.location.href);
				}
				</script>';
				echo '<div class="alert alert-warning">Producto no agregado</div>';
			}

			echo '<script>
			if(window.history.replaceState){
				window.history.replaceState(null,null,window.location.href);
			}
			window.location="pedido.php";
			</script>';
		}
	
	?>
</html>

