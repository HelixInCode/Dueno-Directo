<?php

session_start();
include('../conexion.php'); 

if(isset($_POST['Modificar'])){

    $idAdmin= mysqli_real_escape_string($conexion, $_POST['idAd']);
    $nombre= mysqli_real_escape_string($conexion, $_POST['nombre']);
    $email= mysqli_real_escape_string($conexion, $_POST['email']);

    $updAdm= mysqli_query($conexion, "UPDATE masteradmin SET Nombre='$nombre', email='$email' WHERE idMaster='$idAdmin'")or die("problemas actualizando la informacion:".mysqli_error($conexion));
    if($updAdm){
        header("Location: ../master.php");
    }else{
        echo "No se pudieron actualizar los datos";
    }


}

?>