<?php 
include ('../conexion.php');
header('Content-Type: application/json');

$conPropiedades=mysqli_query($conexion, "SELECT * FROM propiedad")or die(mysqli_error($conexion));

while($PRO=mysqli_fetch_array($conPropiedades)){  
    $arrayPro[]=$PRO;
    
}
// var_dump($arrayPro);
echo json_encode($arrayPro);
?>