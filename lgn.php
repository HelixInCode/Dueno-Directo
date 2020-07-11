<?php
session_start();
include ('conexion.php');
?>
<!doctype html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dueño Directo</title>
    <!-- Cake + Cake icon -->
    <link rel="icon" href="img/backgrounds/cake+cake-icon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet"> 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/lgn.css">
  </head>
  <body>

  <?php

    if(isset($_POST['Enviar'])) { // comprobamos que se hayan enviado los datos del formulario

        if(isset($_POST['username'])&& !empty($_POST['username']) && 
        isset($_POST['password']) && !empty($_POST['password'])){ 
            $usuario= mysqli_real_escape_string($conexion,$_POST['username']);
            $clave = mysqli_real_escape_string($conexion,$_POST['password']);
            $clave = crypt($clave,"pass");

            // comprobamos que los datos ingresados en el formulario coincidan con los de la BD
            $sql = mysqli_query($conexion,"SELECT id, usuario, clave FROM user WHERE usuario='$usuario' AND clave='$clave'") or die(mysqli_error($conexion));
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
    
  <div id="login">
        <h3 class="text-center letra pt-5">Dueño Directo</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Usuario:</label><br>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Contraseña:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                
                                <input type="submit" name="Enviar" class="btn btn-info btn-md" value="Enviar">
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>