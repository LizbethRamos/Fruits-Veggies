<?php
include("../modelos/conexion.php");

if(isset($_GET['id'])) {
  
  $conn = Conexion :: conectar();
  $id = $_GET['id'];
  $query = "DELETE FROM productos WHERE id_producto = $id";
  $result = $conn->exec($query);
  if(!$result) {
    die("Query Failed.");
  }
  header('Location: administrador.php');
}
?>