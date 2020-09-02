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
    <header>
        <nav class="py-2 px-4">
            <div class="img-container">
                <img class="img-fluid" src="dist/img/DD-LOGO.png" alt="">
                <!-- <span>Dueño directo</span> -->
            </div>

            <div class="menu-btns">
                <ul class="menu-items hide py-1 py-md-0">
                    <li>
                        <a class="waves-effect waves-light" href="index.php"> Volver a Inicio</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <section id="recuperar">
            <div class="contenedor">
                <div class="contenedor-especifico mono">
                    <h2 style="grid-column: 1/3;">Su Contraseña ha sido cambiada Exitosamente.</h2>
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
                    <form action="" id="formulario-respuesta">
                        <input type="text" placeholder="Codigo de confirmación">
                        <input type="submit" value="Confirmar">
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