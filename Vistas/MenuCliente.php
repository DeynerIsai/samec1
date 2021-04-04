<?php
session_start();
include_once '../Controladores/enrutadorMonitor.php';
include_once '../Controladores/controladorMonitor.php';
include_once '../Controladores/enrutadorEquipo.php';
include_once '../Controladores/controladorEquipo.php';
include_once '../Controladores/enrutadorServicios.php';
include_once '../Controladores/controladorServicios.php';
//include_once '../Controladores/enrutadorMensaje.php';
include_once '../Controladores/enrutadorMenu.php';
include_once '../Controladores/controladorUsuario.php';

?>
<!DOCTYPE html>
<html>
<head>
  <title>
    Turismo
  </title>
    <meta charset="utf-8">
    <meta content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" name="viewport">
      <!-- Bootstrap CSS -->
     <link href="../Estilos/css/main.css" rel="stylesheet">
    </meta>
 </meta>
  <script src="../Estilos/js/jquery-2.1.4.js"></script>
</head>
<body>
<?php if (@$_SESSION['validada'] == "SI") {
    ;
}
?>
<section class="full-box cover dashboard-sideBar">
            <div class="full-box dashboard-sideBar-bg btn-menu-dashboard">
            </div>
            <div class="full-box dashboard-sideBar-ct">
                <!--SideBar Title -->
                <div class="full-box text-uppercase text-center text-titles dashboard-sideBar-title">
                    Cliente
                    <i class="zmdi zmdi-close btn-menu-dashboard visible-xs">
                    </i>
                </div>
                <!-- SideBar User info -->
                <div class="full-box dashboard-sideBar-UserInfo">
                    <figure class="full-box">
                        <img alt="UserIcon" src="../Estilos/assets/avatars/AdminMaleAvatar.png">
                            <figcaption class="text-center text-titles">
                            <?php echo "<label align=right>Bienvenido " . $_SESSION['nombre'] . "</label>"; ?>
                            </figcaption>
                        </img>
                    </figure>
                    <ul class="full-box list-unstyled text-center">
                        <li>
                            <a  href="?cargar=AdministrativaMisDatos&id_usuario=<?php echo $_SESSION['id_usuario'] ?>"  title="Mis datos">
                                <i class="zmdi zmdi-account-circle">
                                </i>
                            </a>
                        </li>
                        <li>
                            <a href="?cargar=AdministrativaMiCuenta&id_usuario=<?php echo $_SESSION['id_usuario'] ?>" title="Mi cuenta">
                                <i class="zmdi zmdi-settings">
                                </i>
                            </a>
                        </li>
                        <li>
                            <a class="btn-exit-system" href="#!" title="Salir del sistema">
                                <i class="zmdi zmdi-power">
                                </i>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- SideBar Menu -->
                <ul class="list-unstyled full-box dashboard-sideBar-Menu">
                        <li>
                        <a class="btn-sideBar-SubMenu" href="#!">
                            <i class="zmdi zmdi-case zmdi-hc-fw">
                            </i>
                            Administración
                            <i class="zmdi zmdi-caret-down pull-right">
                            </i>
                        </a>
                        <ul class="list-unstyled full-box">
                        <li>
                                <a href="?cargar=AdministrativaListarEquipo&idUsuario=<?php echo $_SESSION['id_usuario'] ?>">
                                    <i class="zmdi zmdi-balance zmdi-hc-fw">
                                    </i>
                                    Usuarios
                                </a>
                        </li>
                        <li>
                                <a href="?cargar=AdministrativaListarServicios&idUsuario=<?php echo $_SESSION['id_usuario'] ?>">
                                    <i class="zmdi zmdi-balance zmdi-hc-fw">
                                    </i>
                                    Servicios
                                </a>
                        </li>
                        <li>
                            <a  data-toggle="modal" href="" data-target="#miMensaje" class="nav-link" style="justify-content: left;">
                            <i class="zmdi zmdi-book zmdi-hc-fw"></i>
                            Publicar</a>
                        </li>
                       </ul>
                    </li>

                </ul>
            </div>
        </section>
        <!--modal para mensajes-->
