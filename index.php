<?php
session_start();
include('conexion.php');
include('conexionPDO.php');

$sql = 'SELECT * FROM propiedad';
$sentencia = $pdo->prepare($sql);
$sentencia->execute();
$publicaciones = $sentencia->fetchAll();

$total_publicaciones_db = $sentencia->rowCount();

// echo 'Hay '. $total_publicaciones_db . ' publicaciones en la base de datos';
$numero_publicaciones = 6;
$sexta_ultima_publicacion = $total_publicaciones_db - $numero_publicaciones;
// echo 'Empieza a renderizar desde la publicacion n° '. $sexta_ultima_publicacion;

$sql = 'SELECT * FROM propiedad LIMIT ' . $sexta_ultima_publicacion . ',6';
$sentencia = $pdo->prepare($sql);
$sentencia->execute();
$publicaciones = $sentencia->fetchAll();

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
  <!-- <link rel="stylesheet" href="src/css/style.css"> -->
  <link rel="stylesheet" href="src/css/style.css">
  <link rel="stylesheet" href="src/css/servicios.css">
</head>

<body>
  <?php

  $user = "";
  if (isset($_POST['Enviar'])) { // comprobamos que se hayan enviado los datos del formulario

    if (
      isset($_POST['email']) && !empty($_POST['email']) &&
      isset($_POST['password']) && !empty($_POST['password'])
    ) {
      $usuario = mysqli_real_escape_string($conexion, $_POST['email']);
      $clave = mysqli_real_escape_string($conexion, $_POST['password']);
      $clave = crypt($clave, "pass");

      // comprobamos que los datos ingresados en el formulario coincidan con los de la BD
      $sql = mysqli_query($conexion, "SELECT id, email, clave FROM user WHERE email='$usuario' AND clave='$clave'") or die(mysqli_error($conexion));
      $resultado = mysqli_num_rows($sql); //cuento el número de coincidencias
      $row = mysqli_fetch_array($sql);
      //echo "todavia no entro en el if";


      if ($resultado == 1) {
        $_SESSION['id'] = $row['id']; // creamos la sesion "usuario_id" y le asignamos como valor el campo usuario_id
        $_SESSION['usuario'] = $row["usuario"]; // creamos la sesion "usuario_nombre" y le asignamos como valor el campo 
        $user = $_SESSION['usuario'];
        if (!empty($_POST["remember"])) {
          setcookie("usuario", $usuario, time() + (10 * 365 * 24 * 60 * 60));
          setcookie("pass", $clave, time() + (10 * 365 * 24 * 60 * 60));
        } else {
          if (isset($_COOKIE["usuario"])) {
            setcookie("usuario", "");
          }
          if (isset($_COOKIE["pass"])) {
            setcookie("pass", "");
          }
        }
        header("Location: home.php");
      } else {

  ?>
        <div class="alerta-error">Usuario o contraseña incorrectos</div>
  <?php
      }
    } else {
      echo "Falta completar campos";
    }
  }



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
            <a class="waves-effect waves-light" href="#">Servicios</a>
          </li>
          <li>
            <a class="waves-effect waves-light" href="#contact">Contacto</a>
          </li>
          <li>
            <a id="ingresar" class="modal-login showModal waves-effect waves-light" href="#">Ingresar</a>
          </li>
          <li>
            <a class="waves-effect waves-light" href="#?">Publicar</a>
          </li>
        </ul>

        <div class="user">
          <div class="user-icon">
            <img height="35" class="d-none" src="./dist/img/icons/user.png" alt="imagen de usuario">

            <i class="fas fa-user fa-2x"></i>
            <i class="fas fa-angle-down"></i>
          </div>
          <ul class="hide">
            <li>
              <span><?php echo $user ?></span>
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

    <section id="carouselExampleFade" class="carousel slide index-carousel carousel-fade" data-ride="carousel">

      <div class="carousel-inner">

        <div class="carousel-item active">
          <img src="dist/img/cover-1.jpg" class="d-block w-100" alt="...">
          <div class="overlay-img justify-content-start px-1 px-sm-5">
            <p class="mb-5 mb-md-0 pb-5 pb-md-0">Querés alquilar?</p>
          </div>
        </div>

        <div class="carousel-item">
          <img src="dist/img/cover-2.jpg" class="d-block w-100" alt="...">
          <div class="overlay-img justify-content-end px-1 px-sm-5">
            <p class="mb-5 mb-md-0 pb-5 pb-md-0">Querés Comprar?</p>
          </div>
        </div>

        <div class="carousel-item">
          <img src="dist/img/cover-3.jpg" class="d-block w-100" alt="...">
          <div class="overlay-img justify-content-end px-1 px-sm-5">
            <p class="mb-5 mb-md-0 pb-5 pb-md-0">Te ayudamos</p>
          </div>
        </div>

      </div>

      <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>

      <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>

      <form id="search-main" action="">
        <div class="form-container">

          <input name="nombre" type="text" placeholder="Ingresa Zona o palabra">

          <div class="input-select">
            <select name="finalidad">
              <option style="color: rgba(0, 0, 0, 0.5);" value="">- Operación</option>
              <option value="venta">Venta</option>
              <option value="alquiler">Alquiler</option>
              <option value="alquiler temporal">Alquiler Temporal</option>
            </select>
          </div>

          <div class="input-select">
            <select name="tipo_propiedad">
              <option style="color: rgba(0, 0, 0, 0.5);" value="">- Inmueble</option>
              <option value="Casa">Casa</option>
              <option value="Departamento">Departamento</option>
              <option value="Loteo y Terreno">Loteo y Terreno</option>
              <option value="Local y Comercial">Local y Comercial</option>
              <option value="Oficina">Oficina</option>
              <option value="Cabaña">Cabaña</option>
            </select>
          </div>
          <div id="botones-container">

            <input name="precio" checked type="radio" value="pesos" id="pesos">
            <label for="pesos">ARS</label>

            <input name="precio" type="radio" value="dolares" id="dolares">
            <label for="dolares">USD</label>

          </div>
          <div class="rango-input">
            <input name="precioMinimo" type="number" placeholder="Precio desde...">
            <input name="precioMaximo" type="number" placeholder="Precio hasta...">
          </div>

          <button type="submit">Buscar</button>
        </div>
      </form>

    </section>
  </header>

  <main>

    <section id="modal-login" class="modal hide">
      <div class="login">
        <div class="title-container p-3">
          <h5>Ingresar</h5>
          <i id="close-login" class="closeModal fa fa-times"></i>
        </div>
        <form class="main-container p-3" action="" method="POST">

          <div class="input-container">
            <label for="email">Correo</label>
            <input name="email" type="email" value="<?php if (isset($_COOKIE["usuario"])) {
                                                      echo $_COOKIE["usuario"];
                                                    } ?>">
          </div>

          <div class="input-container">
            <label for="password">Contraseña</label>
            <input name="password" type="password" value="<?php if (isset($_COOKIE["pass"])) {
                                                            echo $_COOKIE["pass"];
                                                          } ?>">
          </div>

          <div class="input-container">
            <input type="checkbox" name="remember" id="remember" <?php if (isset($_COOKIE["usuario"])) { ?> checked <?php } ?> />
            <label for="remenber">Recuerdame</label>
          </div>

          <a href="recuperar-contrasena.php">No recuerdo mi contraseña</a>
          <div class="login-container">

            <button disabled name="Enviar">Iniciar Sesión</button>
            <a href="registro.php">¿No te has registrado todavía?</a>

          </div>
        </form>
      </div>
    </section>

    <section id="modal-message-sent" class="modal hide">
      <div class="login">
        <div class="title-container p-3">
          <!-- <h5>Mensaje Enviado</h5> -->
          <i id="close-sent" class="closeModal fa fa-times"></i>
        </div>
        <div class="main-container message p-3 pb-4">
          <i class="fas fa-check-circle"></i>
          <p>¡Su mensaje ha sido enviado exitosamente!</p>
        </div>
      </div>
    </section>

    <section id="modal-error" class="modal hide">
      <div class="login">
        <div class="title-container p-3">
          <!-- <h5>Mensaje Enviado</h5> -->
          <i id="close-sent" class="closeModal fa fa-times"></i>
        </div>
        <div class="main-container error p-3 pb-4">
          <i class="fas fa-times-circle"></i>
          <p></p>
        </div>
      </div>
    </section>

    <section id="filtros" class="">

      <h5 id="btnFiltrosDesktop">Filtros</h5>

      <div class="main-container">
        <div class="title-container">
          <h6>Filtros</h6>
          <i class="fa fa-times"></i>
        </div>

        <form method="POST" class="filtros-container scrollbar scrollbar-primary">

          <div class="rango-container">
            <label for="superfieCubierta">Superficie Cubierta</label>

            <div class="input-container">
              <input name="superfieCubiertaMinima" placeholder="Desde..." type="number">
              <input name="superfieCubiertaMaxima" placeholder="Hasta..." type="number">
            </div>
          </div>

          <div class="rango-container">
            <label for="superfieTotal">Superficie Total</label>

            <div class="input-container">
              <input name="superfieTotalMinima" placeholder="Desde..." type="number">
              <input name="superfieTotalMaxima" placeholder="Hasta..." type="number">
            </div>
          </div>

          <div class="options-container">
            <label for="habitaciones">Habitaciones</label>

            <div class="input-container">
              <input name="habitaciones" type="radio" value="1">1
            </div>
            <div class="input-container">
              <input name="habitaciones" type="radio" value="2">2
            </div>
            <div class="input-container">
              <input name="habitaciones" type="radio" value="3">3
            </div>
            <div class="input-container">
              <input name="habitaciones" type="radio" value="4 o mas">4 o más
            </div>
          </div>

          <div class="options-container">
            <label for="banos">Baños</label>

            <div class="input-container">
              <input name="banos" type="radio" value="1">1
            </div>
            <div class="input-container">
              <input name="banos" type="radio" value="2">2
            </div>
            <div class="input-container">
              <input name="banos" type="radio" value="3">3
            </div>
            <div class="input-container">
              <input name="banos" type="radio" value="4 o mas">4 o más
            </div>
          </div>

        </form>
      </div>

      <div class="filtros-overlay hide d-block d-md-none"></div>
    </section>

    <div id="modal-servicios" class="">
      <h5>Profesionales, Productos y Servicios</h5>

      <div id="submenu">

        <a href="servicios-search-results.html" class="submenu-item">
          <img src="./dist/img/servicios/profesional1.jpg" alt="">
          <h6>Profesionales</h6>
        </a>

        <a href="productos-search-results.html" class="submenu-item">
          <img src="./dist/img/Productos1.jpg" alt="">
          <h6>Productos</h6>
        </a>

        <a href="servicios-search-results.html" class="submenu-item">
          <img src="./dist/img/servicio1.jpg" alt="">
          <h6>Servicios</h6>
        </a>

      </div>

      <div class="servicios-overlay hide d-block d-md-none"></div>
    </div>

    <section id="publications" class="py-5 px-3 px-lg-5">

      <div class="publications-nav mb-4 d-md-none">

        <div id="btnFiltrosResponsive" class="waves-effect waves-dark">
          <span>Filtros</span>
        </div>

        <hr>

        <div id="btnServiciosResponsive" class="waves-effect waves-dark">
          <span>Servicios</span>
        </div>
      </div>

      <h1 class="pt-4 pt-md-0">PUBLICACIONES DESTACADAS</h1>

      <div data-url="homepage" class="publications-container py-4 px-xl-5">

        <!-- Insertar Publicaciones -->

        <?php foreach ($publicaciones as $publicacion) : ?>
          <a href="publicacion-precarga.php?public=<?php echo $publicacion['idPropiedad']; ?>" class="publications-item">
            <div class="img-container">

              <img src="dist/images/<?php echo $publicacion['imagen1']; ?>" alt="">

              <div class="publications-address">
                <h5><?php echo $publicacion['calle']; ?></h5>
              </div>
              <div class="publications-price">
                <h6>
                  $<?php echo $publicacion['peso']; ?>
                </h6>
              </div>

              <div class="publications-features">

                <div href="#?" class="bedroom-icon">
                  <span>
                    <?php
                    if ($publicacion['habitaciones'] == '4 o mas' || $publicacion['habitaciones'] == '4 o más' || $publicacion['habitaciones'] > 4) {
                      echo '4+';
                    } else {
                      if ($publicacion['habitaciones'] != '') {

                        echo $publicacion['habitaciones'];
                      } else {
                        echo 'n/a';
                      }
                    }
                    ?>
                  </span>
                  <img src="dist/img/icons/bed-blue.svg" alt="">
                </div>

                <div href="#?" class="area-icon">
                  <span>
                    <?php
                    if ($publicacion['area_total'] > 999) {
                      echo '999+';
                    } else {
                      if ($publicacion['area_total'] != '') {

                        echo $publicacion['area_total'];
                      } else {
                        echo 'n/a';
                      }
                    }
                    ?>
                  </span>
                  <img src="dist/img/icons//area-blue.svg" alt="">
                </div>

                <div href="#?" class="bathroom-icon">
                  <span>
                    <?php
                    if ($publicacion['banos'] == '4 o mas' || $publicacion['banos'] == '4 o más' || $publicacion['banos'] > 4) {
                      echo '4+';
                    } else {
                      if ($publicacion['banos'] != '') {

                        echo $publicacion['banos'];
                      } else {
                        echo 'n/a';
                      }
                    }
                    ?>
                  </span>
                  <img src="dist/img/icons/wc-blue.svg" alt="">
                </div>

                <div href="#?" class="parking-icon">
                  <span>
                    <?php
                    if ($publicacion['cochera'] == 'si' || $publicacion['cochera'] == 'no') {
                      echo $publicacion['cochera'];
                    } else {
                      echo 'n/a';
                    }
                    ?>
                  </span>
                  <img src="dist/img/icons/car-parking-blue.svg" alt="">
                </div>

              </div>

            </div>
          </a>
        <?php endforeach ?>

      </div>

    </section>

    <section id="primera-vez" class="py-0 py-md-3 py-lg-5">
      <h1 class="py-5">¿PRIMERA VEZ? ¡TE AYUDAMOS!</h1>

      <div class="contenedor-opciones px-0 px-md-3 px-lg-5">

        <a href="#?">
          <img src="./dist/img/paf1.jpg" alt="">
          <div class="description-container">
            <p>Quiero Publicar</p>
          </div>
        </a>

        <a href="#?">
          <img src="./dist/img/paf2.jpg" alt="">
          <div class="description-container">
            <p>Estoy Buscando</p>
          </div>
        </a>

      </div>
    </section>

    <section id="cover-services" class="pt-5">
      <h2>TAMBIEN CONOCÉ NUESTROS</h2>

      <div class="cover-container">

        <div class="item-cover view overlay zoom">
          <img class="img-fluid" src="./dist/img/img-servicios/serv1.jpg" alt="">
          <div class="marco text-center">
            <a href="#?">Profesionales</a>
          </div>
        </div>

        <div class="item-cover view overlay zoom">
          <img class="img-fluid" src="./dist/img/img-servicios/serv2.jpg" alt="">
          <div class="marco text-center">
            <a href="#?">Productos</a>
          </div>
        </div>

        <div class="item-cover view overlay zoom">
          <img class="img-fluid" src="./dist/img/img-servicios/serv3.jpg" alt="">
          <div class="marco text-center">
            <a href="#?">Servicios</a>
          </div>
        </div>
      </div>
    </section>

    <section id="contact" class="py-5 px-2 px-lg-5">
      <h2>Contactanos</h2>
      <form class="py-4 py-lg-5 px-3 px-sm-4 px-lg-5" action="enviar.php" method="POST">

        <div class="input-container">
          <label for="nombre">Nombre</label>
          <input name="nombre" type="text">
        </div>

        <div class="input-container">
          <label for="email">Correo</label>
          <input name="email" type="email">
        </div>

        <div class="input-container">
          <label for="telefono">Telefono</label>
          <input name="telefono" type="tel">
        </div>

        <textarea name="mensaje" placeholder="Comentanos en qué podemos ayudarte"></textarea>
        <button type="submit">Enviar</button>


      </form>
    </section>
  </main>

  <footer id="footer">

    <div class="contenedor-central py-4">

      <div class="redes">
        <h5>¡Seguínos en nuestras redes!</h5>

        <div class="item-redes">
          <img src="./dist/img/icons/whatsapp.svg" alt="">
          <a href="">+54 9 123 4567</a>
        </div>

        <div class="item-redes">
          <img src="./dist/img/icons/instagram.svg" alt="">
          <a href="">Instagram/</a>
        </div>

        <div class="item-redes">
          <img src="./dist/img/icons/facebook.svg" alt="">
          <a href="">Facebook/</a>
        </div>
      </div>

      <div class="enlaces">
        <h5>Publicaciones Destacadas</h5>

        <ul class="items-enlaces">
          <li>
            <a href="#?">Mendoza</a>
          </li>
          <li>
            <a href="#?">San Luis</a>
          </li>
          <li>
            <a href="#?">Buenos Aires</a>
          </li>
          <li>
            <a href="#?">Córdoba</a>
          </li>
        </ul>

        <ul class="items-enlaces">
          <li>
            <a href="#?">Tucumán</a>
          </li>
          <li>
            <a href="#?">Neuquén</a>
          </li>
          <li>
            <a href="#?">Salta</a>
          </li>
          <li>
            <a href="#?">Misiones</a>
          </li>
        </ul>
      </div>

      <div class="img-container">
        <img src="dist/img/DD-LOGO.png" alt="">
      </div>

    </div>
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
  <!-- <script type="text/javascript" src="src/js/fetch.js"></script> -->
  <script type="text/javascript" src="src/js/hideShowModals.js"></script>
  <script type="text/javascript" src="src/js/loginValidation.js"></script>
  <script type="text/javascript" src="src/js/filtros.js"></script>
  <!--   <script type="text/javascript" src="src/js/filtrosValidation.js"></script> -->
  <script type="text/javascript" src="src/js/hamburger.js"></script>
  <!-- Llamado a las publicaciones destacadas -->
  <!-- <script type="text/javascript" src="src/js/fetchFeatured.js"></script> -->
  <!-- <script type="text/javascript">
    modalError('Mensaje de prueba');
  </script> -->
  <!-- <script type="text/javascript" src="src/js/modalMessageSentAppears.js"></script> -->
</body>

</html>

<!-- Imagen de <a href="https://pixabay.com/es/users/PublicDomainPictures-14/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=2257">PublicDomainPictures</a> en <a href="https://pixabay.com/es/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=2257">Pixabay</a> -->