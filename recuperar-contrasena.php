<?php
include('conexion.php'); ?>

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
    <link rel="stylesheet" href="src/css/contrasena.css">
</head>

<body>

    <?php

    $email = "";
    $coincidencias = 0;
    if (isset($_POST['Correo'])) {
        $email = mysqli_real_escape_string($conexion, $_POST['email']);

        $sel = mysqli_query($conexion, "SELECT * FROM user WHERE email='$email'");




        while ($arrayE = mysqli_fetch_array($sel)) {

            $num00000 = rand(10000, 99999);

            $email = $_REQUEST['email'];
            $asunto = "Dueño Directio - Recuperacion de Contraseña";
            $mensaje2 = $num00000;


            $header = 'From: ' . $email . " \r\n";
            $header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
            $header .= "Mime-Version: 1.0 \r\n";
            $header .= "Content-Type: text/plain";

            $mensaje = "El código para la recuperacion de contraseña es:,\r\n";
            $mensaje .=  $mensaje2 . ",\r\n";

            $mensaje .= "Enviado el " . date('d/m/Y', time());

            $para = $email;
            $asunto = "Dueño Directio - Recuperacion de Contraseña";

            mail($para, $asunto, utf8_decode($mensaje), $header);
        }
    }

    if(isset($_POST['CoD'])){

        $cod=mysqli_real_escape_string($conexion, $_POST['CoD']);

        if ($cod==$num00000){
            $Cod=$arrayE['id'];
            echo "Código correcto";
            header("Location: process/changePass.php?Recuperacion=".$Cod);
        }else {
            echo "Código Incorrecto";
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
                        <a class="waves-effect waves-light" href="./servicios.html">Servicios</a>
                    </li>
                    <li>
                        <a class="waves-effect waves-light" href="index.php#contact">Contacto</a>
                    </li>
                </ul>
                <div class="menu-overlay hide d-block d-md-none"></div>

                <div id="hamburger" class="hamburger-btn d-flex d-md-none">
                    <i id="ham-icon" class="fas fa-bars fa-1-3x"></i>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <section id="recuperar">
            <div class="contenedor">
                <div class="contenedor-especifico">
                    <h2 style="text-align: center;">Recuperar Contraseña</h2>
                    <form action="" method="POST" id="formulario-recupera">
                        <div class="item">
                            <label for="">Correo de Usuario</label>
                            <span class="form-text text-muted m-0">En caso de estar registrado este correo, se enviará un código de activación</span>
                            <input type="email" name="email" placeholder="Correo de Usuario" required>
                        </div>
                        <div class="boton">
                            <input type="submit" name="Correo" value="Enviar Correo">
                        </div>

                    </form>

                </div>

            </div>


        </section>
        <section id="modal-message-sent" class="modal hide">
            <div class="login">
                <div class="title-container p-3">
                    <!-- <h5>Mensaje Enviado</h5> -->
                    <i id="close-sent" class="closeModal fa fa-times"></i>
                </div>
                <div class="main-container message p-3 pb-4">
                    <p>Se ha enviado un codigo a su email. Por favor ingrese aquí dicho código</p>
                    <form action="" id="formulario-respuesta" style="text-align: center;">
                        <input type="text" name="CoD" placeholder="Codigo de confirmación">
                        <input type="submit"  name="CoD" value="Confirmar">
                    </form>
                </div>
            </div>
        </section>
    </main>


    <footer>
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
    <script type="text/javascript" src="src/js/panel-publicacion.js"></script>
    <script type="text/javascript" src="src/js/hamburger.js"></script>
    <script type="text/javascript" src="src/js/modalMessageContrasena.js"></script>

</body>

</html>