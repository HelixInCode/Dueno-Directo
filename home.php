<?php
 session_start();
 include('conexion.php');
 if(isset($_SESSION['id'])) {

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
post  <!-- <link rel="stylesheet" href="src/css/registro.css"> -->
  <link rel="stylesheet" href="dist/css/usuario.css">
</head>
<body>
  <?php 
    
    $table_user = mysqli_query($conexion, "SELECT * FROM user WHERE id = '$id_user'");
    $consuldates = mysqli_fetch_array($table_user);
    $user_name = $consuldates ['nombre'];
    $user_email = $consuldates ['email']; 
    $user_phone = $consuldates ['telefono'];
    $user_dni = $consuldates ['dni'];
    $user_categoria = $consuldates ['categoria'];
  
  ?>
    <header>
        <nav class="py-2 px-4">
            <div class="img-container">
              <img class="img-fluid" src="dist/img/DD-LOGO.png" alt="">
              <!-- <span>Dueño directo</span> -->
            </div>
      
            <div class="menu-btns">
              <ul class="menu-items four-buttons hide py-1 py-md-0">
                <li>
                  <a class="waves-effect waves-light" href="index.php">Home</a>
                </li>
                <li>
                  <a class="waves-effect waves-light" href="./servicios.html">Servicios</a>
                </li>
                <li>
                  <a class="waves-effect waves-light" href="#?">Contacto</a>
                </li>
                <li class="d-none">
                  <a id="ingresar" class="waves-effect waves-light" href="#?">Ingresar</a>
                </li>
                <li>
                  <a class="waves-effect waves-light" href="publicacion.php">Publicar</a>
                </li>
              </ul>
      
              <div class="user">
                <a href="#?">
                    <img src="./dist/img/icons/user.png" alt="">
                </a>
                <ul>
                    <li><a href="">Panel</a></li>
                    <li><a href="">Cerrar Sesion</a></li>
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
        <section id="panel-usuario" class="px-2 px-sm-3">
            <div class="main-container">

                <h3>PANEL DE USUARIO</h3>
                <div class="tab">
                    <button class="tablinks active">Perfil</button>
                    <button class="tablinks">Publicaciones</button>
                    <button class="tablinks">Planes</button>
                    <button class="tablinks ">Estadisticas</button>
                </div>
              
                <!-- Contenido de Pestañas -->
                <div id="perfil" class="tabcontent active" data-index="0">
                    
                    <div class="contenedor-perfil">
                      
                        <div class="columna1 columna px-2 px-sm-0">
                            <div class="datos-personales">
                                <label for="">Datos Personales</label>
                                <form action="" method="post">
                                    <input type="text" id="nombre" name="nombre" placeholder="Nombres" value="<?php echo $user_name;?>">
                                    <input type="text" id="apellido" name="apellido" placeholder="Apellidos">
                                    <input type="text" id="dni" name="dni" placeholder="DNI" value="<?php echo $user_dni;?>">
                                    <input type="text" id="correo" name="correo" placeholder="Correo" value="<?php echo $user_email;?>">
                                    <input type="text" id="telefono" name="telefono" placeholder="Teléfono" value="<?php echo $user_phone;?>">
                                </form>
                            </div>
                            <div class="categoria">
                                <label for="categoria">Categoría</label><br>
                                <form action="">
                                    <select name="categorias" id="categorias">
                                        <option value="<?php echo $user_categoria;?>"><?php echo $user_categoria;?></option>
                                        <option value="propietario">Propietario</option>
                                        <option value="profesional">Profesional</option>
                                        <option value="otro">Otro...</option>
                                    </select>
                                </form>
                            </div>
                           
        
                        </div>

                        <div class="columna2 columna px-2 px-sm-0">
                            <div class="imagen">
                                <img src="./dist/img/icons/icons8-camera-100.png" alt="">
                                <!-- <p>Foto del Usuario</p> -->
                                <a>Cargar Imagen</a>
                            </div>
                            <div class="descripcion">
                                <label for="descripcion">Descripcion de Usuario</label><br>
                                <form action="">
                                    <textarea name="" id="" cols="20" rows="5" placeholder="Breve Descripcion"></textarea>
                                </form>
                            </div>
    
                        </div>
                    </div>
                    
                    <a href="#?" class="guardar">Guardar Cambios</a>
                </div>
                
                <div id="publicaciones" class="tabcontent" data-index="1">
                    <div class="contenedor-publicaciones">
                        <h4>Publicaciones Realizadas</h4>
                        <div class="publicaciones">
                            <div class="item-publicacion">
                                <img src="./dist/img/Productos1.jpg" alt="">
                                <p>Descripcion de la publicacion</p>
                                <div class="acciones">
                                    <a href="">Modificar</a>
                                    <a href="">Eliminar</a>
                                </div>
    
                            </div>
                            <div class="item-publicacion">
                                <img src="./dist/img/Productos1.jpg" alt="">
                                <p>Descripcion de la publicacion</p>
                                <div class="acciones">
                                    <a href="">Modificar</a>
                                    <a href="">Eliminar</a>
                                </div>
    
                            </div>
                        </div>
    
                    </div>
                </div>
                
                <div id="planes" class="tabcontent" data-index="2">
                    <div class="contenedor-planes">
                        <h4>Planes Contratados</h4>
                        <div class="planes">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Plan</th>
                                        <th>Publicación</th>
                                        <th>Inicio</th>
                                        <th>Vencimiento</th>
                                        <th>Precio</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                      <td>Mensual</td>
                                      <td>Casa Verde</td><!-- titulo de la publicacion -->
                                      <td>03/05/2020</td>
                                      <td>03/04/2020</td>
                                      <td>$300</td>
                                      <td>
                                          <a href="">Modificar</a>
                                      </td>
                                    </tr>
                                    <tr>
                                        <td>Mensual</td>
                                        <td>Casa Verde</td><!-- titulo de la publicacion -->
                                        <td>03/05/2020</td>
                                        <td>03/04/2020</td>
                                        <td>$300</td>
                                        <td>
                                            <a href="">Modificar</a>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td>Mensual</td>
                                        <td>Casa Verde</td><!-- titulo de la publicacion -->
                                        <td>03/05/2020</td>
                                        <td>03/04/2020</td>
                                        <td>$300</td>
                                        <td>
                                            <a href="">Modificar</a>
                                        </td>
                                      </tr>
                                  </tbody>
                            </table>
                        </div>
                        
    
                    </div>
                </div>
                
                <div id="estadisticas" class="tabcontent" data-index="3">
                    <h3>Contador de Visitas</h3>
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
  <script type="text/javascript" src="src/js/panel-usuario.js"></script>
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