<?php
session_start();
include ('conexion.php');
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

  if(isset($_POST['Enviar'])) { // comprobamos que se hayan enviado los datos del formulario

      if(isset($_POST['email'])&& !empty($_POST['email']) && 
      isset($_POST['password']) && !empty($_POST['password'])){ 
          $usuario= mysqli_real_escape_string($conexion,$_POST['email']);
          $clave = mysqli_real_escape_string($conexion,$_POST['password']);
          $clave = crypt($clave,"pass");

          // comprobamos que los datos ingresados en el formulario coincidan con los de la BD
          $sql = mysqli_query($conexion,"SELECT id, email, clave FROM user WHERE email='$usuario' AND clave='$clave'") or die(mysqli_error($conexion));
          $resultado=mysqli_num_rows($sql);//cuento el número de coincidencias
          $row = mysqli_fetch_array($sql);
          //echo "todavia no entro en el if";
              

              if($resultado==1) {
                  $_SESSION['id'] = $row['id']; // creamos la sesion "usuario_id" y le asignamos como valor el campo usuario_id
                  $_SESSION['usuario'] = $row["usuario"]; // creamos la sesion "usuario_nombre" y le asignamos como valor el campo 
                  header("Location: home.php");
              }else {
              
  ?>
              <div class="alerta-error">Usuario o contraseña incorrectos</div>                    
              <?php
              }
          
      }else{
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
            <a class="waves-effect waves-light" href="index.php">Home</a>
          </li>
          <li>
            <a class="waves-effect waves-light" href="./servicios.html">Servicios</a>
          </li>
          <li>
            <a class="waves-effect waves-light" href="#?">Contacto</a>
          </li>
          <li>
            <a id="ingresar" class="waves-effect waves-light" href="#?">Ingresar</a>
          </li>
          <li>
            <a class="waves-effect waves-light" href="#?">Publicar</a>
          </li>
        </ul>

        <div class="user">
          <div class="user-icon">
            <img height="35" class="d-none" src="./dist/img/icons/user.png" alt="imagen de usuario">

            <i class="fas fa-user fa-2x" style="color: #001933;"></i>
            <i class="fas fa-angle-down"></i>
          </div>
          <ul class="hide">
              <li>
                <span>Nombre de Usuario</span>
              </li>
              <li>
                <a href="#?">Panel</a>
              </li>
              <li>
                <a href="#?">Cerrar Sesion</a>
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

          <input type="text" placeholder="Ingresa Zona o palabra">

          <div class="input-select">
            <select name="" id="">
              <option value="">Venta</option>
            </select>
          </div>
          <div class="input-select">
            <select name="" id="">
              <option value="">Casas</option>
            </select>
          </div>

          <button type="submit" >Buscar</button>

          <div class="rango-input">
            <input type="text" placeholder="Precio desde...">
            <input type="text" placeholder="Precio hasta...">
          </div>

          <div id="botones-container">
            <a href="#?" class="active">ARS</a>
            <a href="#?" class="">USD</a>
          </div>
        </div>
      </form>

    </section>
  </header>
  <main>

    <div id="modal-servicios" class="d-none d-md-flex">
      <h5>Profesionales, Productos y Servicios</h5>

      <div id="submenu">

        <a href="#?" class="submenu-item">
          <img src="./dist/img/servicios/profesional1.jpg" alt="">
          <h6>Profesionales</h6>
        </a>

        <a href="#?" class="submenu-item">
          <img src="./dist/img/Productos1.jpg" alt="">
          <h6>Productos</h6>
        </a>

        <a href="#?" class="submenu-item">
          <img src="./dist/img/servicio1.jpg" alt="">
          <h6>Servicios</h6>
        </a>

      </div>

    </div>

    <section id="filtros" class="">

      <h5 id="btnFiltrosDesktop">Filtros</h5>

      <div class="main-container">
        <div class="title-container">
          <h6>Filtros</h6>
          <i class="fa fa-times"></i>
        </div>

        <div class="filtros-container scrollbar scrollbar-primary">
          <input name="search" type="text" placeholder="Buscar">

          <div class="operacion-container">

            <label for="operacion">Operación</label>
            <div class="input-container">
              <input name="operacion" type="radio" value="">Venta
            </div>
            <div class="input-container">
              <input name="operacion" type="radio" value="">Alquiler
            </div>
            <div class="input-container">
              <input name="operacion" type="radio" value="">Alquiler Temporal
            </div>
          </div>
          
          <div class="inmueble-container">
            <label for="inmueble">Tipo de Inmueble</label>
  
            <div class="input-container">
              <input name="inmueble" type="radio" value="">Casa
            </div>
            <div class="input-container">
              <input name="inmueble" type="radio" value="">Departamento
            </div>
            <div class="input-container">
              <input name="inmueble" type="radio" value="">Loteo y Terreno
            </div>
            <div class="input-container">
              <input name="inmueble" type="radio" value="">Local y Comercial
            </div>
            <div class="input-container">
              <input name="inmueble" type="radio" value="">Oficina
            </div>
            <div class="input-container">
              <input name="inmueble" type="radio" value="">Cabaña
            </div>
            <div class="input-container">
              <input name="inmueble" type="radio" value="">Cabaña
            </div>
          </div>

          <div class="rango-container">
            <label for="precio">Precio</label>

            <div class="input-container">
              <input name="precio" placeholder="Desde..." type="text">
              <input name="precio" placeholder="Hasta..." type="text">
            </div>
          </div>

          <div class="options-container">
            <label for="opciones">Tipo de Opciones</label>
    
            <div class="input-container">
              <input name="opciones" type="radio" value="">Casa
            </div>
            <div class="input-container">
              <input name="opciones" type="radio" value="">Departamento
            </div>
            <div class="input-container">
              <input name="opciones" type="radio" value="">Loteo y Terreno
            </div>
            <div class="input-container">
              <input name="opciones" type="radio" value="">Local y Comercial
            </div>
          </div>
          
          <div class="rango-container">
            <label for="superfie1">Superficie Cubierta</label>

            <div class="input-container">
              <input name="superfie1" placeholder="Desde..." type="text">
              <input name="superfie1" placeholder="Hasta..." type="text">
            </div>
          </div>

          <div class="rango-container">
            <label for="superficie2">Superficie Total</label>

            <div class="input-container">
              <input name="superficie2" placeholder="Desde..." type="text">
              <input name="superficie2" placeholder="Hasta..." type="text">
            </div>
          </div>

          <div class="options-container">
            <label for="habitaciones">Habitaciones</label>
    
            <div class="input-container">
              <input name="habitaciones" type="radio" value="">1
            </div>
            <div class="input-container">
              <input name="habitaciones" type="radio" value="">2
            </div>
            <div class="input-container">
              <input name="habitaciones" type="radio" value="">más de 2
            </div>
            <div class="input-container">
              <input name="habitaciones" type="radio" value="">indistinto
            </div>
          </div>

          <div class="options-container">
            <label for="bathrooms">Baños</label>
    
            <div class="input-container">
              <input name="bathrooms" type="radio" value="">1
            </div>
            <div class="input-container">
              <input name="bathrooms" type="radio" value="">2
            </div>
            <div class="input-container">
              <input name="bathrooms" type="radio" value="">más de 2
            </div>
            <div class="input-container">
              <input name="bathrooms" type="radio" value="">indistinto
            </div>
          </div>

          <div class="options-container">
            <label for="plantas">Plantas</label>
    
            <div class="input-container">
              <input name="plantas" type="radio" value="">1
            </div>
            <div class="input-container">
              <input name="plantas" type="radio" value="">2
            </div>
            <div class="input-container">
              <input name="plantas" type="radio" value="">más de 2
            </div>
          </div>

        </div>
      </div>
    </section>

    <section id="modal-login" class="modal">
      <div class="login">
        <div class="title-container p-3">
          <h5>Ingresar</h5>
          <i id="close-login" class="fa fa-times"></i>
        </div>
        <form class="main-container p-3" action="" method="POST">
  
          <div class="input-container">
            <label for="email">Correo</label>
            <input name="email" type="email">
          </div>  
  
          <div class="input-container">
            <label for="password">Contraseña</label>
            <input name="password" type="password">
          </div>
  
          <div class="input-container">
            <input type="checkbox" name="remember">
            <label for="remenber">Recuerdame ?</label>
          </div>
          
          <div class="login-container">
    
            <button name="Enviar">Iniciar Sesión</button>
            <a href="registro.php">¿No te has registrado todavía?</a>
            
          </div>
        </form>
      </div>
    </section>

    <section id="modal-message-sent" class="modal">
      <div class="login">
        <div class="title-container p-3">
          <!-- <h5>Mensaje Enviado</h5> -->
          <i id="close-sent" class="fa fa-times"></i>
        </div>
        <div class="main-container message p-3 pb-4">
          <i class="fas fa-check-circle"></i>
          <p>¡Su mensaje ha sido enviado exitosamente!</p>
        </div>
      </div>
    </section>

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

      <div class="publications-container py-4 px-xl-5">
        
        <a href="#?" class="publications-item">
          <div class="img-container">
              
            <img src="dist/img/publicaciones.jpg" alt="">
            
            <div class="publications-address">
              <h5>Calle A, 456. Ciudad</h5>
            </div>
            <div class="publications-price">
              <h6>$25.000</h6>
            </div>

            <div class="publications-features">
              
              <div href="#?" class="bedroom-icon">
                <span>1</span>
                <!-- icono insertado por svg.js -->
              </div>

              <div href="#?" class="area-icon">
                <span>2</span>
                <!-- icono insertado por svg.js -->
              </div>
              
              <div href="#?" class="bathroom-icon">
                <span>1</span>
                <!-- icono insertado por svg.js -->
              </div>

              <div href="#?" class="parking-icon">
                <span>2</span>
                <!-- icono insertado por svg.js -->
              </div>

            </div>

          </div> 
        </a>
        
        <a href="#?" class="publications-item">
          <div class="img-container">
              
            <img src="dist/img/publicaciones.jpg" alt="">
            
            <div class="publications-address">
              <h5>Calle A, 456. Ciudad</h5>
            </div>
            <div class="publications-price">
              <h6>$25.000</h6>
            </div>

            <div class="publications-features">
              
              <div href="#?" class="bedroom-icon">
                <span>1</span>
                <!-- icono insertado por svg.js -->
              </div>

              <div href="#?" class="area-icon">
                <span>2</span>
                <!-- icono insertado por svg.js -->
              </div>
              
              <div href="#?" class="bathroom-icon">
                <span>1</span>
                <!-- icono insertado por svg.js -->
              </div>

              <div href="#?" class="parking-icon">
                <span>2</span>
                <!-- icono insertado por svg.js -->
              </div>

            </div>

          </div> 
        </a>

        <a href="#?" class="publications-item">
          <div class="img-container">
              
            <img src="dist/img/publicaciones.jpg" alt="">
            
            <div class="publications-address">
              <h5>Calle A, 456. Ciudad</h5>
            </div>
            <div class="publications-price">
              <h6>$25.000</h6>
            </div>

            <div class="publications-features">
              
              <div href="#?" class="bedroom-icon">
                <span>1</span>
                <!-- icono insertado por svg.js -->
              </div>

              <div href="#?" class="area-icon">
                <span>2</span>
                <!-- icono insertado por svg.js -->
              </div>
              
              <div href="#?" class="bathroom-icon">
                <span>1</span>
                <!-- icono insertado por svg.js -->
              </div>

              <div href="#?" class="parking-icon">
                <span>2</span>
                <!-- icono insertado por svg.js -->
              </div>

            </div>

          </div> 
        </a>

        <a href="#?" class="publications-item">
          <div class="img-container">
              
            <img src="dist/img/publicaciones.jpg" alt="">
            
            <div class="publications-address">
              <h5>Calle A, 456. Ciudad</h5>
            </div>
            <div class="publications-price">
              <h6>$25.000</h6>
            </div>

            <div class="publications-features">
              
              <div href="#?" class="bedroom-icon">
                <span>1</span>
                <!-- icono insertado por svg.js -->
              </div>

              <div href="#?" class="area-icon">
                <span>2</span>
                <!-- icono insertado por svg.js -->
              </div>
              
              <div href="#?" class="bathroom-icon">
                <span>1</span>
                <!-- icono insertado por svg.js -->
              </div>

              <div href="#?" class="parking-icon">
                <span>2</span>
                <!-- icono insertado por svg.js -->
              </div>

            </div>

          </div> 
        </a>

        <a href="#?" class="publications-item">
          <div class="img-container">
              
            <img src="dist/img/publicaciones.jpg" alt="">
            
            <div class="publications-address">
              <h5>Calle A, 456. Ciudad</h5>
            </div>
            <div class="publications-price">
              <h6>$25.000</h6>
            </div>

            <div class="publications-features">
              
              <div href="#?" class="bedroom-icon">
                <span>1</span>
                <!-- icono insertado por svg.js -->
              </div>

              <div href="#?" class="area-icon">
                <span>2</span>
                <!-- icono insertado por svg.js -->
              </div>
              
              <div href="#?" class="bathroom-icon">
                <span>1</span>
                <!-- icono insertado por svg.js -->
              </div>

              <div href="#?" class="parking-icon">
                <span>2</span>
                <!-- icono insertado por svg.js -->
              </div>

            </div>

          </div> 
        </a>

        <a href="#?" class="publications-item">
          <div class="img-container">
              
            <img src="dist/img/publicaciones.jpg" alt="">
            
            <div class="publications-address">
              <h5>Calle A, 456. Ciudad</h5>
            </div>
            <div class="publications-price">
              <h6>$25.000</h6>
            </div>

            <div class="publications-features">
              
              <div href="#?" class="bedroom-icon">
                <span>1</span>
                <!-- icono insertado por svg.js -->
              </div>

              <div href="#?" class="area-icon">
                <span>2</span>
                <!-- icono insertado por svg.js -->
              </div>
              
              <div href="#?" class="bathroom-icon">
                <span>1</span>
                <!-- icono insertado por svg.js -->
              </div>

              <div href="#?" class="parking-icon">
                <span>2</span>
                <!-- icono insertado por svg.js -->
              </div>

            </div>

          </div> 
        </a>

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
    
    <section id="contact" class="py-5 px-2 px-lg-5">
      <h2>Contactanos</h2>
      <form class="py-4 py-lg-5 px-3 px-sm-4 px-lg-5" action="">
        
        <div class="input-container">
          <label for="name">Nombre</label>
          <input name="name" type="text">
        </div>
        
        <div class="input-container">
          <label for="email">Correo</label>
          <input name="email" type="email">
        </div>
        
        <div class="input-container">
          <label for="phone">Telefono</label>
          <input name="phone" type="tel">
        </div>

        <textarea name="message" placeholder="Comentanos en qué podemos ayudarte"></textarea>
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
        <img width="304px" src="dist/img/DD-LOGO.png" alt="">
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
  <script type="text/javascript" src="src/js/hideShowModals.js"></script>
  <script type="text/javascript" src="src/js/filtros.js"></script>
  <script type="text/javascript" src="src/js/hamburger.js"></script>
</body>
</html>

<!-- Imagen de <a href="https://pixabay.com/es/users/PublicDomainPictures-14/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=2257">PublicDomainPictures</a> en <a href="https://pixabay.com/es/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=2257">Pixabay</a> -->