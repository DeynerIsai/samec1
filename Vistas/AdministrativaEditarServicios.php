<?php
$controlador = new controladorServicios();
if (isset($_GET['idtipo'])) {
    $row = $controlador->
        consultar($_GET['idtipo']);

} else {
    echo "window.location.href='?cargar=AdministrativaListarServicios'";
}
if (isset($_POST['registrar'])) {
    $r = $controlador->editar($_GET['idtipo'], $_POST['nombre'], $_POST['precio'], $_POST['idservicio']);

    if ($r) {
        echo "
<script language='JavaScript'>
    alert('Registro modificado');
        window.location.href='?cargar=AdministrativaListarServicios'
</script>
";
    }
}
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
            <nav class="full-box dashboard-Navbar">
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
            <form action="" method="post">
                <div class="container-fluid">
                    <div class="page-header">
                        <h1 class="text-titles">
                            <i class="zmdi zmdi-balance zmdi-hc-fw">
                            </i>
                            Administración
                            <small>
                                Servicios
                            </small>
                        </h1>
                    </div>
                </div>
                <div class="container-fluid">
                    <ul class="breadcrumb breadcrumb-tabs">
                        <li>
                            <a class="btn btn-info" href="">
                                <i class="zmdi zmdi-plus">
                                </i>
                                NUEVO SERVICIO
                            </a>
                        </li>
                        <li>
                            <a class="btn btn-success" href="?cargar=AdministrativaListarServicios&idUsuario=<?php echo $_SESSION['id_usuario'] ?>">
                                <i class="zmdi zmdi-format-list-bulleted">
                                </i>
                                LISTA DE SERVICIOS
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- panel datos de la empresa -->
                <div class="container-fluid">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="zmdi zmdi-plus">
                                </i>
                                DATOS DEL SERVICIO
                            </h3>
                        </div>
                        <div class="panel-body">
                            <form>
                                <fieldset>
                                    <legend>
                                        <i class="zmdi zmdi-assignment">
                                        </i>
                                        Datos Básicos
                                    </legend>
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">
                                                        CÓDIGO/NÚMERO DE REGISTRO *
                                                    </label>
                                                    <input class="form-control" maxlength="30" name="idtipo" pattern="[0-9-]{1,30}" required="" type="text" value="<?php echo $row['idtipo']; ?>">
                                                    </input>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">
                                                        Nombre del Servicio *
                                                    </label>
                                                    <input class="form-control" maxlength="40" name="nombre" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,40}" required="" type="text" value="<?php echo $row['nombre']; ?>">
                                                    </input>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">
                                                        Precio
                                                    </label>
                                                    <input class="form-control" maxlength="40" name="precio" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,40}" required="" type="text" value="<?php echo $row['precio']; ?>"/>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6">
                                                <div align="left">
                                                    <label class="control-label" for="categoria">
                                                        Tipo:
                                                    </label>
                                                </div>
                                                <div>
                                                    <select autofocus="" class="form-control" name="idservicio">
                                                        <option value="1">
                                                            SOFTWARE
                                                        </option>
                                                        <option value="2">
                                                            HARDWARE
                                                        </option>
                                                        <option value="3">
                                                            NETWORKING
                                                        </option>
                                                        <option value="4">
                                                            OTROS
                                                        </option>
                                                        <option value="5">
                                                            SERVICIO TECNICO GENERAL POR HORAS
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <br>
                                    <p class="text-center" style="margin-top: 20px;">
                                        <button class="btn btn-info btn-raised btn-sm" name="registrar" type="submit">
                                            <i class="zmdi zmdi-floppy">
                                            </i>
                                            Guardar
                                        </button>
                                    </p>
                                </br>
                            </form>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </body>
</html>