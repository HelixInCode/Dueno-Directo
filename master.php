<?php
session_start();
include('conexion.php');
if (isset($_SESSION['Nombre'])) {

  $usuario = $_SESSION['Nombre'];
  $master = $_SESSION['idMaster'];
?>

  <!doctype html>
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
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="dist/css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="dist/css/mdb.min.css">
    <!-- Estilos-->
    <link rel="stylesheet" href="src/css/master.css">
  </head>

  <body>
    <?php

    $admin = mysqli_query($conexion, "SELECT * FROM masteradmin WHERE idMaster='$master'");
    $arrayAd = mysqli_fetch_array($admin);

    $consulta = mysqli_query($conexion, "SELECT * FROM masteradmin");
    $categoryview = mysqli_query($conexion, "SELECT * FROM categoria");
    $promoview = mysqli_query($conexion, "SELECT * FROM promociones");

    ?>

    <!-- Navigation -->
    <header class="header">

      <nav class="py-2 px-4">
        <div class="ml-md-4 img-container">
          <img class="img-fluid" src="dist/img/DD-LOGO.png" alt="">
        </div>

        <ul class="menu-items hide py-1 py-md-0">
          <li>
            <a class="waves-effect waves-light" href="index.php">Inicio</a>
          </li>
          <li>
            <a class="waves-effect waves-light" href="./active-pub.html">Publicaciones</a>
          </li>
          <li>
            <a class="waves-effect waves-light" href="./servicios.html">Propiedades</a>
          </li>
          <li>
            <i class="fas fa-sign-out-alt mr-1"></i>
            <a class="waves-effect waves-light" href="process/close.php">Cerrar Sesión</a>
          </li>
          <li class="modal-perfil showModal">
            <i class="fas fa-user-alt mr-1"></i>
            <a class="waves-effect waves-light" href="#?">Perfil</a>
          </li>
        </ul>

        <div class="menu-overlay hide d-block d-md-none"></div>

        <div id="hamburger" class="hamburger-btn d-flex d-md-none">
          <i id="ham-icon" class="fas fa-bars fa-1-3x"></i>
        </div>
      </nav>

      <!-- Intro -->
      <div class="card card-intro blue-gradient">

        <div class="card-body white-text rgba-black-light text-center">

          <!--Grid row-->
          <div class="row d-flex justify-content-center">

            <!--Grid column-->
            <div class="col-md-12">

              <h1 class="h5 mb-2">
                Bienvenido <?php echo $usuario; ?>
              </h1>

              <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Aministradores</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" id="cliente-tab" data-toggle="tab" href="#clientes" role="tab" aria-controls="clientes" aria-selected="false">Clientes</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" id="categorias-tab" data-toggle="tab" href="#categorias" role="tab" aria-controls="categorias" aria-selected="false">Categorias</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" id="promociones-tab" data-toggle="tab" href="#promociones" role="tab" aria-controls="promociones" aria-selected="false">Promociones</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" id="estadisticas-tab" data-toggle="tab" href="#estadisticas" role="tab" aria-controls="estadisticas" aria-selected="false">Estadísticas</a>
                </li>

              </ul>


            </div>
            <!--Grid column-->

          </div>
          <!--Grid row-->

        </div>

      </div>
      <!-- Intro -->

    </header>
    <!-- Navigation -->
    <main class="tab-content" id="myTabContent">

      <section id="modal-perfil" class="modal hide">
        <div class="login card">

          <div class="title-container card-header info-color white-text p-3">
            <h5>Perfil</h5>
            <i class="closeModal fa fa-times"></i>
          </div>

          <form method="POST" style="color: #757575;" class="main-container card-body px-lg-5 pt-0" action="process/updateMAster.php">
            <div class="input-container">
              <!-- Nombre -->
              <input type="hidden" value="<?php echo $arrayAd['idMaster']; ?>" name="idAd">
              <div class="md-form m-0">
                <input type="text" name="nombre" id="nombre" value="<?php echo $usuario; ?>" class="form-control" placeholder="Nombre">
              </div>
              <div class="md-form m-0">
                <input type="text" name="email" id="nombre" class="form-control" value="<?php echo $arrayAd['email']; ?>" placeholder="Email">
              </div>
              <!-- <div class="md-form m-0">
                    <input type="password" name="clave" id="clave" class="form-control" aria-describedby="clave" value="<?php echo $arrayAd['clave']; ?>" placeholder="Contraseña">
  
                    <a><small id="clave" class="form-text text-muted m-0">
                      Cambiar contraseña
                    </small></a>
                  </div> -->
            </div>
            <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" name="Modificar" type="submit">Modificar</button>
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

      <div class="tab-pane d-block active px-2 px-sm-3" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div class="administradores">
          <div class="agregarAdmin">
            <!-- Agregar Administrador -->
            <div class="card">

              <h5 class="card-header info-color white-text text-center py-4">
                <strong>Nuevo Administrador</strong>
              </h5>

              <!--Card -->
              <div class="card-body px-lg-5 pt-0">

                <!-- Form -->
                <form class="text-center" style="color: #757575;" action="process/saveAdmin.php" method="POST">

                  <div class="input-container">
                    <!-- Nombre -->
                    <div class="md-form m-0">
                      <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre">
                    </div>

                    <!-- E-mail -->
                    <div class="md-form m-0">
                      <input type="email" name="email" id="email" class="form-control" placeholder="Email">

                    </div>

                    <!-- Password -->
                    <div class="md-form m-0">
                      <input type="password" name="clave" id="clave" class="form-control" aria-describedby="clave" placeholder="Contraseña">

                      <small id="clave" class="form-text text-muted m-0">
                        Al menos 8 caracteres
                      </small>
                    </div>

                    <!-- Phone number -->
                    <div class="md-form m-0">
                      <input type="password" name="claveadmin" id="claveadmin" class="form-control" aria-describedby="materialRegisterFormPhoneHelpBlock" placeholder="ingrese su contraseña personal">

                      <small id="claveadmin" class="form-text text-muted m-0">
                        Obligatorio
                      </small>
                      <input type="hidden" name="master" value="<?php echo $master ?>" class="form-control" aria-describedby="materialRegisterFormPhoneHelpBlock">
                    </div>
                  </div>

                  <!-- Sign up button -->
                  <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" name="Enviar" type="submit">Agregar</button>

                </form>
                <!-- Form -->

              </div>

            </div>

          </div>
          <!-- Agregar Administradores -->

          <!--Borrar Administradores-->
          <div class="borrarAdmin">

            <div class="card">

              <h5 class="card-header info-color white-text text-center py-4">
                <strong>Eliminar Administrador</strong>
              </h5>

              <!--Card -->
              <div class="card-body px-lg-5 pt-0">

                <!-- Form -->
                <form class="text-center" style="color: #757575;" action="process/delad.php" method="POST">

                  <div class="input-container">
                    <!-- Nombre -->
                    <div class="form-group seladmin">
                      <label for="exampleFormControlSelect1">Administrador</label>
                      <select class="form-control" name="delad" id="exampleFormControlSelect1">

                        <?php
                        while ($resultado = mysqli_fetch_array($consulta)) {
                          echo '<option value="' . $resultado['idMaster'] . '">' . $resultado[Nombre] . '</option>';
                        }
                        ?>

                      </select>
                    </div>

                    <!-- Password -->
                    <div class="md-form">
                      <input type="password" name="clave" id="clave" class="form-control" aria-describedby="clave" placeholder="Contraseña">

                      <small id="clave" class="form-text text-muted mb-4">
                        Ingrese su contraseña para que se apruebe la acción.
                      </small>
                    </div>

                    <input type="hidden" name="master" value="<?php echo $master ?>" class="form-control" aria-describedby="materialRegisterFormPhoneHelpBlock">
                  </div>

                  <!-- Sign up button -->
                  <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" name="Enviar" type="submit">Borrar</button>

                </form>
                <!-- Form -->

              </div>

            </div>

          </div>

          <!--Lista Administradores-->
          <div class="lista col-md-12">
            <h3>Lista de Administradores</h3>

            <div class="table-container">
              <table class="table table-striped">
                <thead class="tituloLista">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>

                  </tr>
                </thead>
                <tbody>
                  <?php
                  $consulta = mysqli_query($conexion, "SELECT * FROM masteradmin");
                  while ($datos = mysqli_fetch_array($consulta)) {
                  ?>
                    <tr>
                      <th scope="row"><?php echo $datos['idMaster'] ?></th>
                      <td><?php echo $datos['Nombre'] ?></td>
                      <td><?php echo $datos['email'] ?></td>

                    </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>

        </div>
      </div>

      <div class="tab-pane d-none px-2 px-sm-3" id="clientes" role="tabpanel" aria-labelledby="clientes-tab">
        <div class="clientes">

          <div class="table-container">
            <table class="table table-striped">
              <thead class="thead">
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">DNI</th>
                  <th scope="col">Telefono</th>
                  <th scope="col">E-mail</th>
                  <th scope="col">Publicaciones</th>
                </tr>
              </thead>
              <tbody>
                <?php $rgslist = mysqli_query($conexion, "SELECT * FROM user");
                while ($listarray = mysqli_fetch_array($rgslist)) {
                ?>
                  <tr>
                    <th scope="row"><?php echo $listarray['id'] ?></th>
                    <td><?php echo $listarray['nombre'] ?></td>
                    <td><?php echo $listarray['dni'] ?></td>
                    <td><?php echo $listarray['telefono'] ?></td>
                    <td><?php echo $listarray['email'] ?></td>
                    <td><a>>></a></td>
                  </tr>
                <?php }
                ?>
              </tbody>
            </table>
          </div>

          <div class="table-container">
            <table class="table table-striped table-dark">
              <thead class="thead">
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">DNI</th>
                  <th scope="col">Telefono</th>
                  <th scope="col">E-mail</th>
                  <th scope="col">Vencimiento</th>
                  <th scope="col">Deuda</th>
                </tr>
                <tr>
              </thead>
              <tbody class="tbody">
                <?php $rgslist = mysqli_query($conexion, "SELECT * FROM user");
                while ($listarray = mysqli_fetch_array($rgslist)) {
                ?>
                  <tr>
                    <th scope="row"><?php echo $listarray['id'] ?></th>
                    <td><?php echo $listarray['nombre'] ?></td>
                    <td><?php echo $listarray['dni'] ?></td>
                    <td><?php echo $listarray['telefono'] ?></td>
                    <td><?php echo $listarray['email'] ?></td>
                    <td>Otto</td>
                    <td>Otto</td>
                  </tr>
                <?php }
                ?>
              </tbody>
            </table>
          </div>

          <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Enviar Promo</button>

        </div>
      </div>

      <div class="tab-pane d-none px-2 px-sm-3" id="categorias" role="tabpanel" aria-labelledby="categorias-tab">
        <div class="categoria">

          <!-- Cargar Categoria -->
          <div class="cargar-categoria">
            <div class="card">
              <h5 class="card-header info-color white-text text-center py-4">
                <strong>Cargar Categoria</strong>
              </h5>

              <!--Card -->
              <div class="card-body px-lg-5 pt-0">

                <!-- Form -->
                <form class="text-center" style="color: #757575;" action="process/savecategori.php" method="POST">

                  <div class="input-container">

                    <div class="md-form m-0">
                      <input type="text" name="categoria" id="categoria" class="form-control" placeholder="Categoria">
                    </div>


                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Pertenece a:</label>
                      <select class="form-control" name="seccion" id="exampleFormControlSelect1">
                        <option value="profesional">Profesional</option>
                        <option value="propiedad">Propiedad</option>
                        <option value="servicios">Servicios</option>
                      </select>
                    </div>

                    <div class="md-form m-0">
                      <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Descripcion">
                    </div>

                    <div class="md-form m-0">
                      <input type="password" id="contraseña" class="form-control" placeholder="Contraseña" aria-describedby="materialRegisterFormPhoneHelpBlock">
                    </div>

                  </div>

                  <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" name="Enviar">Guardar</button>

                </form>
                <!-- Form -->

              </div>
            </div>
          </div>
          <!-- Fin Cargar Categoria -->

          <!-- Borrar Categoria -->
          <div class="borrar-categoria">
            <div class="card">

              <h5 class="card-header info-color white-text text-center py-4">
                <strong>Eliminar Categoria</strong>
              </h5>

              <div class="card-body px-lg-5 pt-0">

                <form class="text-center" style="color: #757575;" action="process/delcategoria.php" method="POST">

                  <div class="input-container">
                    <div class="form-group">
                      <label for="exampleFormControlSelect1"></label>
                      <select class="form-control" name="borrar" id="exampleFormControlSelect1">
                        <?php
                        while ($category = mysqli_fetch_array($categoryview)) {
                          echo '<option value="' . $category['id_categoria'] . '">' . $category[categoria] . '</option>';
                        }
                        ?>
                      </select>
                    </div>

                    <div class="md-form m-0">
                      <input type="password" name="contra" id="clave" class="form-control" aria-describedby="materialRegisterFormPhoneHelpBlock">
                      <label for="clave">Contraseña</label>
                      <small id="clave" class="form-text text-muted m-0">
                        Ingrese su contraseña para que se apruebe la acción.
                      </small>
                      <input type="hidden" name="master" value="<?php echo $master ?>" class="form-control" aria-describedby="materialRegisterFormPhoneHelpBlock">
                    </div>
                  </div>

                  <button name="Enviar" class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Borrar</button>

                </form>

              </div>

            </div>
          </div>
          <!-- Fin Borrar Categoria -->

          <!-- Lista Categoria -->
          <div class="lista-categoria table-container">

            <table class="table">
              <thead class="thead">
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Seccion</th>
                  <th scope="col">Categoria</th>
                  <th scope="col">Descripcion</th>
                  <th scope="col">Editar</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $consulta = mysqli_query($conexion, "SELECT * FROM categoria");
                while ($categorydates = mysqli_fetch_array($consulta)) {
                ?>
                  <tr>
                    <form action="process/editarcategoria.php" method="POST">
                      <th scope="row"><input type="hidden" name="id_cat" value="<?php echo $categorydates['id_categoria'] ?>"><?php echo $categorydates['id_categoria'] ?></th>
                      <td><select class="form-control" name="seccion" id="exampleFormControlSelect1">
                          <option value="<?php echo $categorydates['seccion'] ?>"><?php echo $categorydates['seccion'] ?></option>
                          <option value="profesional">Profesional</option>
                          <option value="propiedad">Propiedad</option>
                          <option value="servicios">Servicios</option>
                        </select></td>
                      <td><input type="text" name="categoria" value="<?php echo $categorydates['categoria'] ?>"></td>
                      <td><input type="text" name="descripcion" value="<?php echo $categorydates['descripcion'] ?>"></td>
                      <td><a href=""> <button name="editar" value="editar" class="btn btn-info"><i class="fas fa-edit text-white"></i></button></a></td>
                    </form>
                  </tr>
                <?php
                }
                ?>
              </tbody>
            </table>

          </div>
        </div>
      </div>

      <div class="tab-pane d-none px-2 px-sm-3" id="promociones" role="tabpanel" aria-labelledby="promociones-tab">
        <div class="promociones">

          <!-- Crear Promocion-->
          <div class="crear-promocion">
            <div class="card">

              <h5 class="card-header info-color white-text text-center py-4">
                <strong>Crear Promocion</strong>
              </h5>

              <div class="card-body px-lg-5 pt-0">

                <!-- Form -->
                <form class="text-center" style="color: #757575;" action="process/savepromo.php" method="POST">

                  <div class="input-container">
                    <!-- Nombre -->
                    <div class="md-form m-0">
                      <input type="text" name="promociones" id="promociones" class="form-control" placeholder="Nombre">
                    </div>

                    <!-- Vencimiento -->
                    <div class="md-form m-0">
                      <input type="text" name="vencimiento" id="vencimiento" class="form-control" placeholder="Vencimiento">
                    </div>

                    <!-- Admin -->
                    <div class="md-form m-0">
                      <input type="text" name="adminpromo" id="admin" class="form-control" placeholder="Usuario">
                    </div>

                    <!-- Detalle -->
                    <div class="md-form m-0">
                      <input type="text" name="detalle" id="detalle" class="form-control" placeholder="Detalles">
                    </div>

                    <!-- Precio -->
                    <div class="md-form m-0">
                      <input type="text" name="precio" id="precio" class="form-control" placeholder="Precio">
                    </div>

                    <!-- Password -->
                    <div class="md-form m-0">
                      <input type="password" name="clave" id="clave" class="form-control" aria-describedby="clave" placeholder="Contraseña">
                    </div>

                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Categorias</label>
                      <select class="form-control" name="categoria" id="exampleFormControlSelect1">
                        <option value="profesional">Profesional</option>
                        <option value="propietario">Propietario</option>
                        <option value="servicios">Servicios</option>

                      </select>
                    </div>

                    <input type="hidden" name="master" value="<?php echo $master ?>" class="form-control" aria-describedby="materialRegisterFormPhoneHelpBlock">
                  </div>

                  <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" name="Enviar">Guardar</button>

                </form>

              </div>

            </div>
          </div>

          <!-- Borrar Promocion-->
          <div class="borrar-promocion">
            <div class="card">

              <h5 class="card-header info-color white-text text-center py-4">
                <strong>Eliminar Promocion</strong>
              </h5>

              <div class="card-body px-lg-5 pt-0">

                <form class="text-center" style="color: #757575;" action="process/delpromo.php" method="POST">

                  <div class="input-container">
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Administrador</label>
                      <select class="form-control" name="borrarpromo" id="exampleFormControlSelect1">
                        <?php
                        while ($promocion = mysqli_fetch_array($promoview)) {
                          echo '<option value="' . $promocion['idpromo'] . '">' . $promocion[idpromo] . '</option>';
                        }
                        ?>
                      </select>
                    </div>

                    <div class="md-form">
                      <input type="password" name="clavepromo" id="clave" class="form-control" placeholder="Contraseña" aria-describedby="materialRegisterFormPhoneHelpBlock">
                      <small id="clave" class="form-text text-muted mb-4">
                        Ingrese su contraseña para que se apruebe la acción.
                      </small>
                      <input type="hidden" name="master" value="<?php echo $master ?>" class="form-control" aria-describedby="materialRegisterFormPhoneHelpBlock">
                    </div>
                  </div>

                  <button name="Enviar" class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Borrar</button>

                </form>

              </div>
            </div>
          </div>

          <!-- Listar Promocion-->
          <div class="lista-promociones table-container">

            <table class="table">
              <thead class="thead">
                <tr>
                  <th scope="col">Admin</th>
                  <th scope="col">Categoria</th>
                  <th scope="col">Detalle</th>
                  <th scope="col">Promocion</th>
                  <th scope="col">Vencimiento</th>
                  <th scope="col">$$</th>
                  <th scope="col">Editar</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $consulta = mysqli_query($conexion, "SELECT * FROM promociones");
                while ($promodates = mysqli_fetch_array($consulta)) {
                ?>
                  <tr>
                    <form action="process/editarpromocion.php" method="POST">
                      <th scope="row"><input type="hidden" name="id_promo" value="<?php echo $promodates['idpromo'] ?>"><?php echo $promodates['idpromo'] ?></th>
                      <td><select class="form-control" name="categoria" id="exampleFormControlSelect1">
                          <option value="<?php echo $promodates['categoria'] ?>"><?php echo $promodates['categoria'] ?></option>
                          <option value="profesional">profesional</option>
                          <option value="propietario">propietario</option>
                          <option value="servicios">servicios</option>
                        </select></td>
                      <td><input type="text" name="detalle" value="<?php echo $promodates['detalle'] ?>"></td>
                      <td><input type="text" name="promociones" value="<?php echo $promodates['promociones'] ?>"></td>
                      <td><input type="text" name="vencimiento" value="<?php echo $promodates['vencimiento'] ?>"></td>
                      <td><input type="text" name="precio" value="<?php echo $promodates['precio'] ?>"></td>
                      <td><a href=""> <button name="editar" value="editar" class="btn btn-info"><i class="fas fa-edit text-white"></i></button></a></td>
                    </form>
                  </tr>
                <?php
                }
                ?>
              </tbody>
            </table>

          </div>

        </div>
      </div>

      <div class="tab-pane d-none px-2 px-sm-3" id="estadisticas" role="tabpanel" aria-labelledby="estadisticas-tab">Bon di
      </div>

    </main>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script type="text/javascript" src="src/js/hideShowModals.js"></script>
    <script type="text/javascript" src="src/js/hamburger.js"></script>
    <script type="text/javascript" src="src/js/panelMaster.js"></script>

  </body>

  </html>

<?php
} else {
  header("Location: lgn.php");
}
?>