<?php 
include ('../conexion.php');

$conProf=mysqli_query($conexion, "SELECT * FROM profesional")or die(mysqli_error($conexion));

while($PROF=mysqli_fetch_array($conProf)){  
echo json_encode($PROF);

}

?>