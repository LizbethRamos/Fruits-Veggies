<?php
    class CtrlFormularios{

       public function ctrlLogin(){
            //$valoraux = $_POST['idusuario'];
            $valor = '';
            if(isset($_POST["tipousuario"])){
                $tabla ="empleados";
                //$datos=array("id_empleado"=>$_POST['idusuario'],"pass"=>$_POST['pwdusuario'],"tipo"=>$_POST['tipousuario']);
                $item="id_empleado";
                $valor=$_POST['idusuario'];
                $respuesta=MdlFormulario::mdlLogin($tabla,$item,$valor);

                if($respuesta["id_empleado"]==$_POST["idusuario"] && $respuesta["pwd"]==$_POST["pwdusuario"]){
                    if ($respuesta["rol"] =="Administrador" ) {
                        echo '<script>
                        if(window.history.replaceState){
                            window.history.replaceState(null,null,window.location.href);
                        }
                        window.location="administrador/administrador.php";
                        </script>';
                        echo '<div class="alert alert-success">Se ha iniciado sesion</div>';
                    } else{
                        echo '<script>
                        if(window.history.replaceState){
                            window.history.replaceState(null,null,window.location.href);
                        }
                        window.location="pedido.php";
                        </script>';
                        echo '<div class="alert alert-success">Se ha iniciado sesion</div>';
                    }
                    
                }else{
                    echo '<script>
                    if(window.history.replaceState){
                        window.history.replaceState(null,null,window.location.href);
                    }
                     </script>';
                     echo '<div class="alert alert-warning">Error al ingresar</div>';
                }
            }else{
                $tabla ="clientes";
                $datos="id_cliente";
                //$valor=$_POST['idusuario'];
                $respuesta=MdlFormulario::mdlLogin($tabla,$datos,$valor);
                echo '<pre>'; print_r($respuesta); echo '</pre>';
                if ($respuesta["id_cliente"]==$_POST["idusuario"] && $respuesta["pwd"] == $_POST["pwdusuario"]) {
                    echo '<script>
                        if(window.history.replaceState){
                            window.history.replaceState(null,null,window.location.href);
                        }
                    </script>';
                    echo '<div class="alert alert-success">Se ha iniciado sesion</div>';
                }
                //echo '<pre>'; print_r($respuesta); echo '</pre>';
            }
                //return $respuesta;
               // echo '<pre>'; print_r($respuesta); echo '</pre>';
           
       }
       //Fin del metodo login
       static public function ctrlRegistroProducto(){
            if(isset($_POST['datProd'])){
                $tabla="productos";
                $datos=array("nombre"=>$_POST['nombreProd'],"descripcion"=>$_POST['descripcionProd'],
                "precio"=>$_POST['precioProd'],"existencia"=>$_POST['nProd'],"img"=>$_POST['linkProd']);

                $respuesta=MdlFormulario::mdlRegistroProducto($tabla,$datos);
                return $respuesta;
            }
       }

       static public function ctrlSeleccionarProductos(){
            $tabla="productos";
            $respuesta=MdlFormulario::mdlSeleccionarProductos($tabla);
            return $respuesta;
       }


       static public function ctrlModificarProducto(){
        if(isset($_POST['datProd'])){
            $tabla="productos";
            $id = $_POST['idMod'];
            $datos=array("nombre"=>$_POST['nombreProd'],"descripcion"=>$_POST['descripcionProd'],
            "precio"=>$_POST['precioProd'],"existencia"=>$_POST['nModProd'],"img"=>$_POST['linkProd']);

            $respuesta = MdlFormulario::mdlModificar($tabla,$datos, $id);
            return $respuesta;
        }
        }

        static public function ctrlAgregarPedido($id_producto, $id_cliente){
            if (isset($_POST['Pedir'])) {
                $tabla="pedidos";
                $producto = MdlFormulario::mdlConsultarUno($id_producto);
                $total =  (int) $producto['precio'] * (int) $_POST['cantidad'];
                $respuesta = MdlFormulario::mdlAgregarPedido($tabla, $id_producto, $id_cliente, $total, $_POST['cantidad']);

                return $respuesta;
            }
        }

        static public function ctrlAgregarProductosPedido($id_pedido, $id_producto){
            if(isset($_POST['datProd'])){
                $tabla="productos_pedido";

                $var = MdlFormulario::mdlConsultarUno($id_producto);
                $total = $var['precio'] * $_POST[$id_producto];

                $datos=array("id_pedido"=>$id_pedido,"id_producto"=>$id_producto,
                "num_producto"=>$_POST[$id_producto],"total"=>$total);

                $respuesta = MdlFormulario::mdlAgregarProductosPedido($tabla, $datos);
                return $respuesta;
            }
        }

        static public function ctrlConsultarPedidos(){
            $tabla = "pedidos";
            $respuesta = MdlFormulario::mdlConsultarPedidos($tabla);
            return $respuesta;
        }

        static public function ctrlConsultarProductos(){
            $tabla = "productos";
            $respuesta = MdlFormulario::mdlSeleccionarProductos($tabla);
            return $respuesta;
        }

        static public function ctrlActualizarPedido($id_pedido){
            $tabla = "pedidos";
            $estado = "Entregado";
            $fecha_entrega = date("Y")."-".date("m")."-".date("d");
            echo $fecha_entrega, "<--- Fecha";
            $datos=array("estado"=>$estado, "fecha_entrega"=>$fecha_entrega);
            $respuesta = MdlFormulario::mdlActualizarPedido($tabla, $id_pedido, $datos);
            return $respuesta;
        }
    }
    
?>