<?php 
include ('../conexion.php');

if (isset($_POST['Correo'])) {
    $email = mysqli_real_escape_string($conexion, $_POST['email']);

    $email=mysqli_query($conexion, "SELECT email FROM user WHERE email='$email'")or die(mysqli_error($conexion));
    $arrayE=mysqli_fetch_array($email);
    $coincidencias = mysqli_num_rows($sql);

    if($coincidencias == 1){

        $num00000= rand(10000,99999);

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

        header("Location: recuperar-contrasena.php");
    
    }
                

            

}

?>