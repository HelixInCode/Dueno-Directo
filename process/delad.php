<?php
session_start();
include ('../conexion.php');
    if(isset($_SESSION['Nombre'])){
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Dueño Directo</title>
  
  <!-- icono de la pestaña -->
  <!-- <link rel="icon" href="dist/img/logo-de-cit.ico"> -->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <!-- Google Fonts Ubuntu bold-->
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="dist/css/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="dist/css/mdb.min.css">
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" href="dist/css/style.css">
</head>
<body>
  <?php

  if (isset($_POST['Enviar'])) {
    $idborrar = mysqli_real_escape_string($conexion, $_POST['delad']);
    $idadmin = mysqli_real_escape_string ($conexion, $_POST['master']);
    $claveid = mysqli_query($conexion, "SELECT clave FROM masteradmin WHERE idMaster = '" . $idadmin . "'");
    $clave = mysqli_fetch_array ($claveid);
    $claveid = $clave ['clave'];
    $claveadmin =  mysqli_real_escape_string ($conexion, $_POST['clave']);
    $claveadmin = crypt($claveadmin, "masteradmins");

    if ($claveid == $claveadmin){
      $borraradmin = mysqli_query($conexion, "DELETE FROM masteradmin WHERE idMaster = '$idborrar'") or die(mysqli_error($conexion));
      if ($borraradmin){
         header("location: ../master.php");
         echo '<div class="alert alert-success" role="alert">Administrador eliminado correctamente</div>';
       }
       else{
         echo "Error al borrar administrador";
       }
      } else {
      echo "No tiene permiso para realizar esta accion";
     }
    }   
    //$user=$_SESSION['Nombre'];
    //$nameAd= $_POST['delad'];
    //$clave = mysqli_real_escape_string($conexion, $_POST['clave']);
    //$clave = crypt($clave,"masteradmins");

    //$permiso = mysqli_query($conexion,"SELECT * FROM masteradmin WHERE Nombre='$user' AND clave='$clave'") or die(mysqli_error($conexion));
            //$resultado=mysqli_num_rows($permiso);//cuento el número de coincidencias
            //$row = mysqli_fetch_array($permiso);


            //if($resultado==1) {

            //$victima= mysqli_query($conexion, "DELETE FROM masteradmin WHERE Nombre='$nameAd'") or die(mysqli_error($conexion));

                //if($victima){ 
                
                    //echo '<h5 class="card-header info-color white-text text-center py-4">
                    //<strong>Administrador Eliminado por "'.$user.'"</strong></h5>';

                    //echo '<a href="../master.php>Volver</a>"';

                 //} else{
                        //echo "Hubo un error al intentar eliminar al administrador";
                    //}
                        

            //}else {
              //echo "No tiene permisos para realizar esta operación";
            //}

   


    

  ?>
  <div class="contenedor-inferior">
    © 2020 Copyright:
    <a href="#"> dueñosdirecto.com</a>
  </div>
</footer>
<!-- jQuery -->
<script type="text/javascript" src="dist/js/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="dist/js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="dist/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="dist/js/mdb.min.js"></script>
<!-- Your custom scripts (optional) -->
<script type="text/javascript" src="src/js/svg.js"></script>
<script type="text/javascript" src="src/js/login.js"></script>
<script type="text/javascript" src="src/js/filtros.js"></script>
</body>
</html>
<?php
    }  else {
        header ("Location: lgn.php");
    }
?>