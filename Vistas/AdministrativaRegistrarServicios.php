<?php
if ($_SESSION['validada'] != "SI") {
    if (@$_SESSION['tipo'] == "Administrador") {
        include_once 'Menu.php';
    } else {
        include_once 'MenuCliente.php';
    }
} elseif ($_SESSION['validada'] != "SI") {
    echo "<script>
window.location='AdministrativaLogin.php'
";
}

$controlador = new controladorServicios();
if (isset($_POST['AdministrativaRegistrarServicios'])) {
    $r = $controlador->crear($_POST['idtipo'], $_POST['nombre'], $_POST['precio'], $_POST['idservicio']);

    if ($r) {
        $is = $_SESSION['id_usuario'];
        echo "
<script>
    if(confirm(\"¿Desea realizar un nuevo registro?\")){
          window.location.href='?cargar=AdministrativaRegistrarServicios';
        }else{
          window.location.href='?cargar=AdministrativaListarServicios&idUsuario=" . $is . "';
        }
</script>
";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>SAMEC</title>
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
            <form action="" enctype="multipart/form-data" method="POST">
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
                                                <?php
include_once '../Modelos/Conexion.php';
$con    = new conexion();
$sql    = "SELECT MAX(idtipo) AS id FROM tiposervicio";
$result = $con->
    consultaRetorno($sql);
while ($row = mysqli_fetch_array($result)) {
    $id      = $row["id"];
    $nuevoId = $id + 1;
    echo "
                                                <label class='control-label'>
                                                    CÓDIGO/NÚMERO DE REGISTRO *
                                                </label>
                                                <input '='' class='form-control' maxlength='11' name='idtipo' pattern='[0 - 9 - ]{1, 11}' type='text' value='$nuevoId'>
                                                    ";
}
?>
                                                </input>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">
                                                    Nombre del Servicio *
                                                </label>
                                                <input class="form-control" maxlength="100" name="nombre" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ-'.,: ]{1,100}" required="" type="text">
                                                </input>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">
                                                    Precio
                                                </label>
                                                <input class="form-control" maxlength="170" name="precio" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ,.:; ]{1,170}" type="text">
                                                </input>
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
                                <br>
                                    <p class="text-center" style="margin-top: 20px;">
                                        <button class="btn btn-info btn-raised btn-sm" name="AdministrativaRegistrarServicios" type="submit">
                                            <i class="zmdi zmdi-floppy">
                                            </i>
                                            Guardar
                                        </button>
                                        <input name="accion" type="hidden" value="1"/>
                                    </p>
                                </br>
                            </br>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </body>
</html>
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