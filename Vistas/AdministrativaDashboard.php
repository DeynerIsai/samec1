<!DOCTYPE html>
<html lang="es">
    <body>
        <?php
if (isset($_SESSION['validada'])) {
    include_once 'Menu.php';
}

require_once '../Modelos/Dashboard.php';
include_once '../Controladores/enrutadorMenu.php';

$controlador = new controladorDashboard();

$registros = $controlador->
    consultar();

?>
        <!DOCTYPE html>
        <html lang="en">
            <head>
                <title>
                    SAMEC
                </title>
                <meta charset="utf-8">
                    <meta content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" name="viewport">
                        <link href="../Estilos/css/main.css" rel="stylesheet">
                            <link href="../Estilos/Imagenes/icons/Icono2.ico" rel="icon" type="text/css">
                            </link>
                        </link>
                    </meta>
                </meta>
            </head>
            <body>
                <!-- Content page-->
                <section class="full-box dashboard-contentPage">
                    <!-- NavBar -->
                    <nav class="full-gbox dashboard-Navbar">
                        <ul class="full-box list-unstyled text-right">
                            <li class="pull-left">
                                <a class="btn-menu-dashboard" href="#!">
                                    <i class="zmdi zmdi-more-vert">
                                    </i>
                                </a>
                            </li>
                            <li>
                                <a class="btn-search" href="search.html">
                                    <i class="zmdi zmdi-search">
                                    </i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- Content page -->
                    <div class="container-fluid">
                        <div class="page-header">
                            <h1 class="text-titles">
                                Sistema
                                <small>
                                    Registros activos
                                </small>
                            </h1>
                        </div>
                    </div>
                    <div class="full-box text-center" style="padding: 30px 10px;">
                        <article class="full-box tile">
                            <div class="full-box tile-title text-center text-titles text-uppercase">
                                Usuarios
                            </div>
                            <div class="full-box tile-icon text-center">
                                <i class="zmdi zmdi-account">
                                </i>
                            </div>
                            <div class="full-box tile-number text-titles">
                                <p class="full-box">
                                    <?php echo $registros['usuario']; ?>
                                </p>
                                <small>
                                    Registrados
                                </small>
                            </div>
                        </article>
                        <article class="full-box tile">
                            <div class="full-box tile-title text-center text-titles text-uppercase">
                                Equipos
                            </div>
                            <div class="full-box tile-icon text-center">
                                <i class="zmdi zmdi-balance ">
                                </i>
                            </div>
                            <div class="full-box tile-number text-titles">
                                <p class="full-box">
                                   15<?php //echo $registros['lugar']; ?>
                                </p>
                                <small>
                                    Registrados
                                </small>
                            </div>
                        </article>
                        <article class="full-box tile">
                            <div class="full-box tile-title text-center text-titles text-uppercase">
                                Servicios
                            </div>
                            <div class="full-box tile-icon text-center">
                                <i class="zmdi zmdi-face">
                                </i>
                            </div>
                            <div class="full-box tile-number text-titles">
                                <p class="full-box">
                                    70
                                </p>
                                <small>
                                    Registrados
                                </small>
                            </div>
                        </article>
                    </div>
                    <?php
include_once '../Modelos/Conexion.php';
$con = new conexion();
$sql = "SELECT id_bitacora,entrada,salida,fecha,
   (SELECT nombre FROM usuarios AS u WHERE u.id_usuario=ub.id_usuario) AS nombre,
   (SELECT apellidos FROM usuarios AS u WHERE u.id_usuario=ub.id_usuario) AS apellidos,
   (SELECT tipo FROM usuarios AS u WHERE u.id_usuario=ub.id_usuario) AS tipo
   FROM usuario_bitacora AS ub ORDER BY id_bitacora DESC";
$bitacora = $con->
    consultaRetorno($sql);
?>
                    <div class="container-fluid">
                        <div class="page-header">
                            <h1 class="text-titles">
                                Bitacora
                                <small>
                                    Linea de tiempo de accesos
                                </small>
                            </h1>
                        </div>
                        <section class="cd-container" id="cd-timeline">
                            <?php while ($object = mysqli_fetch_array($bitacora)): ?>
                            <div class="cd-timeline-block">
                                <div class="cd-timeline-img">
                                    <img alt="user-picture" src="../Estilos/assets/avatars/StudetMaleAvatar.png">
                                    </img>
                                </div>
                                <div class="cd-timeline-content">
                                    <h4 class="text-center text-titles">
                                        <?php echo $object['nombre'], ' ' . $object['apellidos'], ' (' . $object['tipo'] . ')';
$_SESSION['id_bitacora'] = $object['id_bitacora'];
?>
                                    </h4>
                                    <p class="text-center">
                                        <i class="zmdi zmdi-timer zmdi-hc-fw">
                                        </i>
                                        Inicio de sesión:
                                        <em>
                                            <?php echo $object['entrada']; ?>
                                        </em>
                                        <i class="zmdi zmdi-time zmdi-hc-fw">
                                        </i>
                                        Salida:
                                        <em>
                                            <?php echo $object['salida']; ?>
                                        </em>
                                    </p>
                                    <span class="cd-date">
                                        <i class="zmdi zmdi-calendar-note zmdi-hc-fw">
                                        </i>
                                        <?php echo $object['fecha']; ?>
                                    </span>
                                </div>
                            </div>
                            <?php endwhile;?>
                        </section>
                    </div>
                </section>
            </body>
        </html>
    </body>
</html>