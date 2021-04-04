<!DOCTYPE html>
<html lang="es">
    <body>
        <?php
if (isset($_SESSION['validada'])) {
    include_once 'Menu.php';
}

require_once '../Modelos/PdfServicios.php';
include_once '../Controladores/enrutadorMenu.php';

$controlador = new controladorPdfServicios();

$registros1 = $controlador->consultarSW();
$registros2 = $controlador->consultarHW();
$registros3 = $controlador->consultarNW();
$registros4 = $controlador->consultarOT();
$registros5 = $controlador->consultarST();
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
                        </ul>
                    </nav>
                    <!-- Content page -->
                    <div class="container-fluid">
                        <div class="page-header">
                            <h1 class="text-titles">
                                Sistema
                                <small>
                                    Reportes PDF Servicios
                                </small>
                            </h1>
                        </div>
                    </div>
                    <div class="full-box text-center" style="padding: 30px 10px;">
                        <article class="full-box tile">
                            <div class="full-box tile-title text-center text-titles text-uppercase">
                                Software
                            </div>
                            <div class="full-box tile-icon text-center">
                                <i class="zmdi zmdi-desktop-windows">
                                </i>
                            </div>
                            <div class="full-box tile-number text-titles">
                                <p class="full-box">
                                    <?php echo $registros1['Cantidad1']; ?>
                                </p>
                                <small>
                                    <a class="btn btn-info" onclick="window.open('../reportes/reporte_CategoriaSW.php')" style="cursor:pointer;">
                                        <i class="zmdi zmdi-print zmdi-hc-fw">
                                        </i>PDF
                                    </a>
                                </small>
                            </div>
                        </article>
                        <article class="full-box tile">
                            <div class="full-box tile-title text-center text-titles text-uppercase">
                                Hardware
                            </div>
                            <div class="full-box tile-icon text-center">
                                <i class="zmdi zmdi-balance ">
                                </i>
                            </div>
                            <div class="full-box tile-number text-titles">
                                <p class="full-box">
                                    <?php echo $registros2['Cantidad2']; ?>
                                </p>
                                <small>
                                    <a class="btn btn-info" onclick="window.open('../reportes/reporte_CategoriaHW.php')" style="cursor:pointer;">
                                        <i class="zmdi zmdi-print zmdi-hc-fw">
                                        </i>PDF
                                    </a>
                                </small>
                            </div>
                        </article>
                        <article class="full-box tile">
                            <div class="full-box tile-title text-center text-titles text-uppercase">
                                Networking
                            </div>
                            <div class="full-box tile-icon text-center">
                                <i class="zmdi zmdi-accounts-outline">
                                </i>
                            </div>
                            <div class="full-box tile-number text-titles">
                                <p class="full-box">
                                    <?php echo $registros3['Cantidad3']; ?>
                                </p>
                                <small>
                                    <a class="btn btn-info" onclick="window.open('../reportes/reporte_CategoriaNW.php')" style="cursor:pointer;">
                                        <i class="zmdi zmdi-print zmdi-hc-fw">
                                        </i>PDF
                                    </a>
                                </small>
                            </div>
                        </article>
                        <article class="full-box tile">
                            <div class="full-box tile-title text-center text-titles text-uppercase">
                                Otros
                            </div>
                            <div class="full-box tile-icon text-center">
                                <i class="zmdi zmdi-mood">
                                </i>
                            </div>
                            <div class="full-box tile-number text-titles">
                                <p class="full-box">
                                    <?php echo $registros4['Cantidad4']; ?>
                                </p>
                                <small>
                                    <a class="btn btn-info" onclick="window.open('../reportes/reporte_CategoriaOT.php')" style="cursor:pointer;">
                                        <i class="zmdi zmdi-print zmdi-hc-fw">
                                        </i>PDF
                                    </a>
                                </small>
                            </div>
                        </article>
                        <article class="full-box tile">
                            <div class="full-box tile-title text-center text-titles text-uppercase">
                                Servicio Tecnico General por Horas
                            </div>
                            <div class="full-box tile-icon text-center">
                                <i class="zmdi zmdi-male">
                                </i>
                            </div>
                            <div class="full-box tile-number text-titles">
                                <p class="full-box">
                                    <?php echo $registros5['Cantidad5']; ?>
                                </p>
                                <small>
                                    <a class="btn btn-info" onclick="window.open('../reportes/reporte_CategoriaST.php')" style="cursor:pointer;">
                                        <i class="zmdi zmdi-print zmdi-hc-fw">
                                        </i>PDF
                                    </a>
                                </small>
                            </div>
                        </article>
                </section>
            </body>
        </html>
    </body>
</html>