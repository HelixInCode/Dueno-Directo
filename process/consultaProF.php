<?php 
include ('../conexion.php');
header('Content-Type: application/json; charset=utf-8');

$conProf=mysqli_query($conexion, "SELECT * FROM profesional")or die(mysqli_error($conexion));

while($PROF=mysqli_fetch_array($conProf)){  
$arrayProf[] =$PROF;

}
// var_dump($arrayProf);
echo json_encode($PROF, JSON_UNESCAPED_UNICODE);
?>