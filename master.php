<?php
session_start();
include ('conexion.php');
    if(isset($_SESSION['Nombre'])){


      $usuario=$_SESSION['Nombre'];
?>

--<!doctype html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dueño Directo</title>
    <!-- Cake + Cake icon -->
    <link rel="icon" href="img/backgrounds/cake+cake-icon.png" type="image/x-icon">
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
      
      $consulta= mysqli_query($conexion, "SELECT * FROM masteradmin");
      
      
      
      
      ?>


<!-- Navigation -->
  <header class="header">
  <!-- Navbar -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
    <div class="container">

      <!-- Brand -->
      <a class="navbar-brand waves-effect" href="https://mdbootstrap.com/docs/jquery/" target="_blank">
        <img src="dist/img/DD-LOGO.png" alt="Logo">
      </a>

      <!-- Collapse -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Links -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <!-- Left -->
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link waves-effect" href="" target="_blank">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link waves-effect" href="" target="_blank">Propiedades</a>
          </li>
          
        </ul>

        <!-- Right -->
        <ul class="navbar-nav nav-flex-icons">
         
          <li class="nav-item">
            <a href="https://mdbootstrap.com/docs/jquery/newsletter/"
              class="nav-link border border-light rounded waves-effect mr-2" target="_blank">
              <i class="fas fa-envelope mr-1"></i>Cerrar Sesión
            </a>
          </li>
        </ul>

      </div>

    </div>
  </nav>
  <!-- Navbar -->

  <!-- Intro -->
  <div class="card card-intro blue-gradient">

    <div class="card-body white-text rgba-black-light text-center">

      <!--Grid row-->
      <div class="row d-flex justify-content-center">

        <!--Grid column-->
        <div class="col-md-6">

          <h1 class="h5 mb-2">
            Bienvenido <?php echo $usuario; ?>
          </h1>

          <ul class="nav nav-tabs" id="myTab" role="tablist">
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
<div class="tab-content" id="myTabContent"> 
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
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

                      <!-- Nombre -->
                      <div class="md-form ">
                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre">
                   
                      </div>

                      <!-- E-mail -->
                      <div class="md-form mt-0">
                          <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                          
                      </div>

                      <!-- Password -->
                      <div class="md-form">
                          <input type="password" name="clave" id="clave" class="form-control" aria-describedby="clave" placeholder="Contraseña">
                          
                          <small id="clave" class="form-text text-muted mb-4">
                              Al menos 8 caracteres
                          </small>
                      </div>

                      <!-- Phone number -->
                      <div class="md-form">
                          <input type="password" name="telefono" id="telefono" class="form-control" aria-describedby="materialRegisterFormPhoneHelpBlock" placeholder="Telefono">
                          
                          <small id="telefono" class="form-text text-muted mb-4">
                              Opcional 
                          </small>
                      </div>

                      

                      <!-- Sign up button -->
                      <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" name="Enviar" type="submit">Agregar</button>

                      <hr>

                      
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

                        <!-- Nombre -->
                        <div class="form-group seladmin">
                          <label for="exampleFormControlSelect1">Administrador</label>
                          <select class="form-control" name="delad" id="exampleFormControlSelect1">
                            
                            <?php
                            while($resultado=mysqli_fetch_array($consulta)){
                              echo '<option value="'.$resultado['Nombre'].'">'.$resultado[Nombre].'</option>';

                              
                            
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

                        <!-- Sign up button -->
                        <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" name="Enviar" type="submit">Borrar</button>

                        <hr>

                        
                    </form>
                    <!-- Form -->

                </div>

              </div>

      </div>

      
      <div class="lista">
        <h3>Lista de Administradores</h3>
        <table class="table table-striped">
          <thead class="tituloLista">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">First</th>
              <th scope="col">Last</th>
              <th scope="col">Handle</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Jacob</td>
              <td>Thornton</td>
              <td>@fat</td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>Larry</td>
              <td>the Bird</td>
              <td>@twitter</td>
            </tr>
          </tbody>
        </table>
      </div>

    </div>
  </div>
 
    
      <div class="tab-pane fade" id="clientes" role="tabpanel" aria-labelledby="clientes-tab">
        <div class="clientes">
          <div class="lista-registros">

            <table class="table table-striped">
              <thead class="thead">
                  <tr>
                      <th scope="col">Nombre</th>
                      <th scope="col">DNI</th>
                      <th scope="col">Telefono</th>
                      <th scope="col">E-mail</th>
                      <th scope="col">Plan Contratado</th>
                      <th scope="col">Vencimiento</th>
                      <th scope="col">Deuda</th>
                    </tr>
              </thead>
              <tbody>
                  <tr>
                      <th scope="row">1</th>
                      <td>Mark</td>
                      <td>Otto</td>
                      <td>Otto</td>
                      <td>Otto</td>
                      <td>Otto</td>
                      <td>Otto</td>
                    </tr>
                    <tr>
                      <th scope="row">2</th>
                      <td>Jacob</td>
                      <td>Thornton</td>
                      <td>Otto</td>
                      <td>Otto</td>
                      <td>Otto</td>
                      <td>Otto</td>
                    </tr>
                    <tr>
                      <th scope="row">3</th>
                      <td>Larry</td>
                      <td>the Bird</td>
                      <td>Otto</td>
                      <td>Otto</td>
                      <td>Otto</td>
                      <td>Otto</td>
                    </tr>
              </tbody>
            </table>
            
          <div class="lista-vencimiento">
            <table class="table table-striped table-dark">
              <thead class="thead">
                  <tr>
                      <th scope="col">Nombre</th>
                      <th scope="col">DNI</th>
                      <th scope="col">Telefono</th>
                      <th scope="col">E-mail</th>
                      <th scope="col">Plan Contratado</th>
                      <th scope="col">Vencimiento</th>
                      <th scope="col">Deuda</th>
                    </tr> <tr>
              </thead>
              <tbody class="tbody">
                  <tr>
                      <th scope="row">1</th>
                      <td>Mark</td>
                      <td>Otto</td>
                      <td>Otto</td>
                      <td>Otto</td>
                      <td>Otto</td>
                      <td>Otto</td>
                    </tr>
                    <tr>
                      <th scope="row">2</th>
                      <td>Jacob</td>
                      <td>Thornton</td>
                      <td>Otto</td>
                      <td>Otto</td>
                      <td>Otto</td>
                      <td>Otto</td>
                    </tr>
                    <tr>
                      <th scope="row">3</th>
                      <td>Larry</td>
                      <td>the Bird</td>
                      <td>Otto</td>
                      <td>Otto</td>
                      <td>Otto</td>
                      <td>Otto</td>
                    </tr>
              </tbody>
            </table>
            <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0"
            type="submit">Enviar Promo</button>
          </div>
          </div>
        </div>
      </div>
      
      <div class="tab-pane fade" id="categorias" role="tabpanel" aria-labelledby="categorias-tab">
      <div class="categoria">
        <div class="cargar-categoria">
          <div class="card">
            <h5 class="card-header info-color white-text text-center py-4">
              <strong>Cargar Categoria</strong>
            </h5>

            <!--Card -->
            <div class="card-body px-lg-5 pt-0">

              <!-- Form -->
              <form class="text-center" style="color: #757575;" action="#!">

                <div class="md-form mt-0">
                  <input type="text" id="categoria" class="form-control">
                  <label for="nombre">Categoria</label>
                </div>

                <div class="md-form mt-0">
                  <input type="text" id="descripcion" class="form-control">
                  <label for="email">Descripcion</label>
                </div>

                <div class="md-form">
                  <input type="password" id="contraseña" class="form-control"
                    aria-describedby="materialRegisterFormPhoneHelpBlock">
                  <label for="clave">Contraseña</label>
                </div>



                <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0"
                  type="submit">Guardar</button>

                <hr>


              </form>
              <!-- Form -->


            </div>

          </div>
        </div>

        <div class="borrar-categoria">
          <div class="card">

            <h5 class="card-header info-color white-text text-center py-4">
              <strong>Eliminar Categoria</strong>
            </h5>

            <div class="card-body px-lg-5 pt-0">

              <form class="text-center" style="color: #757575;" action="#!">

                <div class="form-group">
                  <label for="exampleFormControlSelect1">Administrador</label>
                  <select class="form-control" id="exampleFormControlSelect1">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                  </select>
                </div>

                <div class="md-form">
                  <input type="password" id="contraseña" class="form-control"
                    aria-describedby="materialRegisterFormPhoneHelpBlock">
                  <label for="clave">Contraseña</label>
                  <small id="clave" class="form-text text-muted mb-4">
                    Ingrese su contraseña para que se apruebe la acción.
                  </small>
                </div>

                <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0"
                  type="submit">Borrar</button>

                <hr>


              </form>

            </div>

          </div>
        </div>

        <div class="lista-categoria">

          <table class="table">
            <thead class="thead">
              <tr>
                <th scope="col">Admin</th>
                <th scope="col">Categoria</th>
                <th scope="col">Descripcion</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
              </tr>
            </tbody>
          </table>

        </div>
      </div>
    </div>
      <div class="tab-pane fade" id="promociones" role="tabpanel" aria-labelledby="promociones-tab">
        <div class="promociones">
          <div class="crear-promocion">
            <div class="card">
  
              <h5 class="card-header info-color white-text text-center py-4">
                <strong>Crear Promocion</strong>
              </h5>
  
              <div class="card-body px-lg-5 pt-0">

                <div class="md-form">
                  <input type="text" id="nombre" class="form-control"
                    aria-describedby="materialRegisterFormPhoneHelpBlock">
                  <label for="nombre">Nombre</label>
                </div>
                <div class="md-form">
                  <input type="text" id="vencimiento" class="form-control"
                    aria-describedby="materialRegisterFormPhoneHelpBlock">
                  <label for="vencimiento">Vencimiento</label>
                </div>
                <div class="md-form">
                  <input type="password" id="contraseña" class="form-control"
                    aria-describedby="materialRegisterFormPhoneHelpBlock">
                  <label for="clave">Contraseña</label>
                </div>
  
                <form class="text-center" style="color: #757575;" action="#!">
  
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Categoria</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                    </select>
                  </div>
  
                  
  
                  <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0"
                    type="submit">Guardar</button>
  
                  <hr>
  
  
                </form>
  
              </div>
  
            </div>
          </div>
  
          <div class="borrar-promocion">
            <div class="card">

              <h5 class="card-header info-color white-text text-center py-4">
                <strong>Eliminar Promocion</strong>
              </h5>
  
              <div class="card-body px-lg-5 pt-0">
  
                <form class="text-center" style="color: #757575;" action="#!">
  
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Administrador</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                    </select>
                  </div>
  
                  <div class="md-form">
                    <input type="password" id="contraseña" class="form-control"
                      aria-describedby="materialRegisterFormPhoneHelpBlock">
                    <label for="clave">Contraseña</label>
                    <small id="clave" class="form-text text-muted mb-4">
                      Ingrese su contraseña para que se apruebe la acción.
                    </small>
                  </div>
  
                  <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0"
                    type="submit">Borrar</button>
  
                  <hr>
  
  
                </form>
  
              </div>
  
            </div>
          </div>
  
          <div class="lista-promociones">
  
            <table class="table">
              <thead class="thead">
                <tr>
                  <th scope="col">Promocion</th>
                  <th scope="col">Detalle</th>
                  <th scope="col">Categoria</th>
                  <th scope="col">Admin</th>
                  <th scope="col">Vencimiento</th>
                  <th scope="col">$$</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>Otto</td>
                  <td>Otto</td>
                  <td>Otto</td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Jacob</td>
                  <td>Thornton</td>
                  <td>Otto</td>
                  <td>Otto</td>
                  <td>Otto</td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>Larry</td>
                  <td>the Bird</td>
                  <td>Otto</td>
                  <td>Otto</td>
                  <td>Otto</td>
                </tr>
              </tbody>
            </table>
  
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="estadisticas" role="tabpanel" aria-labelledby="estadisticas-tab">Bon dia</div>
    
  
</div>



   <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>

<?php
    }  else {
        header ("Location: lgn.php");
    }
?>