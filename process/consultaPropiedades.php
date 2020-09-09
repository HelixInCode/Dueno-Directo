<?php 
include ('../conexion.php');
header('Content-Type: application/json; charset=utf-8');

$conPropiedades=mysqli_query($conexion, "SELECT * FROM propiedad")or die(mysqli_error($conexion));

while($PRO=mysqli_fetch_array($conPropiedades)){  
    $arrayPro[]=$PRO;
    
}
// var_dump($arrayPro);
echo json_encode($arrayPro, JSON_UNESCAPED_UNICODE);
?>