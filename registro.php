<?php include('conexion.php'); ?>
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

                        <i class="fas fa-user fa-2x" style="color: #E9EBF5;"></i>
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
    <?php
    if (isset($_POST['Enviar'])) {
        $usuario = mysqli_real_escape_string($conexion, $_POST['username']);
        $clave = mysqli_real_escape_string($conexion, $_POST['clave']);
        $email = mysqli_real_escape_string($conexion, $_POST['mail']);
        $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
        $dni = mysqli_real_escape_string($conexion, $_POST['dni']);
        $telefono = mysqli_real_escape_string($conexion, $_POST['telefono']);
        $categoria = mysqli_real_escape_string($conexion, $_POST['categoria']);


        $sql = mysqli_query($conexion, "SELECT email FROM user WHERE email='" . $email . "'");
        if (mysqli_num_rows($sql) > 0) { ?>
            <div>El correo de usuario elegido ya existe</div>
            <?php } else {
            $clave = crypt($clave, "pass");
            $reg = mysqli_query($conexion, "INSERT INTO user (usuario, clave, nombre, dni, email, telefono, categoria) VALUES ('$usuario','$clave','$nombre','$dni','$email','$telefono','$categoria')") or die(mysqli_error($conexion));
            if ($reg) {
            ?>
                <div>Usuario creado correctamente</div>
                <meta http-equiv="Refresh" content="2" url="lgn.php" />
            <?php } else {
            ?>

                <div>Error al guardar los datos</div>
    <?php
            }
        }
    }
    ?>
    <main>
        <section id="registro" class="mb-5 px-2">
            <div class="contenedor">
                <h3 class="text-center text1">Registro</h3>
                <form id="login-form" class="form" action="" method="POST">

                    <div class="input-container">
                        <label for="username" class="text1">Usuario:</label><br>
                        <input type="text" name="username" id="username" class="form-control">
                    </div>
                    <div class="input-container">
                        <label for="mail" class="text1">Contraseña:</label><br>
                        <input type="password" name="clave" id="clave" class="form-control">
                    </div>
                    <div class="input-container">
                        <label for="password" class="text1">Nombre:</label><br>
                        <input type="text" name="nombre" id="nombre" class="form-control">
                    </div>
                    <div class="input-container">
                        <label for="password" class="text1">DNI:</label><br>
                        <input type="text" name="dni" id="dni" class="form-control">
                    </div>
                    <div class="input-container">
                        <label for="password" class="text1">Email:</label><br>
                        <input type="mail" name="mail" id="mail" class="form-control">
                    </div>
                    <div class="input-container">
                        <label for="password" class="text1">Telefono:</label><br>
                        <input type="text" name="telefono" id="telefono" class="form-control">
                    </div>
                    <div class="input-container">
                        <label for="password" class="text1">Categoria:</label><br>
                        <input type="text" name="categoria" id="categoria" class="form-control">
                    </div>
                    <div class="input-container">
                        <input type="submit" name="Enviar" class="button1" value="Enviar">
                    </div>
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
    <script type="text/javascript" src="src/js/hamburger.js"></script>
</body>

</html>