<div class="modal fade" id="miMensaje" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h2 class="" style="color:#7d1c1e">Publica un comentario animador!!</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="background-color: white;">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
       <form id="formulario" action="AdministrativaGuardarPublicacion.php" method="post" >
        <div class="form-group">
        <span class="control-label">Imágen</span>
        <input type="file" name="archivo" id="archivo" accept=".jpg, .png, .jpeg">
         <div class="input-group">
         <span class="input-group-btn input-group-sm">
          <button type="button" class="btn btn-fab btn-fab-mini">
          <i class="zmdi zmdi-attachment-alt"></i>
           </button>
           </span>
           <p id="aviso">[Vista previa no disponible]</p>
           <img id="vistaPrevia" width="250" height="250"/>
           </div>
           </div>
         <div class="form-group row">
            <label for="nom" class="col-sm-3 form-control-label">Nombre</label>
            <div class="col-sm-9">
             <label id='nom' name='nom' align=right required="nom" value=<?php echo "" . $_SESSION['nombre'] . ' ' . $_SESSION['apellidos']; ?>></label>
            </div>
            <label for="correo" class="col-sm-3 form-control-label">E-mail</label>
          <div class="col-sm-9">
            <?php echo "<label id='correo' name='correo' align=right>" . $_SESSION['correo'] . "</label>"; ?>
          </div>
        </div>
        <div class="form-group row">
          <label for="men" class="col-sm-3 form-control-label">Comentario</label>
          <div class="col-sm-9">
            <textarea class="form-control" id="men" rows="3" placeholder="¿Qué nos quieres decir?,¿Qué opinas?" name="men" style="min-height: 90px; max-height: 200px;" required="men"></textarea>
          </div>
      </div>
      <div class="modal-footer d-flex ">
       <button type="submit" class="btn">Publicar</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>
<script>
  jQuery('#archivo').on('change', function(e) {
    var Lector,oFileInput = this;
    if (oFileInput.files.length == 0) {
      jQuery('#aviso').text('[Vista previa no disponible]');
      jQuery('#vistaPrevia').attr('src','');
      return;
    };
    Lector = new FileReader();
    Lector.onloadend = function(e) {
      jQuery('#vistaPrevia').attr('src', e.target.result);
      jQuery('#aviso').text('');
    };
    Lector.readAsDataURL(oFileInput.files[0]);
  });
  </script>
<!--fin modal para mensajes-->

        <?php

$enrutadorMenu = new enrutadorMenu();
if ($enrutadorMenu->validarGET(@$_GET['cargar'])) {
    $enrutadorMenu->cargarVista($_GET['cargar']);
}
$enrutadorServicios = new enrutadorServicios();
if ($enrutadorServicios->validarGET(@$_GET['cargar'])) {
    $enrutadorServicios->cargarVista($_GET['cargar']);
}

?>
</body>
<!--====== Scripts -->
 <script src="../Estilos/js/jquery-3.1.1.min.js">
        </script>
        <script src="../Estilos/js/sweetalert2.min.js">
        </script>
        <script src="../Estilos/js/bootstrap.min.js">
        </script>
        <script src="../Estilos/js/material.min.js">
        </script>
        <script src="../Estilos/js/ripples.min.js">
        </script>
        <script src="../Estilos/js/jquery.mCustomScrollbar.concat.min.js">
        </script>
        <script src="../Estilos/js/main.js">
        </script>
        <script>
            $.material.init();
        </script>
<!-- SideBar -->
<script src="js/jquery-1.12.1.min.js"></script>
    <!-- popper js -->
    <script src="js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- easing js -->
    <script src="js/jquery.magnific-popup.js"></script>
    <!-- swiper js -->
    <script src="js/swiper.min.js"></script>
    <!-- swiper js -->
    <script src="js/masonry.pkgd.js"></script>
    <!-- particles js -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- swiper js -->
    <script src="js/slick.min.js"></script>
    <script src="js/gijgo.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
</html>