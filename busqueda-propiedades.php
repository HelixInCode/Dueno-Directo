<?php
include('conexion.php');
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
  <link rel="stylesheet" href="src/css/style.css">
  <link rel="stylesheet" href="src/css/search-results.css">
</head>

<body>
  <?php
if (isset($_POST['BuscProp'])) {
  $zona = mysqli_real_escape_string($conexion, $_POST['nombre']);
  $finalidad = mysqli_real_escape_string($conexion, $_POST['finalidad']);
  $tipoPropiedad = mysqli_real_escape_string($conexion, $_POST['tipoPropiedad']);
  $min = mysqli_real_escape_string($conexion, $_POST['precioMinimo']);
  $max = mysqli_real_escape_string($conexion, $_POST['precioMaximo']);
  $moneda = mysqli_real_escape_string($conexion, $_POST['precio']);
  if($min == ""){
    $min = 1;
  }
  if($max == ""){
    $max = 9999999999999;
  }
  
  if($zona =="" AND $finalidad =="" AND $tipoPropiedad =="" AND $moneda ==""){
    $principal = mysqli_query($conexion, "SELECT * FROM propiedad");

  } else{     
      if ($moneda == 'pesos') {
        $principalSql = "SELECT * FROM propiedad WHERE provincia LIKE '%" . $zona . "%' OR municipalidad LIKE '%" . $zona . "%' AND";
        if($finalidad != ""){
          $principalSql .= " finalidad = '$finalidad' AND";
        }
        if($tipoPropiedad != ""){
          $principalSql .= " tipo_propiedad = '$tipoPropiedad' AND";
        }
        if($min != ""){
          $principalSql .= " peso BETWEEN '$min' AND '$max' ORDER BY idPropiedad DESC";
        }
        $finalSql=trim($principalSql, 'AND');
        $his= mysqli_real_escape_string($conexion,$finalSql);
        $history = mysqli_query($conexion, "UPDATE history SET lastConsult='$his', tipo='propiedad' WHERE idHist='1'")or die("problemas actualizando la informacion:".mysqli_error($conexion));
        $principal = mysqli_query($conexion, $finalSql);
   

      } elseif ($moneda == 'dolar') {
        $principalSql = "SELECT * FROM propiedad WHERE provincia LIKE '%" . $zona . "%' OR municipalidad LIKE '%" . $zona . "%' AND";
        if($finalidad != ""){
          $principalSql .= " finalidad = '$finalidad' AND";
        }
        if($tipoPropiedad != ""){
          $principalSql .= " tipo_propiedad = '$tipoPropiedad' AND";
        }
        if($min != ""){
          $principalSql .= " dolar BETWEEN '$min' AND '$max' ORDER BY idPropiedad DESC";
        }
        $finalSql=trim($principalSql, 'AND');
        $his= mysqli_real_escape_string($conexion,$finalSql);
        $history = mysqli_query($conexion, "UPDATE history SET lastConsult='$his', tipo='propiedad' WHERE idHist='1'")or die("problemas actualizando la informacion:".mysqli_error($conexion));
        $principal = mysqli_query($conexion, $finalSql);

      } else {
        $principalSql = "SELECT * FROM propiedad WHERE provincia LIKE '%" . $zona . "%' OR municipalidad LIKE '%" . $zona . "%' AND";
        if($finalidad != ""){
          $principalSql .= " finalidad = '$finalidad' AND";
        }
        if($tipoPropiedad != ""){
          $principalSql .= " tipo_propiedad = '$tipoPropiedad' AND";
        }
        if($min != ""){
          $principalSql .= " ORDER BY idPropiedad DESC";
        }
        $finalSql=trim($principalSql, 'AND');
        $his= mysqli_real_escape_string($conexion,$finalSql);
        $history = mysqli_query($conexion, "UPDATE history SET lastConsult='$his', tipo='propiedad' WHERE idHist='1'")or die("problemas actualizando la informacion:".mysqli_error($conexion));
        $principal = mysqli_query($conexion, $finalSql);
       

      } 

    }
  
}

  if (isset($_POST['Buscar'])) {
    $zona = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $finalidad = mysqli_real_escape_string($conexion, $_POST['finalidad']);
    $tipoPropiedad = mysqli_real_escape_string($conexion, $_POST['tipoPropiedad']);
    $min = mysqli_real_escape_string($conexion, $_POST['precioMinimo']);
    $max = mysqli_real_escape_string($conexion, $_POST['precioMaximo']);
    $moneda = mysqli_real_escape_string($conexion, $_POST['precio']);
    if($min == ""){
      $min = 1;
    }
    if($max == ""){
      $max = 9999999999999;
    }
    
    if($zona =="" AND $finalidad =="" AND $tipoPropiedad =="" AND $moneda ==""){
      $principal = mysqli_query($conexion, "SELECT * FROM propiedad");
     
    } else{     
        if ($moneda == 'pesos') {
          $principalSql = "SELECT * FROM propiedad WHERE provincia LIKE '%" . $zona . "%' OR municipalidad LIKE '%" . $zona . "%' AND";
           if($finalidad != ""){
            $principalSql .= " finalidad = '$finalidad' AND";
          
          }
          if($tipoPropiedad != ""){
            $principalSql .= " tipo_propiedad = '$tipoPropiedad' AND";
         
          }
          if($min != ""){
            $principalSql .= " peso BETWEEN '$min' AND '$max' ORDER BY idPropiedad DESC";

          }
          $finalSql=trim($principalSql, 'AND');
          
          $principal = mysqli_query($conexion, $finalSql);
       
          $his= mysqli_real_escape_string($conexion,$finalSql);
          $history = mysqli_query($conexion, "UPDATE history SET lastConsult='$his', tipo='propiedad' WHERE idHist='1'")or die("problemas actualizando la informacion:".mysqli_error($conexion));
      
        } elseif ($moneda == 'dolar') {
          $principalSql = "SELECT * FROM propiedad WHERE provincia LIKE '%" . $zona . "%' OR municipalidad LIKE '%" . $zona . "%' AND";
          if($finalidad != ""){
            $principalSql .= " finalidad = '$finalidad' AND";
            
          }
          if($tipoPropiedad != ""){
            $principalSql .= " tipo_propiedad = '$tipoPropiedad' AND";
            
          }
          if($min != ""){
            $principalSql .= " dolar BETWEEN '$min' AND '$max' ORDER BY idPropiedad DESC";
           
          }
          $finalSql=trim($principalSql, 'AND');
          
          $his= mysqli_real_escape_string($conexion,$finalSql);
          $history = mysqli_query($conexion, "UPDATE history SET lastConsult='$his', tipo='propiedad' WHERE idHist='1'")or die("problemas actualizando la informacion:".mysqli_error($conexion));
        
          $principal = mysqli_query($conexion, $finalSql);
        

        } else {
          $principalSql = "SELECT * FROM propiedad WHERE provincia LIKE '%" . $zona . "%' OR municipalidad LIKE '%" . $zona . "%' AND";
          if($finalidad != ""){
            $principalSql .= " finalidad = '$finalidad' AND";
             }
          if($tipoPropiedad != ""){
            $principalSql .= " tipo_propiedad = '$tipoPropiedad' AND";
             }
          if($min != ""){
            $principalSql .= " ORDER BY idPropiedad DESC";
          }
          $finalSql=trim($principalSql, 'AND');

          $his= mysqli_real_escape_string($conexion,$finalSql);
          $history = mysqli_query($conexion, "UPDATE history SET lastConsult='$his', tipo='propiedad' WHERE idHist='1'")or die("problemas actualizando la informacion:".mysqli_error($conexion));
        
          $principal = mysqli_query($conexion, $finalSql);
       
        } 

      }
    
  }

  

  if (isset($_POST['Filt1'])) {
    //traigo la ultima consulta registrada
    $previewSearch=mysqli_query($conexion, "SELECT * FROM history WHERE idHist='1'")or die(mysqli_error($conexion));
    $hisArray=mysqli_fetch_array($previewSearch);
    $lastConsul=$hisArray['lastConsult'];
    //Encuentro el la última porcion de string de la que necesito encontrar la posición
    $findme   = "peso BETWEEN '1' AND '9999999999999' ORDER BY idPropiedad DESC";
    $pos = strpos($lastConsul, $findme);
    //Mido el string
    $length=strlen($lastConsul);
    //Corto la ultima consulta desde la posición cero hasta la posición del texto que quiero cortar
    $principalFil= substr($lastConsul,0,$pos); 
    $moneda='pesos';
    $cubiertaMin = mysqli_real_escape_string($conexion, $_POST['cubiertaMin']);
    $cubiertaMax = mysqli_real_escape_string($conexion, $_POST['cubiertaMax']);
    $totalMin = mysqli_real_escape_string($conexion, $_POST['superfieTotalMin']);
    $totalMax = mysqli_real_escape_string($conexion, $_POST['superfieTotalMax']);
    $habitaciones = mysqli_real_escape_string($conexion, $_POST['habitaciones']);
    $banos = mysqli_real_escape_string($conexion, $_POST['banos']);

    if($cubiertaMin == ""){
      $cubiertaMin = 1;
    }
    if($cubiertaMax == ""){
      $cubiertaMax = 999999999;
    }
    if($totalMin == ""){
      $totalMin = 1;
    }
    if($totalMax == ""){
      $totalMax = 999999999;
    }
    if($habitaciones == ""){
      $principalFil .=" area_total BETWEEN '$totalMin' AND '$totalMax' AND area_cubierta BETWEEN '$cubiertaMin' AND '$cubiertaMax' ";
    }
    if($habitaciones != "4+" AND $habitaciones != "" ){
      $principalFil .=" area_total BETWEEN '$totalMin' AND '$totalMax' AND area_cubierta BETWEEN '$cubiertaMin' AND '$cubiertaMax' AND habitaciones = '$habitaciones' ";
    }
    if($habitaciones == "4+"){
      $principalFil .=" area_total BETWEEN '$totalMin' AND '$totalMax' AND area_cubierta BETWEEN '$cubiertaMin' AND '$cubiertaMax' AND habitaciones >= '4' ";
    }

    if($banos == ""){
      $principalFil .=" ORDER BY idPropiedad DESC";
    }
    if($banos != "2+" AND $banos != "" ){
      $principalFil .=" AND banos = '$banos' ORDER BY idPropiedad DESC ";
    }
    if($banos == "2+"){
      $principalFil .=" AND banos > '2' ORDER BY idPropiedad DESC";
    }

    $finalSql=trim($principalFil, 'AND');
    $principal = mysqli_query($conexion, $finalSql);

    //else{
      //$principalFil .=" area_total BETWEEN '$totalMin' AND '$totalMax' AND area_cubierta BETWEEN '$cubiertaMin' AND '$cubiertaMax' AND habitaciones LIKE '%" . $habitaciones . "%' AND banos LIKE '%" . $banos . "%' ORDER BY idPropiedad DESC";
    //}
      
      //$principal = mysqli_query($conexion, "SELECT * FROM propiedad area_total BETWEEN '$totalMin' AND '$totalMax' AND area_cubierta BETWEEN '$cubiertaMin' AND '$cubiertaMax' AND habitaciones LIKE '%" . $habitaciones . "%' AND banos LIKE '%" . $banos . "%' " IN($principalFil1));
     
        }
    

  

  if (isset($_POST['InFilt'])) {
    $moneda='pesos';
    $cubiertaMin = mysqli_real_escape_string($conexion, $_POST['cubiertaMin']);
    $cubiertaMax = mysqli_real_escape_string($conexion, $_POST['cubiertaMax']);
    $totalMin = mysqli_real_escape_string($conexion, $_POST['superfieTotalMin']);
    $totalMax = mysqli_real_escape_string($conexion, $_POST['superfieTotalMax']);
    $habitaciones = mysqli_real_escape_string($conexion, $_POST['habitaciones']);
    $banos = mysqli_real_escape_string($conexion, $_POST['banos']);

    if($cubiertaMin == ""){
      $cubiertaMin = 1;
    }
    if($cubiertaMax == ""){
      $cubiertaMax = 999999999;
    }
    if($totalMin == ""){
      $totalMin = 1;
    }
    if($totalMax == ""){
      $totalMax = 999999999;
    }
    if($cubiertaMin =="" AND $cubiertaMax =="" AND $totalMin =="" AND $totalMax =="" AND $habitaciones =="" AND $banos ==""){
      $principal = mysqli_query($conexion, "SELECT * FROM propiedad");
    
    }else{
      $principal = mysqli_query($conexion, "SELECT * FROM propiedad WHERE area_total BETWEEN '$totalMin' AND '$totalMax' AND area_cubierta BETWEEN '$cubiertaMin' AND '$cubiertaMax' AND habitaciones LIKE '%" . $habitaciones . "%' AND banos LIKE '%" . $banos . "%' ORDER BY idPropiedad DESC");
 
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
            <a class="waves-effect waves-light" href="index.php">inicio</a>
          </li>
          <li>
            <a class="waves-effect waves-light" href="./servicios.html">Servicios</a>
          </li>
          <li>
            <a class="waves-effect waves-light" href="index.php#contact">Contacto</a>
          </li>
          <li>
            <a id="ingresar" class="modal-login showModal waves-effect waves-light" href="">Ingresar</a>
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

    <section id="carouselExampleFade" class="carousel slide pro search-result-carousel carousel-fade" data-ride="carousel">
      <div class="carousel-inner">

        <div class="carousel-item active">
          <img src="dist/img/cover-1.jpg" class="d-block w-100" alt="...">
        </div>

        <div class="carousel-item">
          <img src="dist/img/cover-2.jpg" class="d-block w-100" alt="...">
        </div>

        <div class="carousel-item">
          <img src="dist/img/cover-3.jpg" class="d-block w-100" alt="...">
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

      <form id="search-main" action="busqueda-propiedades.php" method="POST">
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
            <select name="tipoPropiedad">
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

          <button type="submit" name="BuscProp" value="Buscar">Buscar</button>
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

        <form method="POST" class="filtros-container scrollbar scrollbar-primary" action="busqueda-propiedades.php">

          <div class="rango-container">
            <label for="superfieCubierta">Superficie Cubierta</label>

            <div class="input-container">
              <input name="cubiertaMin" placeholder="Desde..." type="number">
              <input name="cubiertaMax" placeholder="Hasta..." type="number">
            </div>
          </div>

          <div class="rango-container">
            <label for="superfieTotal">Superficie Total</label>

            <div class="input-container">
              <input name="superfieTotalMin" placeholder="Desde..." type="number">
              <input name="superfieTotalMax" placeholder="Hasta..." type="number">
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
              <input name="habitaciones" type="radio" value="4+">4 o más
            </div>
            <div class="input-container">
              <input name="habitaciones" type="radio" value="" checked>Todas
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
              <input name="banos" type="radio" value="2+">más de 2
            </div>
            <div class="input-container">
              <input name="banos" type="radio" value=""  checked>indistinto
            </div>
          </div>

          <input type="submit" name="Filt1" value="Aplicar">
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

      <h1 class="pt-4 pt-md-0">Resultados de Busqueda <?php echo $finalSql ?>  </h1>

      <div id="busqueda-products-page" data-url="productspage" class="publications-container py-4 px-xl-5">

        <!-- Insertar Publicaciones -->
        <?php

        if(!$principal){ echo "no hubo resultados sorry";}
        
        else {

        
            while ($publicacion = mysqli_fetch_array($principal)) {

            
                      
              if ($moneda == 'pesos') {
                $precio = $publicacion['peso'];
              } else {
                $precio = $publicacion['dolar'];
              }
            ?>
              <a href="publicacion-precarga.php?public=<?php echo $publicacion['idPropiedad']; ?>" class="publications-item">
                <div class="img-container">

                  <img src="dist/images/<?php echo $publicacion['imagen1']; ?>" alt="">

                  <div class="publications-address">
                    <h5><?php echo $publicacion['calle']; ?></h5>
                  </div>
                  <div class="publications-price">
                    <h6>
                      $<?php echo $precio; ?>
                    </h6>
                  </div>

                  <div class="publications-features">

                    <div href="#?" class="bedroom-icon">
                      <span>
                        <?php
                        if ($publicacion['habitaciones'] == '4+' || $publicacion['habitaciones'] > 4) {
                          echo '4+';
                        } else {
                          if ($publicacion['habitaciones'] != '') {

                            echo $publicacion['habitaciones'];
                          } else {
                            echo '-';
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
                            echo '-';
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
                            echo '-';
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
                          echo '-';
                        }
                        ?>
                      </span>
                      <img src="dist/img/icons/car-parking-blue.svg" alt="">
                    </div>

                  </div>

                </div>
              </a>
            <?php }
          }

        ?>

      </div>
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
  <!--   <script type="text/javascript" src="src/js/fetch.js"></script> -->
   <!-- <script type="text/javascript" src="src/js/fetchProducts.js"></script> -->
  <script type="text/javascript" src="src/js/hideShowModals.js"></script>
  <script type="text/javascript" src="src/js/filtros.js"></script>
  <!--<script type="text/javascript" src="src/js/filtrosValidation.js"></script>-->
  <script type="text/javascript" src="src/js/hamburger.js"></script>
</body>

</html>