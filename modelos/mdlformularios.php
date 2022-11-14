<?php
    require_once "conexion.php";

    class MdlFormulario{
      /*
      En esta parte por ejemplo
      */ 
        static public function mdlRegistroProducto($tabla,$datos){
            try{
            $stmt=Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, descripcion, precio, existencia, img)
            VALUES (:nombre, :descripcion, :precio, :existencia, :img)");

            $stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
            $stmt->bindParam(':descripcion', $datos['descripcion'], PDO::PARAM_STR);
            $stmt->bindParam(':precio', $datos['precio'], PDO::PARAM_STR);
            $stmt->bindParam(':existencia', $datos['existencia'], PDO::PARAM_STR);
            $stmt->bindParam(':img', $datos['img'], PDO::PARAM_STR);
            
            if($stmt->execute()){
                return "ok";
            }else{
                print_r(Conexion::conectar()->errorInfo());
                return "x";
                
            }
        }catch(PDOException $e)
            {
            echo "Error: " . $e->getMessage();
            }
            return "x";
           //$stmt->close();
            //$stmt=null;
        }


        static public function mdlSeleccionarProductos($tabla){
            $stmt=Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt->execute();
            return $stmt->fetchAll();
        }

        static public function mdlLogin($tabla,$item,$valor){
            $stmt=Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");    
            $stmt->bindParam(":".$item,$valor,PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
        }

        static public function mdlModificar($tabla, $datos, $id){
            try {
            $conn = Conexion::conectar();
            $sql = "UPDATE $tabla SET nombre = :nombre,
            descripcion = :descripcion,
            precio =  :precio,
            existencia = :existencia,
            img = :img WHERE id_producto = $id";

            $stmt = $conn->prepare($sql);

            $stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
            $stmt->bindParam(':descripcion', $datos['descripcion'], PDO::PARAM_STR);
            $stmt->bindParam(':precio', $datos['precio'], PDO::PARAM_STR);
            $stmt->bindParam(':existencia', $datos['existencia'], PDO::PARAM_STR);
            $stmt->bindParam(':img', $datos['img'], PDO::PARAM_STR);
            if($stmt->execute()){
                return "ok";
            }else{
                print_r(Conexion::conectar()->errorInfo());
                return "x";
            }
            
            } catch (\Throwable $e) {
                echo "Error: " . $e->getMessage();
                return "x";
            }
            
            
        }

        static public function mdlAgregarPedido($tabla, $id_producto ,$id_cliente, $total, $cantidad){
            $pedido = "Pedido";
            try {
                $stmt=Conexion::conectar()->prepare("INSERT INTO $tabla (estado, cantidad ,total, id_producto, id_cliente )
                VALUES (:estado,:cantidad,:total, :id_producto, :id_cliente)");
                $stmt->bindParam(':cantidad',$cantidad, PDO::PARAM_STR);
                $stmt->bindParam(':total',$total, PDO::PARAM_STR);
                $stmt->bindParam(':id_producto',$id_producto, PDO::PARAM_STR);
                $stmt->bindParam(':id_cliente',$id_cliente, PDO::PARAM_STR);
                $stmt->bindParam(':estado', $pedido, PDO::PARAM_STR);

                if($stmt->execute()){
                    return "ok";
                }else{
                    print_r(Conexion::conectar()->errorInfo());
                    return "x";
                }                
            } catch (\Throwable $e) {
            echo "Error: " . $e->getMessage();
            }
            return "x";
        }

        static public function mdlAgregarProductosPedido($tabla, $datos){
            try {
                $stmt=Conexion::conectar()->prepare("INSERT INTO $tabla (id_pedido, id_producto, num_producto, total)
                VALUES (:id_pedido, :id_producto, :num_producto, :total)");

                $stmt->bindParam(':id_pedido', $datos['id_pedido'], PDO::PARAM_STR);
                $stmt->bindParam(':id_producto', $datos['id_producto'], PDO::PARAM_STR);
                $stmt->bindParam(':num_producto', $datos['num_producto'], PDO::PARAM_STR);
                $stmt->bindParam(':total', $datos['total'], PDO::PARAM_STR);

                if($stmt->execute()){
                    return "ok";
                }else{
                    print_r(Conexion::conectar()->errorInfo());
                    return "x";
                }
                
            } catch (\Throwable $e) {
                echo "Error: " . $e->getMessage();
            }
            return "x";
        }

        static public function mdlConsultarUno($id_producto){
            $conn = Conexion :: conectar();
            $id = $id_producto;
            $query = $conn->prepare("SELECT * FROM productos WHERE id_producto = $id");
            $query->execute();
            
            return $query -> fetch();
        }

        static public function mdlConsultarPedidos($tabla){
            $stmt=Conexion::conectar()->prepare("SELECT * FROM $tabla ");   
            $stmt->execute();
            return $stmt->fetchAll();
        }

        static public function mdlActualizarPedido($tabla, $id, $datos){
            $conn = Conexion::conectar();
            $sql = "UPDATE $tabla SET estado = :estado,
            fecha_entrega = :fecha_entrega
            WHERE id_pedido = $id";

            $stmt = $conn->prepare($sql);

            $stmt->bindParam(':estado', $datos['estado'], PDO::PARAM_STR);
            $stmt->bindParam(':fecha_entrega', $datos['fecha_entrega'], PDO::PARAM_STR);

            if($stmt->execute()){
                return "ok";
            }else{
                print_r(Conexion::conectar()->errorInfo());
                return "x";
            }
        }
        

    }
?>