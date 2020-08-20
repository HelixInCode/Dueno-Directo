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
  <link rel="icon" href="dist/img/logo-icon.png"> 
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
      $numero = mysqli_real_escape_string($conexion, $_POST['numero']);
      $telefono = mysqli_real_escape_string($conexion, $_POST['telefono']);
      $publicaciontime = mysqli_real_escape_string($conexion, $_POST['tiempo-publicacion']);
      $guardar = mysqli_query($conexion, "INSERT INTO propiedad (nombre, tipo_propiedad, peso, 
                                                                 dolar, finalidad, descripcion, 
                                                                 area_total, area_cubierta, gas,
                                                                 luz, agua, cloacas, habitaciones, 
                                                                 banos, mascotas, cochera, 
                                                                 expensas, provincia, municipalidad, 
                                                                 calle, numero, telefono, tiempo_publicacion)
       VALUES ('$propiedadname','$tipopropiedad','$peso','$dolar','$finalidad','$descripcion','$areatotal','$areacubierta',
               '$gas','$luz','$aguasblancas','$aguasnegras','$habitaciones','$banos','$mascotas','$cochera','$expensas',
               '$provincias','$municipalidad','$calle','$numero','$telefono','$publicaciontime')") or die(mysqli_error($conexion));

      if ($guardar){
           header("location: ../publicacion.php");
               echo '<div class="alert alert-success" role="alert">Propiedad creada correctamente</div>';
               } else { echo "error al guardar los datos";
      }
    }
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
        header ("Location: ../index.php");
    }
?>