<?php 
session_start();
include('../conexion.php'); 
    

if(isset($_POST['editar'])){
   $id_promo = mysqli_real_escape_string($conexion, $_POST['id_promo']);
   $categoria = mysqli_real_escape_string($conexion, $_POST['categoria']);
   $detalle = mysqli_real_escape_string($conexion, $_POST['detalle']);
   $promocion = mysqli_real_escape_string($conexion, $_POST['promociones']);
   $vencimiento = mysqli_real_escape_string($conexion, $_POST['vencimiento']);
   $precio = mysqli_real_escape_string($conexion, $_POST['precio']);

  $update_promo = mysqli_query($conexion, "UPDATE promociones SET categoria = '$categoria', detalle ='$detalle', promociones = '$promocion', vencimiento = '$vencimiento', precio = '$precio' WHERE idpromo = '$id_promo' ") or die("problemas actualizando la informacion:".mysqli_error($conexion)); 
    if($update_promo){
       header("Location: ../master.php");
   }
   else{
       echo "no se pudieron actualizar los datos";
   }
   
 }
?>