<?php 
include ('../conexion.php');

$conPropiedades=mysqli_query($conexion, "SELECT * FROM propiedad")or die(mysqli_error($conexion));
$PRO=mysqli_fetch_array($conPropiedades);

$conPROF= mysqli_query($conexion, "SELECT * FROM profesional")or die(mysqli_error($conexion));
$PROF=mysqli_fetch_array($conPROF);

echo"propiedades:";
echo json_encode($PRO);
echo"profesionales:";
echo json_encode($PRO);


?>