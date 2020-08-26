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
</head>
<body>
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
    </header>
    <main>

        <section id="modal-login" class="modal hide">
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

        <section id="nueva-publicacion">

            <div class="publication-container">

                <h1>Nueva Publicación</h1>
                <div class="contenedor-tipo">
    
                    <form action="">
                        <p>¿Que publicarás?</p>
                        <select name="tipo" id="tipo">
                            <option value="propiedad">Propiedad</option>
                            <option value="profesional">Profesional</option>
                            <option value="servicio">Servicio</option>
                        </select>
                    </form>
    
                </div>
    
                <form id="propiedad" class="panelcontent active" action="process/savepropiedad.php" method="POST" enctype="multipart/form-data">
                    
                    <div class="form-area titulo-publicacion">
                        <input type="text" name="nombre" id="nombre" placeholder="Nombre de la Publicación">
                        <p>Este nombre aparecerá en la lista de publicaciones</p>
                    </div>

                    <div class="form-area tipo-inmueble">
                        <label for="tipo-propiedad">¿Que tipo de Propiedad vas a publicar?</label>
                        <select name="tipo-propiedad" id="tipo-propiedad">
                            <option value="">Seleccione...</option>
                            <option value="departamento">Departamento</option>
                            <option value="casa">Casa</option>
                            <option value="lote">Lote</option>
                            <option value="local">Local</option>
                        </select>
                    </div>
                    
                    <div class="form-area moneda-container">
                        
                        <label for="">Precio en peso ARS</label>
                        <input type="number" name="peso" placeholder="0.00$">

                        <label for="">Precio en dolar</label>
                        <input type="number" name="dolar" placeholder="0.00$">
                        
                    </div>

                    <div class="form-area alquilar-vender">
                        <label for="tipo-propiedad">¿Que finalidad deseas con la publicación?</label>
                        <select name="finalidad" id="finalidad">
                            <option value="">Seleccione...</option>
                            <option value="alquiler">Alquilar</option>
                            <option value="venta">Vender</option>
                        </select>
                    </div>
                    
                    <div class="form-area description">
                        <textarea name="descripcion" id="descripcion" placeholder="Descripción"></textarea>
                    </div>

                    <div class="form-area area-inmueble">
                        <input type="text" name="area-total" id="area-total" placeholder="Area total en m2">
                        <input type="text" name="area-cubierta" id="area-cubierta" placeholder="Area cubierta en m2">
                        <div class="contenedor-radio">
                            <div class="radio">
                                <h6>Gas por Tubería</h6>
                                <div class="input-container">
                                    Si
                                    <input type="radio" name="gas" id="gas" value="si">
                                    No
                                    <input type="radio" name="gas" id="gas" value="no">
                                </div>
                            </div>
                            <div class="radio">
                                <h6>Luz Eléctrica</h6>
                                <div class="input-container">
                                    Si
                                    <input type="radio" name="luz" id="luz" value="si">
                                    No
                                    <input type="radio" name="luz" id="luz" value="no">
                                </div>
                            </div>
                            <div class="radio">
                                <h6>Aguas </h6>
                                <div class="input-container">
                                    Si
                                    <input type="radio" name="agua" id="agua" value="si">
                                    No
                                    <input type="radio" name="agua" id=agua value="no">
                                </div>
                            </div>
                            <div class="radio">
                                <h6>Cloacas</h6>
                                <div class="input-container">
                                    Si
                                    <input type="radio" name="cloacas" id="cloacas" value="si">
                                    No
                                    <input type="radio" name="cloacas" id="cloacas" value="no">
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="form-area image">
                        <!-- Agregar imagenes -->
                        imagenes
                        <input type="file" name="imagen1" class="form-control-file" accept="image/*" required>
                        <input type="file" name="imagen2" class="form-control-file" accept="image/*" required>
                        <input type="file" name="imagen3" class="form-control-file" accept="image/*" required>
                        <input type="file" name="imagen4" class="form-control-file" accept="image/*" required>
                        <input type="file" name="imagen5" class="form-control-file" accept="image/*" required>
                    </div>

                    <div class="form-area inmueble-features">
                        <div class="contenedor-hab">
                            <p>Cantidad de habitaciones</p>
                            <select name="habitaciones" id="habitaciones">
                                <option value="">Seleccione</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4mas">4 o más</option>
                            </select>
                        </div>
                        <div class="contenedor-banos">
                            <p>Cantidad de Baños</p>
                            <select name="banos" id="banos">
                                <option value="">Seleccione</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4mas">4 o más</option>
                            </select>
                        </div>
                        <div class="contenedor-radio">
                            <div class="radio">
                                <h6>¿Se permiten mascotas?</h6>
                                <div class="input-container">
                                    Si
                                    <input type="radio" name="mascotas" value="si">
                                    No
                                    <input type="radio" name="mascotas" value="no">
                                </div>
                            </div>
                            <div class="radio">
                                <h6>Disponibilidad de Cochera</h6>
                                <div class="input-container">
                                    Si
                                    <input type="radio" name="cochera" value="si">
                                    No
                                    <input type="radio" name="cochera" value="no">
                                </div>
                            </div>
                            <div class="radio">
                                <h6>Expensas</h6>
                                <div class="input-container">
                                    Si
                                    <input type="radio" name="expensas" value="si">
                                    No
                                    <input type="radio" name="expensas" value="no">
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="form-area ubicacion">
                        <h6>Ubicación de la propiedad</h6>
                        <select name="provincia" id="provincia">
                            <option value="">Provincia</option>
                            <option value="Buenos Aires">Buenos Aires</option>
                            <option value="Córdoba">Córdoba</option>
                            <option value="Mendoza">Mendoza</option>
                            <option value="Catamarca">Catamarca</option>
                            <option value="Chaco">Chaco</option>
                            <option value="Chubut">Chubut</option>
                            <option value="Corrientes">Corrientes</option>
                            <option value="Entre Ríos">Entre Ríos</option>
                            <option value="Formosa">Formosa</option>
                            <option value="Jujuy">Jujuy</option>
                            <option value="La Pampa">La Pampa</option>
                            <option value="La Rioja">La Rioja</option>
                            <option value="Misiones">Misiones</option>
                            <option value="Neuquen">Rio Negro</option>
                            <option value="Salta">Salta</option>
                            <option value="San Juan">San Juan</option>
                            <option value="San Luis">San Luis</option>
                            <option value="Santa Cruz">Santa Cruz</option>
                            <option value="Santa Fe">Santa Fe</option>
                            <option value="Santiago del Estero">Santiago del Estero</option>
                            <option value="Tierra del Fuego">Tierra del Fuego</option>
                            <option value="Tucumán">Tucumán</option>
                        </select>
                        <input name="municipalidad" id="municipalidad" placeholder="Departamento">
                        <input type="text" name="calle" id="calle" placeholder="Calle">
                        
                    </div>

                    <div class="form-area">
                        <div class="contacto-container">
                            <p>Datos de Contacto</p>
                            <input type="number" id="telefono" name="telefono" placeholder="Teléfono de Contacto">
                        </div>
                        <div class="tiempo-publicacion">
                            <p>Duración de la publicacion</p>
                            <select name="tiempo-publicacion" id="tiempo-publicacion" >
                                <option value="">Seleccione...</option>
                                <option value="1">1 Mes</option>
                                <option value="2">2 Meses</option>
                                <option value="3">3 Meses</option>
                            </select>
                        </div>
                    </div>

                    <div class="btn-precarga">
                         <button class="btn" type="submit" name="propiedad">Precargar Publicación</button>
                    </div>

                </form>
    
                <form id="profesional" class="panelcontent" action="process/saveprofesional.php" method="POST">

                    <div class="form-area contenedor-titulo">
                        <p>Tipo de profesional</p>
                        <select name="profesional" id="profesional">
                            <option value="">Selecciona...</option>
                            <option value="arquitecto">Arquitecto</option>
                            <option value="fontanero">Fontanero</option>
                            <option value="...">otros...</option>
                        </select>
                    </div>

                    <div class="form-area container-datos">
                        <input type="text" name="titulacion" placeholder="Titulación">
                        <input type="text" name="telefono" placeholder="Teléfono">
                    </div>

                    <div class="form-area image">
                        <!-- Agregar imagenes -->
                        imagenes
                    </div>

                    <div class="form-area container-ubicacion">
                        <p>Indicanos tu ubicación, para mostrar a los visitantes</p>
                        <select name="provincia" id="provincia">
                            <option value="">Provincia...</option>
                            <option value="">Cargar provincias</option>
                        </select>
                        <select name="municipalidad" id="municpalidad">
                            <option value="">Municipalidad...</option>
                            <option value="">Cargar Municipalidad</option>
                        </select>
                    </div>

                    <div class="btn-precarga">
                         <button class="btn" type="submit" name="propiedad">Precargar Publicación</button>
                    </div>

                </form>

                <form id="servicio" class="panelcontent" action="">
                    <h2 style="font-size: 30px; font-weight: bold;">¡PROXIMAMENTE!</h2>
                </form>
            </div>


        </section>
    </main>
    
    <!-- jQuery -->
  <script type="text/javascript" src="dist/js/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="dist/js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="dist/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="dist/js/mdb.min.js"></script>
  <!-- Your custom scripts (optional) -->
  <script type="text/javascript" src="src/js/panel-publicacion.js"></script>
  <script type="text/javascript" src="src/js/hideShowModals.js"></script>
  <script type="text/javascript" src="src/js/hamburger.js"></script>
</body>

</html>

<?php  }
 else {
    echo "usuario o contraseña incorrectos";
    echo $_SESSION['usuario'];
    echo $_SESSION['id'];
    //header("Location: index.php");
 }
?>