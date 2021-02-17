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
        <link rel="stylesheet" href="src/css/style.css">
        <!-- <link rel="stylesheet" href="src/css/registro.css"> -->
        <link rel="stylesheet" href="src/css/usuario.css">
    </head>

    <body>
        <?php

        if (isset($_POST['Guardar'])) {
            $usuario = mysqli_real_escape_string($conexion, $_POST['usuario']);
            $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
            $dni = mysqli_real_escape_string($conexion, $_POST['dni']);
            $categoria = mysqli_real_escape_string($conexion, $_POST['categorias']);
            $telefono = mysqli_real_escape_string($conexion, $_POST['telefono']);
            $descripcion = mysqli_real_escape_string($conexion, $_POST['descripcion']);
            $email = mysqli_real_escape_string($conexion, $_POST['correo']);

            $update_user = mysqli_query($conexion, "UPDATE user SET usuario='$usuario', nombre='$nombre', dni='$dni', categoria='$categoria', email='$email', telefono='$telefono', descripcion='$descripcion' WHERE id='$id_user'") or die("Problemas actualizando la informacion:" . mysqli_error($conexion));
            if ($update_user) {
                echo "Se actualizaron los datos correctamente";
            }
        }



        $table_user = mysqli_query($conexion, "SELECT * FROM user WHERE id = '$id_user'");
        $consuldates = mysqli_fetch_array($table_user);
        $user_name = $consuldates['nombre'];
        $user_email = $consuldates['email'];
        $user_phone = $consuldates['telefono'];
        $user_dni = $consuldates['dni'];
        $user_categoria = $consuldates['categoria'];
        $user_descripcion = $consuldates['descripcion'];
        $user = $consuldates['usuario'];
        $imgPerfil=$consuldates['imagen'];

        $conPropiedades= mysqli_query($conexion,"SELECT * FROM propiedad WHERE idUser='$id_user' AND estado='precargada'");
        
        $propiedadOk= mysqli_query($conexion,"SELECT * FROM propiedad WHERE idUser='$id_user' AND estado='activa'");


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
                            <a class="waves-effect waves-light" href="index.php#contact">Contacto</a>
                        </li>
                        <li>
                            <a class="waves-effect waves-light" href="publicacion.php">Publicar</a>
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
                                <a href="home.php">Panel</a>
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
            <section id="modal-input-img" class="modal hide">
                <div class="login">
                    <div class="title-container p-3">
                        <h5>Ingresa una imagen</h5>
                        <i class="closeModal fa fa-times"></i>
                    </div>

                    <form class="main-container p-3" action="process/img_user.php" method="POST" enctype="multipart/form-data">

                        <div class="input-container py-5">
                            <input name="id" type="hidden" value="<?php echo $consuldates['id']; ?>">
                            <input name="imagen" type="file" accept="image/*">
                        </div>

                        <div class="login-container">

                            <button type="submit" name="Enviar">Aceptar</button>
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
            <!-- <script type="text/javascript">
                modalError('Mensaje de prueba');
            </script> -->

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
                    <form method="POST" id="perfil" class="tabcontent active" data-index="0">

                        <div class="contenedor-perfil">

                            <div class="columna1 columna px-2 px-sm-0">
                                <div class="datos-personales">

                                    <label for="">Datos Personales</label>
                                    <div class="input-container">
                                        <input type="text" id="usuario" name="usuario" value="<?php echo $user; ?>" placeholder="Usuario">
                                        <input type="text" id="nombre" name="nombre" placeholder="Nombres" value="<?php echo $user_name; ?>">
                                        <input type="text" id="dni" name="dni" placeholder="DNI" value="<?php echo $user_dni; ?>">
                                        <input type="text" id="correo" name="correo" placeholder="Correo" value="<?php echo $user_email; ?>">
                                        <input type="text" id="telefono" name="telefono" placeholder="Teléfono" value="<?php echo $user_phone; ?>">
                                    </div>
                                </div>

                                <div class="categoria">
                                    <label for="categoria">Categoría</label><br>
                                    <div class="input-container">
                                        <select name="categorias" id="categorias">
                                            <option value="<?php echo $user_categoria; ?>"><?php echo $user_categoria; ?></option>
                                            <option value="propietario">Propietario</option>
                                            <option value="profesional">Profesional</option>
                                            <option value="otro">Otro...</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                        
                            <div class="columna2 columna px-2 px-sm-0">
                             <?php 
                             
                             if ($imgPerfil == NULL){ ?>

                                <div class="imagen" >
                                    <img src="./dist/img/icons/icons8-camera-100.png" alt="" >
                                    <!-- <p>Foto del Usuario</p> -->
                                    <a class="modal-input-img showModal">Cargar Imagen</a>
                                </div>
                                 <?php }

                            else {  ?>

                                <div class="imagen" >
                                    <img src="data:image/jpg;base64,<?php echo base64_encode($consuldates['imagen']);?>" alt="" >
                                    <!-- <p>Foto del Usuario</p> -->
                                    <a class="modal-input-img showModal">Cargar Imagen</a>
                                </div>
                            
                           <?php }

                             ?>
                               

                                <div class="descripcion">

                                    <label for="descripcion">Descripcion de Usuario</label><br>
                                    <div class="input-container">
                                        <textarea name="descripcion" value="<?php echo $user_descripcion; ?>" id="descripcion" cols="20" rows="5" placeholder="Breve Descripcion"><?php echo $user_descripcion; ?></textarea>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <input type="submit" name="Guardar" value="Guardar Cambios" class="guardar">
                    </form>

                    <div id="publicaciones" class="tabcontent" data-index="1">
                        <a class="nueva-publicacion" href="publicacion.php">
                            NUEVA PUBLICACION
                        </a>
                        <div class="contenedor-publicaciones">
                            <h4>Publicaciones Realizadas</h4>
                            <div class="publicaciones">
                            <?php 
                                while ($Ok= mysqli_fetch_array($propiedadOk)){ 
                            
                            ?>
                                <div class="item-publicacion">
                                    <?php $publicID=$Ok['idPropiedad']; ?>
                                    <img src="./dist/img/<?php echo $Ok['imagen1'] ?>" alt="">
                                    <p><?php echo $Ok['descripcion'] ?></p>
                                    <div class="acciones">
                                        <a href='<?php echo "editar-publicacion.php?public=$publicID" ?>' >Modificar</a>
                                        <a href='<?php echo "process/delPublicacion.php?public=$publicID" ?>'>Eliminar</a>
                                    </div>

                                </div>
                                <?php } ?>
                                <div class="item-publicacion">
                                    <img src="./dist/img/Productos1.jpg" alt="">
                                    <p>Descripcion de la publicacion</p>
                                    <div class="acciones">
                                        <a href="">Modificar</a>
                                        <a href="">Eliminar</a>
                                    </div>

                                </div>
                            </div>

                            <h4>Publicaciones Pre-cargadas</h4>
                            <div class="publicaciones">

                            <?php 
                                while ($propiedad= mysqli_fetch_array($conPropiedades)){ 
                            
                            ?>
                                <div class="item-publicacion">
                                    <?php $public=$propiedad['idPropiedad']; ?>
                                    <img src="./dist/images/<?php echo $propiedad['imagen1'] ?>" alt="">
                                    <p><?php echo $propiedad['descripcion'] ?></p>
                                    <div class="acciones">
                                        <a href="">Publicar</a>
                                        <a href='<?php echo "editar-publicacion.php?public=$public" ?>'>Modificar</a>
                                        <a href='<?php echo "process/delPublicacion.php?public=$publicID" ?>'>Eliminar</a>
                                    </div>

                                </div>
                            <?php 
                                    }
                            ?>
                            
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
        <script type="text/javascript" src="src/js/hideShowModals.js"></script>
        <script type="text/javascript" src="src/js/panel-usuario.js"></script>
        <script type="text/javascript" src="src/js/hamburger.js"></script>
    </body>

    </html>
<?php  } else {
    echo "usuario o contraseña incorrectos";
    header("Location: index.php");
}
?>