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
    <link rel="stylesheet" href="src/css/registro.css">
    <link rel="stylesheet" href="src/css/publicacion-precarga.css">
    <link rel="stylesheet" href="src/css/pagos.css">
</head>

<body>

    <?php
    // SDK de Mercado Pago
    require __DIR__ .  '/vendor/autoload.php';

    // Agrega credenciales  Credenciales de Ale.. temporales
    MercadoPago\SDK::setAccessToken('APP_USR-4646343415539494-090616-3bfc9f97c465b8fe292097e5e9d44e9e-314675068');

    // Crea un objeto de preferencia
    $preference = new MercadoPago\Preference();

    // Crea un ítem en la preferencia
    $item = new MercadoPago\Item();
    $item->title = 'Mi producto';
    $item->quantity = 1;
    $item->unit_price = 75.56;
    $preference->items = array($item);
    $preference->save();
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
                    <li>
                        <a id="ingresar" class="modal-login showModal waves-effect waves-light" href="">Ingresar</a>
                    </li>
                    <li>
                        <a class="waves-effect waves-light" href="#?">Publicar</a>
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
                            <span><?php echo $usuario ?></span>
                        </li>
                        <li>
                            <a href="#?">Panel</a>
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
        <section id="pagos">
            <div class="contenedor-general">
                <h2>¡Estas a un paso de Publicar tu Anuncio!</h2>
                <div class="contenedor-especifico">
                    <div class="contenedor-detalles">
                        <h4>Titulo</h4>
                        <img src="dist/img/paf1.jpg" alt="">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque dicta qui ullam veniam. Quo, quae eligendi debitis ut provident, maiores, corporis officiis harum dolor dolores eveniet nemo quidem cumque saepe?</p>

                    </div>
                    <div class="contenedor-pago">
                        <select name="tiempo" id="tiempo">
                            <option value="">Tiempo de Publicación</option>
                            <option value="">1 Mes</option>
                            <option value="">2 Meses</option>
                            <option value="">3 Meses</option>
                        </select>
                        <form action="/procesar-pago" method="POST">
                            <script src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js" data-preference-id="<?php echo $preference->id; ?>">
                            </script>
                        </form>
                    </div>
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
    <script type="text/javascript" src="src/js/panel-publicacion.js"></script>
    <script type="text/javascript" src="src/js/hamburger.js"></script>
    <script type="text/javascript" src="src/js/btn-mercado.js"></script>

</body>

</html>