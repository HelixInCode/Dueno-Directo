<?php
session_start();
include('../conexion.php');
if (isset($_SESSION['id'])) {

    $id_user = $_SESSION['id'];
    $user = $_SESSION['usuario'];


?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Dueño Directo</title>
  
  <!-- icono de la pestaña -->
  <link rel="icon" href="../dist/img/logo-icon.png"> 
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <!-- Google Fonts Ubuntu bold-->
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="../dist/css/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="../dist/css/mdb.min.css">
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" href="../src/css/style.css">
</head>
<body>
    <?php
    
   if (isset($_POST['Enviar'])) {
      $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
      $id_user=$_POST['id'];

      $query = mysqli_query($conexion, "UPDATE user SET imagen='$imagen' WHERE id='$id_user'");
      if ($query){
         header("location: ../home.php");
         echo '<div class="alert alert-success" role="alert">Imagen guardada correctamente</div>';
       }
       else{
         echo "Error al guardar imagen de Perfil";
       }
     }
    ?>

</footer>
<!-- jQuery -->
<script type="text/javascript" src="../dist/js/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="../dist/js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="../dist/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="../dist/js/mdb.min.js"></script>
<!-- Your custom scripts (optional) -->
</body>
</html>
<?php
    }  else {
        header ("Location: ../index.php");
    }
?>