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
    <link rel="stylesheet" href="src/css/style.css">
</head>

<body>
    <header>
        
    </header>
    <?php
    if (isset($_POST['Enviar'])) {
        $usuario = mysqli_real_escape_string($conexion, $_POST['username']);
        $email = mysqli_real_escape_string($conexion, $_POST['mail']);
        $clave = mysqli_real_escape_string($conexion, $_POST['clave']);

       


        $sql = mysqli_query($conexion, "SELECT email FROM masteradmin WHERE email='" . $email . "'");
        if (mysqli_num_rows($sql) > 0) { ?>
            <div class="alert alert-danger" role="alert">
                El correo ya se ha registrado anteriormente.
            </div>
            <?php } else {
            $clave = crypt($clave, "masteradmins");
            $reg = mysqli_query($conexion, "INSERT INTO masteradmin (email, clave, Nombre) VALUES ('$email','$clave','$usuario')") or die(mysqli_error($conexion));
            if ($reg) {
            ?>
                <div class="alert alert-success" role="alert">Usuario creado correctamente</div>
                <meta http-equiv="Refresh" content="2" url="lgn.php" />
            <?php } else {
            ?>

            <div class="alert alert-danger" role="alert">Error al guardar los datos</div>
    <?php
            }
        }
    }
    ?>
    <main>
        <section id="login">
            <h3 class="text-center letra pt-5">Dueño Directo</h3>
            <div class="container">
                <div id="login-row" class="row justify-content-center align-items-center">
                    <div id="login-column" class="col-md-6">
                        <div id="login-box" class="col-md-12">
                            <form id="login-form" class="form" action="" method="POST">
                                <h3 class="text-center text1">Registro</h3>
                                <div class="form-group">
                                    <label for="username" class="text1">Usuario:</label><br>
                                    <input type="text" name="username" id="username" class="form-control">
                                </div>
                               
                                <div class="form-group">
                                    <label for="password" class="text1">Email:</label><br>
                                    <input type="mail" name="mail" id="mail" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="mail" class="text1">Contraseña:</label><br>
                                    <input type="password" name="clave" id="clave" class="form-control">
                                </div>
                                
                                <div class="form-group">
                                    <input type="submit" name="Enviar" class="btn btn-info btn-md button1" value="Enviar">
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer></footer>
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