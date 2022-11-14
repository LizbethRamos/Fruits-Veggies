<?php require_once "../modelos\mdlformularios.php"; ?>
<?php 
        
        $valor = $_POST['idusuario'];
            if(isset($_POST["tipousuario"])){
                $tabla ="empleados";

                $item="id_empleado";
                $respuesta=MdlFormulario::mdlLogin($tabla,$item,$valor);

                if($respuesta["id_empleado"]==$_POST["idusuario"] && $respuesta["pwd"]==$_POST["pwdusuario"]){
                    if ($respuesta["rol"] =="Administrador" ) {
                        session_start();
                        $_SESSION["usuario"] = $_POST["id_empleado"];
                        $_SESSION["tipo"] = "Administrador";
                        echo '<script>
                        if(window.history.replaceState){
                            window.history.replaceState(null,null,window.location.href);
                        }
                        window.location="../administrador/administrador.php";
                        </script>';
                        echo '<div class="alert alert-success">Se ha iniciado sesion</div>';
                    } 
                }else{
                         session_start();
                        $_SESSION["usuario"] = $_POST["id_empleado"];
                        $_SESSION["tipo"] = "empleado";
                    echo '<div class="alert alert-warning">Empleado No Encontrado</div>';
                    echo '<script>
                    if(window.history.replaceState){
                        window.history.replaceState(null,null,window.location.href);
                    }
                     </script>';
                }
            }
            if(!empty($_POST["idusuario"]) && !empty($_POST["pwdusuario"])){
                if(!isset($_POST["tipousuario"])){
                        $tabla ="clientes";
                        $datos="id_cliente";
                        $respuesta=MdlFormulario::mdlLogin($tabla,$datos,$valor);
                        if ($respuesta["id_cliente"]==$_POST["idusuario"] && $respuesta["pwd"] == $_POST["pwdusuario"]) {
                            echo '<script  type="text/javascript">
                            if(window.history.replaceState){
                                window.history.replaceState(null,null,window.location.href);
                            }
                            window.location="../Clientes/clientelogeado.php";
                            </script>';
                            session_start();
                            $_SESSION["usuario"] = $_POST['idusuario'];
                            $_SESSION["tipo"] = "Cliente";
                        }
                }else{
                    echo '<div class="alert alert-warning">Empleado No Encontrado</div>';
                    echo '<script>
                    if(window.history.replaceState){
                        window.history.replaceState(null,null,window.location.href);
                    }
                    window.location="ingresar.php";
                     </script>';
                }
            }
            else{
                echo "No Ha Ingresado Datos";
                echo '<script>
                    if(window.history.replaceState){
                        window.history.replaceState(null,null,window.location.href);
                    }
                     </script>';
            }
?>