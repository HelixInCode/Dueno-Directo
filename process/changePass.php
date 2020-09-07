<?php
 session_start();
  include('../conexion.php');
 $us=$_GET['Recuperacion'];

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
    <link rel="stylesheet" href="../dist/css/style.css">
    <link rel="stylesheet" href="../dist/css/registro.css">
    <link rel="stylesheet" href="../dist/css/publicacion-precarga.css">
    <link rel="stylesheet" href="../src/css/contrasena.css">
</head>

<body>
<?php 
if(isset($_POST['Change'])){

    $new=mysqli_real_scape_string($conexion, $_POST['new']);
    $re=mysqli_real_scape_string($conexion, $_POST['reNew']);
    $cantidad=strlen($new);

   if($cantidad>=8){ 
   
        if($new == $re){
            $passUpdate=mysqli_query($conexion, "UPDATE user SET clave='$new' WHERE id='$us'");
            if($passUpdate){
                header("Location: ../index.php")
            }else{
                echo "Error al guardar los datos";
            }
        }else{
            echo "ERROR: Las contraseñas no coinciden";
        }
    }else{
        echo "ERROR: La contraseña tiene que tener mínimo 8 caracteres";

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
                        <a class="waves-effect waves-light" href="#?">Contacto</a>
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
                    <h2>Cambiar Contraseña</h2>
                    <form action="">
                        <div class="item">
                            <label for="">Nueva Contraseña</label>
                            <input type="password" name="new" placeholder="Nueva Contraseña">
                        </div>
                        <div class="item">
                            <label for="">Repetir Nueva Contraseña</label>
                            <input type="password" name="reNew" placeholder="Repetir Contraseña">
                        </div>
                        <div class="boton">
                            <input type="submit" name="Change" value="Confirmar Nueva Contraseña">
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
                    <i class="fas fa-check-circle"></i>
                    <p>Su contraseña ha sido actualizada Exitosamente</p>
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
    <script type="text/javascript" src="src/js/btn-mercado.js"></script>
    <!-- <script type="text/javascript" src="src/js/modalMessageSentAppears.js"></script> -->

</body>

</html>