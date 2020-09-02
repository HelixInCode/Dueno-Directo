<?php 
include ('../conexion.php');

$conPropiedades=mysqli_query($conexion, "SELECT * FROM propiedad")or die(mysqli_error($conexion));

while($PRO=mysqli_fetch_array($conPropiedades)){  
echo json_encode($PRO);

}

?>