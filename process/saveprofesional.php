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
  <link rel="stylesheet" href="../dist/css/style.css">
</head>
<body>
  <?php
  if (isset($_POST['profesional'])) {
      $profesionaltype = mysqli_real_escape_string($conexion, $_POST['profesional']);
      $titulacion = mysqli_real_escape_string($conexion, $_POST['titulacion']);
      $telefono = mysqli_real_escape_string($conexion, $_POST['telefono']);
      $provincia = mysqli_real_escape_string($conexion, $_POST['provincia']);
      $municipalidad = mysqli_real_escape_string($conexion, $_POST['municipalidad']);
      $img1= addslashes(file_get_contents($_FILES['imagen1']['tmp_name']));
      $img2= addslashes(file_get_contents($_FILES['imagen2']['tmp_name']));
      $img3= addslashes(file_get_contents($_FILES['imagen3']['tmp_name']));
      $img4= addslashes(file_get_contents($_FILES['imagen4']['tmp_name']));
      $img5= addslashes(file_get_contents($_FILES['imagen5']['tmp_name']));
      $ruta1= $_FILES['imagen1']['name'];
      $tipo1= $_FILES['imagen1']['type'];
      $ruta2= $_FILES['imagen2']['name'];
      $tipo2= $_FILES['imagen2']['type'];
      $ruta3= $_FILES['imagen3']['name'];
      $tipo3= $_FILES['imagen3']['type'];
      $ruta4= $_FILES['imagen4']['name'];
      $tipo4= $_FILES['imagen4']['type'];
      $ruta5= $_FILES['imagen5']['name'];
      $tipo5= $_FILES['imagen5']['type'];
      $publicaciontime = mysqli_real_escape_string($conexion, $_POST['tiempo-publicacion']);
      $estado = mysqli_real_escape_string($conexion, $_POST['estado']);

      if ($img1 == !NULL & $img2 == !NULL & $img3 == !NULL & $img4 == !NULL & $img5 == !NULL){
        ///pongo límite de 8 gb para el tamaño de las imagenes
        $limite_kb = 2384;
        $fechaactual  = date("dHi");
        $nAleatorio  = rand(10, 99);
        //concateno la fecha actual y 2 numeros aleatorios  con el nombre de la imagen para evitar nombres repetidos en el directorio
        $ruta1= $nAleatorio.$fechaactual.$ruta1;
        $ruta2= $nAleatorio.$fechaactual.$ruta2;
        $ruta3= $nAleatorio.$fechaactual.$ruta3;
        $ruta4= $nAleatorio.$fechaactual.$ruta4;
        $ruta5= $nAleatorio.$fechaactual.$ruta5;

        $extension_correcta1 = ($tipo1 == 'image/jpeg' or $tipo1 == 'image/jpg' or $tipo1 == 'image/png' or $tipo1 == 'image/gif');
        $extension_correcta2 = ($tipo2 == 'image/jpeg' or $tipo2 == 'image/jpg' or $tipo2 == 'image/png' or $tipo2 == 'image/gif');
        $extension_correcta3 = ($tipo3 == 'image/jpeg' or $tipo3 == 'image/jpg' or $tipo3 == 'image/png' or $tipo3 == 'image/gif');
        $extension_correcta4 = ($tipo4 == 'image/jpeg' or $tipo4 == 'image/jpg' or $tipo4 == 'image/png' or $tipo4 == 'image/gif');
        $extension_correcta5 = ($tipo5 == 'image/jpeg' or $tipo5 == 'image/jpg' or $tipo5 == 'image/png' or $tipo5 == 'image/gif');

        if($extension_correcta1 && $extension_correcta2 && $extension_correcta3 && $extension_correcta4 && $extension_correcta5){
           
          if($_FILES['imagen1']['size']<= $limite_kb * 1024 && $_FILES['imagen2']['size']<= $limite_kb * 1024 && $_FILES['imagen3']['size']<= $limite_kb * 1024 && $_FILES['imagen4']['size']<= $limite_kb * 1024 && $_FILES['imagen5']['size']<= $limite_kb * 1024){ 

      
              $guardar = mysqli_query($conexion, "INSERT INTO profesional (profesional, titulacion, telefono, provincia, localidad, imagen1, imagen2, imagen3, imagen4, imagen5, idUser, estado) VALUES ('$profesionaltype','$titulacion','$telefono','$provincia','$municipalidad','$ruta1','$ruta2','$ruta3','$ruta4','$ruta5','$id_user', '$estado')") or die(mysqli_error($conexion));

              if ($guardar){
                  header("location: ../publicacion.php");
                      echo '<div class="alert alert-success" role="alert">Propiedad creada correctamente</div>';
                      } else { echo "error al guardar los datos";
              }
    
    
         
           }else{ echo "El tamaño del algunas imagenes son mayores a lo permitido";}
        }else{ echo "La extencinon es incorrecta";}
      }else{ echo "Deben cargarse las 5 imagenes";}
    }else{ echo "Error a traer los datos";}
  ?>
  <div class="contenedor-inferior">
    © 2020 Copyright:
    <a href="#"> dueñosdirecto.com</a>
  </div>
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