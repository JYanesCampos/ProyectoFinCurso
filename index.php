<?php


//BORRAR
/*
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
*/

include_once ('./php/config.php');
include_once('./php/funciones.php');

$conexion = mysqli_connect(Config::BD_HOST,Config::BD_USER,Config::PASSWORD,Config::BD_NAME,Config::BD_PORT);
mysqli_set_charset($conexion, "utf8");

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casas de vacaciones</title>
    <meta name="description" content="Pagina web para la reserva de casas vacacionales.">
    <meta name="author" content="Joaquin Yanes Campos">

    <link rel="stylesheet" href="css\bootstrap.min.css">
    <link rel="stylesheet" href="css\css.css">

    <script src="js/jquery-3.6.3.js"></script>
    

</head>
<body>


    <!-- BARRA DE NAVEGACION -->
    <div class="container mt-5" id="containerNavs">
        <div class="row" id="navBarNoLogueado">
            <nav class="navbar navbar-expand-md navbar-light bg-light">
                <div class="container-fluid">
                  <button class="navbar-brand btn" id="navHome">Home</button>
                  <button class="navbar-toggler" 
                          type="button" data-bs-toggle="collapse" 
                          data-bs-target="#navbarSupportedContent" 
                          aria-controls="navbarSupportedContent" 
                          aria-expanded="false" 
                          aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                      <li class="nav-item">
                        <button class="btn" id="navSocial">Social</button>
                      </li>
                      <li class="nav-item">
                        <button class="btn" id="navGaleria">Galería</button>
                      </li>
                      <li class="nav-item">
                        <button class="btn" id="navReserva">Reserva</button>
                      </li>
                      <li class="nav-item">
                        <button class="displayNone btn" id="navAdmin">Administración</button>
                      </li>
                    </ul>
                    <form class="d-flex">
                      <button class="btn" type="button" id="navIniciarSesion">Iniciar Sesion</button>
                      <button class="displayNone btn" id="navCerrarSesion">Cerrar Sesion</button>
                    </form>
                  </div>
                </div>
              </nav>
        </div>
    </div>

    <!-- INICIAR SESION -->
    <div class="container displayNone view" id="containerIniciarSesion">
        <div class="row">
            <div class="col-10 p-2 col-md-6 offset-md-3 offset-1">
                <p class="h3 text-center">Iniciar Sesion</p>
                <form name="frmInicioSesion" id="frmInicioSesion">
                  <div class="form-group row p-2">
                    <label class="col-4 col-form-label d-flex justify-content-end align-items-end pe-3" for="emailIniciarSesion">Email</label> 
                    <div class="col-8">
                      <input id="emailIniciarSesion" name="emailIniciarSesion" type="text" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row p-2">
                    <label class="col-4 col-form-label d-flex justify-content-end align-items-end pe-3" for="passwordIniciarSesion">Contraseña</label>
                    <div class="col-8">
                      <input id="passwordIniciarSesion" name="passwordIniciarSesion" type="password" class="form-control">
                    </div>
                  </div>

                  <div class="form-group row p-2">
                    <div class="col-8 offset-4">
                      <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="mostrarContraseñaInicio" id="mostrarContraseñaInicio" type="checkbox" class="custom-control-input" value="mostrarContraseña"> 
                        <label for="mostrarContraseñaInicio" class="custom-control-label">Mostrar Contraseña</label>
                      </div>
                    </div>
                  </div> 

                  <div class="form-group row p-2">
                    <div class="col-8 offset-4">
                      <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="checkboxMantenerSesion" id="checkboxMantenerSesion" type="checkbox" class="custom-control-input" value="mantenerSesion"> 
                        <label for="checkboxMantenerSesion" class="custom-control-label">Mantener Sesión</label>
                      </div>
                    </div>
                  </div> 

                  <div class="form-group row p-2">
                    <div class="offset-4 col-8">
                      <button name="submit" type="button" class="btn btn-primary" id="btnIniciarSesion">Iniciar Sesion</button>
                    </div>
                  </div>
                </form>
                <hr>
                <form>
                  <div class="container text-center">
                    <div class="col-12 text-center">
                      <button type="button" class="btn btn-primary btn-lg" id="btnFormRegistrarUsuario">Regístrate</button>
                    </div>
                  </div>
                </form>
            </div>
        </div>
    </div>

    <!-- REGISTRAR USUARIO -->
    <div class="container displayNone view" id="containerRegistrarUsuario">
      <div class="row">
        <div class="col-10 p-2 col-md-6 offset-md-3 offset-1">
          <p class="h3 text-center">Registrate</p>
          <form name="frmRegistroUsuario" id="frmRegistroUsuario">
            <div class="form-group row p-2">
              <label class="col-4 col-form-label d-flex justify-content-end align-items-end pe-3" for="nombreRegistroUsuario">Nombre</label> 
              <div class="col-8">
                <input id="nombreRegistroUsuario" name="nombreRegistroUsuario" type="text" class="form-control">
              </div>
            </div>
            <div class="form-group row p-2">
              <label class="col-4 col-form-label d-flex justify-content-end align-items-end pe-3" for="apellidosRegistroUsuario">Apellidos</label> 
              <div class="col-8">
                <input id="apellidosRegistroUsuario" name="apellidosRegistroUsuario" type="text" class="form-control">
              </div>
            </div>
            <div class="form-group row p-2">
              <label class="col-4 col-form-label d-flex justify-content-end align-items-end pe-3" for="telefonoRegistroUsuario">Telefono</label> 
              <div class="col-8">
                <input id="telefonoRegistroUsuario" name="telefonoRegistroUsuario" type="text" class="form-control">
              </div>
            </div><div class="form-group row p-2">
              <label class="col-4 col-form-label d-flex justify-content-end align-items-end pe-3" for="emailRegistroUsuario">Email</label> 
              <div class="col-8">
                <input id="emailRegistroUsuario" name="emailRegistroUsuario" type="text" class="form-control">
              </div>
            </div>
            <div class="form-group row p-2">
              <label class="col-4 col-form-label d-flex justify-content-end align-items-end pe-3" for="contraseñaRegistroUsuario1">Contraseña</label> 
              <div class="col-8">
                <input id="contraseñaRegistroUsuario1" name="contraseñaRegistroUsuario1" type="password" class="form-control">
              </div>
            </div>
            <div class="form-group row p-2">
              <label class="col-4 col-form-label d-flex justify-content-end align-items-end pe-3" for="contraseñaRegistroUsuario2">Repita la contraseña</label> 
              <div class="col-8">
                <input id="contraseñaRegistroUsuario2" name="contraseñaRegistroUsuario2" type="password" class="form-control">
              </div>
            </div>
            <div class="form-group row p-2">
              <div class="col-8 offset-4">
                <div class="custom-control custom-checkbox custom-control-inline">
                  <input name="mostrarContraseñaRegistro" id="mostrarContraseñaRegistro" type="checkbox" class="custom-control-input" value="mostrarContraseñaRegistro"> 
                  <label for="mostrarContraseñaRegistro" class="custom-control-label">Mostrar</label>
                </div>
              </div>
            </div>

            <div class="form-group row p-2">
              <div class="offset-4 col-8">
                <button name="submit" type="button" class="btn btn-primary" id="btnRegistrarUsuario">Registrar usuario</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- HOME -->
    <div class="container view" id="containerHome">
      
      <!--TITULO-->
      <div class="row">
        <div class="col text-center my-5">
          <p class="h2">Casa Vacacional</p>
        </div>
      </div>


      <!--CAROUSEL-->
      <div class="row">
        <div class="col">
          <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
            </div>
            <div class="carousel-inner">
            <?php

            //BORRAR
            // BUCLE PARA CREAR LOS ITEMS DEL CAROUSEL. 
            // EL PRIMERO TIENE QUE SER CLASS="CAROUSEL-ITEM *ACTIVE*", LOS DEMAS NO LLEVAN ACTIVE
            // EL PRIMERO DEBERÍA SER EL DE "URBANIZACION" PARA QUEDAR MAS BONITO.

            $sql="SELECT * FROM imagen WHERE id_casa=1 AND texto_carousel IS NOT NULL";
            $imagenesCarouselBDD = mysqli_query($conexion, $sql);

            $primero = true;
            foreach($imagenesCarouselBDD as $fila) // PINTA EL CAROUSEL CON LAS IMAGENES SACADAS DE LA BDD Y SU INFORMACIÓN
            {
              if($primero){
                $primero = false;
            ?>
                <div class="carousel-item active">
                  <img src="img/<?=$fila['nombre']?>.jpg" class="d-block w-100" alt="<?=$fila['texto_alt']?>">
                  <div class="carousel-caption d-none d-md-block">
                    <h5><?=$fila['titulo']?></h5>
                    <p><?=$fila['texto_carousel']?></p>
                  </div>
                </div>
            <?php
              }else{
            ?>
                <div class="carousel-item">
                  <img src="img/<?=$fila['nombre']?>.jpg" class="d-block w-100" alt="<?=$fila['texto_alt']?>">
                  <div class="carousel-caption d-none d-md-block">
                    <h5><?=$fila['titulo']?></h5>
                    <p><?=$fila['texto_carousel']?></p>
                  </div>
                </div>
            <?php
              }
            }
            ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>

      <?php

        $sql = "SELECT * FROM casa WHERE id_casa = 1";
        $casaBDD = mysqli_query($conexion, $sql);

        $sql="SELECT equipamiento.nombre
          FROM equipamiento
          INNER JOIN equipamiento_casa
          ON equipamiento_casa.id_equipamiento=equipamiento.id_equipamiento
          WHERE equipamiento_casa.id_casa=1";
        $equipamientoCasa = mysqli_query($conexion, $sql);

        $sql="SELECT servicio.nombre
        FROM servicio
        INNER JOIN servicio_casa
        ON servicio_casa.id_servicio=servicio.id_servicio
        WHERE servicio_casa.id_casa=1";
        $servicioCasa = mysqli_query($conexion, $sql);

      ?>

      <!--INFORMACIÓN-->
        <!--GENERAL-->
      <div class="row">
        <div class="col text-center my-5">
          <p class="h3">Información General</p>

          <div class="row">
            <div class="col text-end">
              <p>Numero de habitaciones:</p>
              <p>Numero de camas:</p>
            </div>

            <div class="col text-start">
              <?php
              foreach($casaBDD as $fila){

                echo "<p>".$fila['num_habitaciones']."</p>";
                echo "<p>".$fila['num_camas']."</p>";

              }
              ?>
            </div>
          </div>
        </div>
      </div>

      <!--DETALLES-->
      <div class="row">
        <!--EQUIPAMIENTO-->
        <div class="col-6 text-end p-2 px-md-5">
          <p class="h4">Equipamiento</p>
          <?php
          foreach($equipamientoCasa as $equipamiento){
            echo "<p>".$equipamiento['nombre']."</p>";
          }
          ?>
        </div>

        <!--SERVICIOS-->
        <div class="col-6  p-2 px-md-5">
          <p class="h4">Servicios</p>
          <?php
          foreach($servicioCasa as $servicio){
            echo "<p>".$servicio['nombre']."</p>";
          }
          ?>
        </div>
      </div>

      <!-- MAPA -->
      <div class="row mx-2">
        <div class="col text-center">
          <p class="h4">Dirección</p>
          <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4487.179328896051!2d-5.933701594455291!3d37.32084268181402!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd126fd7c70ee133%3A0x9ecb6311fc2e8400!2sC.%20Azafr%C3%A1n%2C%20117%2C%2041089%20Montequinto%2C%20Sevilla!5e0!3m2!1ses!2ses!4v1670347420031!5m2!1ses!2ses"
            width="600" 
            height="450" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade">
          </iframe>
        </div>
      </div>

    </div>

    <!-- GALERIA (con vista masonry) -->
    <div class="container displayNone view" id="containerGaleria">
      <div class="row">
          <div class="col text-center">
            <p class="h3">Galería de Imágenes</p>
          </div>
      </div>
      <!--
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4" 
        data-masonry='{"percentPosition": true }'>      
            
        <div class="col">
          <div class="card">
            <img src="img/pool.jpg" alt="">
            <div class="card-body text-center">
              <p class="h4">Piscina</p>
              <p>Piscina privada</p>
            </div>
          </div>
        </div>
        
        <div class="col">
          <div class="card">
            <img src="img/pool.jpg" alt="">
            <div class="card-body text-center">
              <p class="h4">Piscina</p>
              <p>Piscina privada</p>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <img src="img/pool.jpg" alt="">
            <div class="card-body text-center">
              <p class="h4">Piscina</p>
              <p>Piscina privada</p>
            </div>
          </div>
        </div><div class="col">
          <div class="card">
            <img src="img/pool.jpg" alt="">
            <div class="card-body text-center">
              <p class="h4">Piscina</p>
              <p>Piscina privada</p>
            </div>
          </div>
        </div><div class="col">
          <div class="card">
            
            <div class="card-body text-center">
              <p class="h4">Piscina</p>
              <p>Piscina privada</p>
            </div>
          </div>
        </div><div class="col">
          <div class="card">
            
            <div class="card-body text-center">
              <p class="h4">Piscina</p>
              <p>Piscina privada</p>
            </div>
          </div>
        </div><div class="col">
          <div class="card">
            <img src="img/pool.jpg" alt="">
            <div class="card-body text-center">
              <p class="h4">Piscina</p>
              <p>Piscina privada</p>
            </div>
          </div>
        </div><div class="col">
          <div class="card">
            <img src="img/pool.jpg" alt="">
            <div class="card-body text-center">
              <p class="h4">Piscina</p>
              <p>Piscina privada</p>
            </div>
          </div>
        </div>
      </div>
      -->

      <?php
      $sql="SELECT * 
        FROM imagen 
        INNER JOIN casa 
        ON casa.id_propietario=1";
      $imagenesBDD = mysqli_query($conexion, $sql);
      $posText = true;
      ?>

      <!--<div class="grid">-->
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3" data-masonry='{"percentPosition": true}'>

          <?php
          foreach($imagenesBDD as $imagenBDD)
          {
          ?>

          <div class="col">
            <div class="card my-3">
              
                <img src="img/<?=$imagenBDD['nombre']?>.jpg" alt="<?=$imagenBDD['texto_alt']?>">
              
              <div class="card-body text-center">
                <p class="h4"><?=$imagenBDD['titulo']?></p>
                <p><?=$imagenBDD['texto']?></p>
              </div>
            </div>
          </div>

          <?php
          }
          ?>

        </div>
      <!--</div>-->

    </div>

    <!-- ADMINISTRACIÓN -->
    <div class="container displayNone view" id="containerAdmin">
      <div class="row">
        <div class="col-10 p-2 col-md-6 offset-md-3 offset-1">
          <p class="h3 text-center">Administracion</p>
        </div>
      </div>
      <div class="row">
        <!-- CONTAINER CON LOS FORMULARIOS DE LA ADMINISTRACIÓN -->

      </div>
    </div>

    <!-- SOLICITUDES Y RESERVAS -->
    <div class="container displayNone view" id="containerReservas">

      <!--SELECCIÓN DISPLAY-->
      <div class="row displayNone" id="seleccionDisplayReserva">
        <div class="col d-flex justify-content-center">
          <button class="btn btn-primary m-2" id="btnSeleccionReserva" type="button">Reserva</button>
          <button class="btn btn-primary m-2" id="btnSeleccionSolicitud" type="button">Solicitud de información</button>
        </div>
      </div>

      <!--SOLICITUDES DE INFORMACIÓN-->
      <div class="row" id="areaSolicitudInformacion">
        <div class="col">
          <p class="text-center h3">Solicitud de información</p>
          <form id="form_solicitud_informacion" name="form_solicitud_informacion">
            <div class="form-group row mt-3">
              <label class="col-4 col-form-label text-end" for="tituloSolicitud">Título</label> 
              <div class="col-5">
                <input id="tituloSolicitud" name="tituloSolicitud" type="text" class="form-control">
              </div>
            </div>
            <div class="form-group row mt-3">
              <label for="emailSolicitud" class="col-4 col-form-label text-end">Email</label> 
              <div class="col-5">
                <input id="emailSolicitud" name="emailSolicitud" type="text" class="form-control">
              </div>
            </div>
            <div class="form-group row mt-3">
              <label for="mensajeSolicitud" class="col-4 col-form-label text-end">Tu mensaje</label> 
              <div class="col-5">
                <textarea id="mensajeSolicitud" name="mensajeSolicitud" cols="40" rows="5" class="form-control"></textarea>
              </div>
            </div>
            <div class="form-group row mt-3">
              <div class="col-4"></div> 
              <div class="col-5">
                <div class="custom-control custom-checkbox custom-control-inline">
                  <input name="subNewsletter" id="subNewsletter_0" type="checkbox" class="custom-control-input" value="subscripcion"> 
                  <label for="subNewsletter_0" class="custom-control-label">Subscríbeme al Newsletter</label>
                </div>
              </div>
            </div> 
            <div class="form-group row mt-3">
              <div class="offset-4 col-5">
                <button name="submit" type="button" class="btn btn-primary" id="btnEnviarSolicitud">Enviar</button>
              </div>
            </div>
          </form>
        </div>
      </div>

      <!--RESERVA-->
      <div class="row displayNone" id="areaReserva">
        <div class="col">
          <p class="text-center h3">RESERVA</p>
          <?php
            $dateComponents = getdate();

            $month = $dateComponents['mon']; 			     
            $year = $dateComponents['year'];
          ?>
          <div class="container">
            <p class="text-center h4">Días reservados:</p>
            <div class="row">
              <div class="col-6 col-md-4">
                <?php
                  echo build_calendar($month,$year);
                ?>
              </div>
              <div class="col-6 col-md-4">
                <?php
                  $month++;
                  if($month=="13"){
                    $month = 1;
                    $year++;
                  }
                  echo build_calendar($month,$year);
                ?>
              </div>
              <div class="col-6 col-md-4">
                <?php
                  $month++;
                  if($month=="13"){
                    $month = 1;
                    $year++;
                  }
                  echo build_calendar($month,$year);
                ?>
              </div>
            </div>

            <!--RECOGER LAS FECHAS-->
            <div class="row m-4 justify-content-center">
              <div class="col col-sm-4">
                <label for="reservaFechaInicio">Fecha de inicio:</label>
                <input id="reservaFechaInicio" class="form-control" type="date" />
              </div>
              <div class="col col-sm-4">
                <label for="reservaFechaFinal">Fecha final:</label>
                <input id="reservaFechaFinal" class="form-control" type="date" />
              </div>
            </div>
            <div class="row">
              <div class="col d-flex justify-content-center">
                <button class="btn btn-primary m-2" id="btnReservarFechas" type="button">Reservar fechas</button>
              </div>
            </div>

          </div>
        </div>
      </div>

    </div>

    <!-- REDES SOCIALES DESCOMENTAR CUANDO VAYA A HACER LA PRESENTACION-->
    <div class="container displayNone view" id="containerSocial">
        <div class="row">
          
          <div class="col p-4">
            <script src="https://apps.elfsight.com/p/platform.js" defer></script>
            <div class="elfsight-app-7a0f4d02-08bf-4e33-a4a0-4d14d889fd1d"></div>
          </div> 

        </div>
    </div>

    <!-- FOOTER -->
    <footer>
      <div class="container mb-5" id="footer">
        <div class="row">
          <div class="col text-center">
            Footer
          </div>
        </div>
      </div>
    </footer>

    <!--JS Bootstrap-->
    <script src="js\bootstrap.bundle.min.js"></script>

    <!--JS Ajax-->
    <script src="js\ajax.js"></script>

    <!--JS Auxiliar-->
    <script src="js\cookiesandxml.js"></script>

    <!--JS Codigo-->
    <script src="js\codigo.js"></script>

    <!--MASONRY-->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" 
      integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" 
      crossorigin="anonymous" 
      async>
    </script>
      -->
    <script src="js\masonry-docs.min.js"></script>    
    
</body>
</html>

<?php
  $conexion -> close();
?>