<?php 
session_start();
include('../conexion.php'); 
    

if(isset($_POST['editar'])){
   $id_cat = mysqli_real_escape_string($conexion, $_POST['id_cat']);
   $seccion = mysqli_real_escape_string($conexion, $_POST['seccion']);
   $categoria = mysqli_real_escape_string($conexion, $_POST['categoria']);
   $descripcion = mysqli_real_escape_string($conexion, $_POST['descripcion']);

  $update_categoria = mysqli_query($conexion, "UPDATE categoria SET seccion = '$seccion', categoria ='$categoria', descripcion = '$descripcion' WHERE id_categoria = '$id_cat' ") or die("problemas actualizando la informacion:".mysqli_error($conexion)); 
    if($update_categoria){
       header("Location: ../master.php");
   }
   else{
       echo "no se pudieron actualizar los datos";
   }
    
 }
?>