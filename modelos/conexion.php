<?php
    class Conexion{

       static public function conectar(){
           try{
           $link=new PDO("mysql:host=localhost;dbname=fruits_veggies2","root","");
           //$link->exec("set names utf8");
           $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           return $link;
            }
        catch(PDOException $e)
            {
            echo "Error: " . $e->getMessage();
            return "x";
            }
       } 


    }
?>