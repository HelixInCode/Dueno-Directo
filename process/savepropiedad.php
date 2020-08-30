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
  if (isset($_POST['propiedad'])) {
      $propiedadname = mysqli_real_escape_string($conexion, $_POST['nombre']);
      $tipopropiedad = mysqli_real_escape_string($conexion, $_POST['tipo-propiedad']);
      $peso = mysqli_real_escape_string($conexion, $_POST['peso']);
      $dolar = mysqli_real_escape_string($conexion, $_POST['dolar']);
      $finalidad = mysqli_real_escape_string($conexion, $_POST['finalidad']);
      $descripcion = mysqli_real_escape_string($conexion, $_POST['descripcion']);
      $areatotal = mysqli_real_escape_string($conexion, $_POST['area-total']);
      $areacubierta = mysqli_real_escape_string($conexion, $_POST['area-cubierta']);
      $gas = mysqli_real_escape_string($conexion, $_POST['gas']);
      $luz = mysqli_real_escape_string($conexion, $_POST['luz']);
      $aguasblancas = mysqli_real_escape_string($conexion, $_POST['agua']);
      $aguasnegras = mysqli_real_escape_string($conexion, $_POST['cloacas']);
      $habitaciones = mysqli_real_escape_string($conexion, $_POST['habitaciones']);
      $banos = mysqli_real_escape_string($conexion, $_POST['banos']);
      $mascotas = mysqli_real_escape_string($conexion, $_POST['mascotas']);
      $cochera = mysqli_real_escape_string($conexion, $_POST['cochera']);
      $expensas = mysqli_real_escape_string($conexion, $_POST['expensas']);
      $provincias = mysqli_real_escape_string($conexion, $_POST['provincia']);
      $municipalidad = mysqli_real_escape_string($conexion, $_POST['municipalidad']);
      $calle = mysqli_real_escape_string($conexion, $_POST['calle']);
      $telefono = mysqli_real_escape_string($conexion, $_POST['telefono']);
      $antig= mysqli_real_escape_string($conexion, $_POST['antiguedad']);
      $uso= mysqli_real_escape_string($conexion, $_POST['uso']);
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

              $guardar = mysqli_query($conexion, "INSERT INTO propiedad (nombre, tipo_propiedad, peso, 
              dolar, finalidad, descripcion, 
              area_total, area_cubierta, gas,
              luz, agua, cloacas, habitaciones, 
              banos, mascotas, cochera, 
              expensas, provincia, municipalidad, 
              calle, telefono, antig, uso, tiempo_publicacion,imagen1, imagen2,imagen3,imagen4, imagen5, idUser, estado)
              VALUES ('$propiedadname','$tipopropiedad','$peso','$dolar','$finalidad','$descripcion','$areatotal','$areacubierta',
              '$gas','$luz','$aguasblancas','$aguasnegras','$habitaciones','$banos','$mascotas','$cochera','$expensas',
              '$provincias','$municipalidad','$calle','$telefono','$antig','$uso', '$publicaciontime','$ruta1','$ruta2','$ruta3','$ruta4','$ruta5','$id_user', '$estado')") or die(mysqli_error($conexion));

              if ($guardar){
              $move= move_uploaded_file($_FILES['imagen1']['tmp_name'], "../dist/images/".$ruta1);
              $move2= move_uploaded_file($_FILES['imagen2']['tmp_name'], "../dist/images/".$ruta2);
              $move3= move_uploaded_file($_FILES['imagen3']['tmp_name'], "../dist/images/".$ruta3);
              $move4= move_uploaded_file($_FILES['imagen4']['tmp_name'], "../dist/images/".$ruta4);
              $move5= move_uploaded_file($_FILES['imagen5']['tmp_name'], "../dist/images/".$ruta5);

              $consul= mysqli_query($conexion, "SELECT * FROM propiedad WHERE nombre='$propiedadname' AND idUser='$id_user' AND area_cubierta='$areacubierta'");
              $array= mysqli_fetch_array($consul);
              $public=$array['idPropiedad'];
              header("Location: ../publicacion-precarga.php?public=".$public);
              echo '<div class="alert alert-success" role="alert">Propiedad creada correctamente</div>';
              } else { echo "error al guardar los datos"; }
          } else { echo "El tamaño de las imagenes son demaciado grande"; }
        } 
        else {
          echo "La extensión de la imagen no es de las permitidas";
        }

      }



   
    }
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