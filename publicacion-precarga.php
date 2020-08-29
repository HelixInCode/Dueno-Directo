<?php
session_start();
include('conexion.php');
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
    <link rel="stylesheet" href="dist/css/registro.css">
    <link rel="stylesheet" href="dist/css/publicacion-precarga.css">
  </head>

  <body>
    <?php

    $idPublicacion = $_GET['public'];

    $consulta = mysqli_query($conexion, "SELECT * FROM propiedad WHERE idPropiedad='$idPublicacion'");
    $Aconsul = mysqli_fetch_array($consulta);

    $nombre = $Aconsul['nombre'];
    $imagen1 = $Aconsul['imagen1'];
    $imagen2 = $Aconsul['imagen2'];
    $imagen3 = $Aconsul['imagen3'];
    $imagen4 = $Aconsul['imagen4'];
    $imagen5 = $Aconsul['imagen5'];
    $user = $Aconsul['idUser'];
    $calle = $Aconsul['calle'];
    $municipalidad = $Aconsul['municipalidad'];
    $provincia = $Aconsul['provincia'];

    $con = mysqli_query($conexion, "SELECT * FROM user WHERE id='$user'");
    $Acon = mysqli_fetch_array($con);
    $usuario = $Acon['nombre'];
    $telefono = $Acon['telefono'];



    ?>

    <header>
      <nav class="py-2 px-4">
        <div class="img-container">
          <img class="img-fluid" src="dist/img/DD-LOGO.png" alt="">
          <!-- <span>Dueño directo</span> -->
        </div>

        <div class="menu-btns">
          <ul class="menu-items hide py-1 py-md-0">
            <li>
              <a class="waves-effect waves-light" href="index.php">Inicio</a>
            </li>
            <li>
              <a class="waves-effect waves-light" href="./servicios.html">Servicios</a>
            </li>
            <li>
              <a class="waves-effect waves-light" href="#?">Contacto</a>
            </li>
            <li>
              <a id="ingresar" class="modal-login showModal waves-effect waves-light" href="#?">Ingresar</a>
            </li>
            <li>
              <a class="waves-effect waves-light" href="#?">Publicar</a>
            </li>
          </ul>

          <div class="user">
            <div class="user-icon">
              <img height="35" class="d-none" src="./dist/img/icons/user.png" alt="imagen de usuario">

              <i class="fas fa-user fa-2x" style="color: #E9EBF5;"></i>
              <i class="fas fa-angle-down"></i>
            </div>
            <ul class="hide">
              <li>
                <span><?php echo $usuario ?></span>
              </li>
              <li>
                <a href="#?">Panel</a>
              </li>
              <li>
                <a href="process/close.php">Cerrar Sesion</a>
              </li>
            </ul>
          </div>

          <div class="menu-overlay hide d-block d-md-none"></div>

          <div id="hamburger" class="hamburger-btn d-flex d-md-none">
            <i id="ham-icon" class="fas fa-bars fa-1-3x"></i>
          </div>
        </div>
      </nav>
    </header>
    <main>
      <section id="post" class="px-2 px-sm-3">
        <div class="main-container">

          <div class="columna-1 columna">

            <h2 class="d-block d-md-none text-center">Título</h2>

            <div id="custCarousel" class="carousel slide" data-ride="carousel" align="center">
              <!-- slides -->
              <div class="carousel-inner">
                <div class="carousel-item active"> <img src="./dist/images/<?php echo $imagen1 ?>" alt="Hills"> </div>
                <div class="carousel-item"> <img src="./dist/images/<?php echo $imagen2 ?>" alt="Hills"> </div>
                <div class="carousel-item"> <img src="./dist/images/<?php echo $imagen3 ?>" alt="Hills"> </div>
                <div class="carousel-item"> <img src="./dist/images/<?php echo $imagen4 ?>" alt="Hills"> </div>
                <div class="carousel-item"> <img src="./dist/images/<?php echo $imagen5 ?>" alt="Hills"> </div>
              </div>
              <!-- Left right -->
              <a class="carousel-control-prev" href="#custCarousel" data-slide="prev"> <span class="carousel-control-prev-icon"></span> </a> <a class="carousel-control-next" href="#custCarousel" data-slide="next"> <span class="carousel-control-next-icon"></span> </a>
              <!-- Thumbnails -->
              <ol class="carousel-indicators list-inline">
                <li class="list-inline-item active"> <a id="carousel-selector-0" class="selected" data-slide-to="0" data-target="#custCarousel"> <img src="./dist/images/<?php echo $imagen1 ?>" class="img-fluid"> </a> </li>
                <li class="list-inline-item"> <a id="carousel-selector-1" data-slide-to="1" data-target="#custCarousel"> <img src="./dist/images/<?php echo $imagen2 ?>" class="img-fluid"> </a> </li>
                <li class="list-inline-item"> <a id="carousel-selector-2" data-slide-to="2" data-target="#custCarousel"> <img src="./dist/images/<?php echo $imagen3 ?>" class="img-fluid"> </a> </li>
                <li class="list-inline-item"> <a id="carousel-selector-2" data-slide-to="3" data-target="#custCarousel"> <img src="./dist/images/<?php echo $imagen4 ?>" class="img-fluid"> </a> </li>
                <li class="list-inline-item"> <a id="carousel-selector-2" data-slide-to="4" data-target="#custCarousel"> <img src="./dist/images/<?php echo $imagen5 ?>" class="img-fluid"> </a> </li>
              </ol>
            </div>

            <div class="descripcion">
              <h5>DESCRIPCIÓN</h5>
              <p><?php echo $Aconsul['descripcion']; ?>
              </p>
            </div>

            <div class="datos">
              <h5>DATOS GENERALES DE LA PROPIEDAD</h5>

              <ul class="valores">

                <li class="fila">
                  <p>Precio ARS</p>
                  <p class="valor"><?php echo $Aconsul['peso']; ?></p>
                </li>

                <li class="fila">
                  <p>Precio USD</p>
                  <p class="valor"><?php echo $Aconsul['dolar']; ?></p>
                </li>

                <li class="fila">
                  <p>Condicion</p>
                  <p class="valor"><?php echo $Aconsul['uso']; ?></p>
                </li>

                <li class="fila">
                  <p>Tipo de Propiedad</p>
                  <p class="valor"><?php echo $Aconsul['tipo_propiedad']; ?></p>
                </li>

                <li class="fila">
                  <p>Antiguedad</p>
                  <p class="valor"><?php echo $Aconsul['antig']; ?></p>
                </li>

                <li class="fila">
                  <p>Area Total</p>
                  <p class="valor"><?php echo $Aconsul['area_total']; ?></p>
                </li>

                <li class="fila">
                  <p>Area Cubierta</p>
                  <p class="valor"><?php echo $Aconsul['area_cubierta']; ?></p>
                </li>

                <li class="fila">
                  <p>Habitaciones</p>
                  <p class="valor"><?php echo $Aconsul['habitaciones']; ?></p>
                </li>

                <li class="fila">
                  <p>Baños</p>
                  <p class="valor"><?php echo $Aconsul['banos']; ?></p>
                </li>

                <li class="fila">
                  <p>Cochera</p>
                  <p class="valor"><?php echo $Aconsul['cochera']; ?></p>
                </li>

                <li class="fila">
                  <p>Luz Eléctrica</p>
                  <p class="valor"><?php echo $Aconsul['luz']; ?></p>
                </li>

                <li class="fila">
                  <p>Agua</p>
                  <p class="valor"><?php echo $Aconsul['agua']; ?></p>
                </li>

                <li class="fila">
                  <p>Gas</p>
                  <p class="valor"><?php echo $Aconsul['gas']; ?></p>
                </li>

                <li class="fila">
                  <p>Aguas Negras</p>
                  <p class="valor"><?php echo $Aconsul['cloacas']; ?></p>
                </li>

                <li class="fila">
                  <p>Expensas</p>
                  <p class="valor"><?php echo $Aconsul['expensas']; ?></p>
                </li>

                <li class="fila">
                  <p>Mascotas</p>
                  <p class="valor"><?php echo $Aconsul['mascotas']; ?></p>
                </li>
              </ul>
            </div>

            <div class="ubicacion">
              <h5>UBICACIÓN</h5>
              <p><?php echo "Calle ".$calle.", ".$municipalidad; ?></p>
              <p style="text-transform: uppercase; font-weight:1200"><?php echo $provincia; ?></p>
              <div class="container-mapa">
                <!--Tratar de insertar mapa con la ubicacion del lugar-->
              </div>
            </div>
          </div>

          <div class="columna-2 columna">
            <div class="informacion">
              <h2 class="d-none d-md-block"><?php echo $nombre ?></h2>
              <a class="telefono" href="">
                <img src="./dist/img/icons/whatsapp.svg" alt="">
                <p><?php echo $telefono ?></p>
              </a>
              <!-- <p>Helix ndrg, Ciudad. Mendoza</p> -->
              <div class="contenedor-iconos">
                <ul>
                  <li>
                    <img src="./dist/img/icons/area-blue.svg" alt="area cubierta">
                    <p><?php echo $Aconsul['area_cubierta']; ?></p>
                  </li>
                  <li>
                    <img src="./dist/img/icons/bed-blue.svg" name="habitaciones" alt="">
                    <p><?php echo $Aconsul['habitaciones']; ?></p>
                  </li>
                  <li>
                    <img src="./dist/img/icons/wc-blue.svg" name="baños" alt="">
                    <p><?php echo $Aconsul['banos']; ?></p>
                  </li>
                  <li>
                    <img src="./dist/img/icons/car-parking-blue.svg" name="cochera" alt="">
                    <p><?php echo $Aconsul['cochera']; ?></p>
                  </li>
                </ul>

              </div>

            </div>
            <div class="publicidad-profesionales">

            </div>
          </div>

          <div class="acciones">
            <button type="button" class="btn">PUBLICAR</button>
            <button type="button" class="btn">MODIFICAR</button>
          </div>

        </div>
      </section>
    </main>
    <footer>

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
    <script type="text/javascript" src="src/js/panel-publicacion.js"></script>
    <script type="text/javascript" src="src/js/hamburger.js"></script>

  </body>

  </html>
<?php
} else {
  header("Location: ../index.php");
}
?>