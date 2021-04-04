<?php
if (@$_SESSION['validada'] == "SI");
include_once 'Menu.php';
$controlador = new controladorUsuario();
if (isset($_GET['id_usuario'])) {
    $row = $controlador->
        consultar($_GET['id_usuario']);
} else {
    echo "window.location.href='?cargar=AdministrativaListarUsuario&tipo;=Administrador'";

}
$r = 0;
if (isset($_POST['AdministrativaEditarUsuario'])) {
    $r = $controlador->editarDatos($_POST['id_usuario'], $_POST['nombre'], $_POST['apellidos'], $_POST['correo'], $_POST['telefono'], $_POST['direccion'], $_POST['genero']);
}
if ($r) {
    echo "
<script language='JavaScript'>
    alert('Registro modificado');
        window.location.href='?cargar=AdministrativaListarUsuario&tipo=Administrador';
</script>
";
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>
            Editar usuario
        </title>
        <meta charset="utf-8">
            <meta content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" name="viewport">
                <link href="../Estilos/css/login.css" rel="stylesheet">
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
                </ul>
            </nav>
            <form action="" method="POST">
                <!-- Content page -->
                <div class="container-fluid">
                    <div class="page-header">
                        <h1 class="text-titles">
                            <i class="zmdi zmdi-account zmdi-hc-fw">
                            </i>
                            Mis datos
                        </h1>
                    </div>
                </div>
                <!-- Panel nuevo administrador -->
                <div class="container-fluid">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="zmdi zmdi-plus">
                                </i>
                                ACTUALIZAR
                            </h3>
                        </div>
                        <div class="panel-body">
                            <fieldset>
                                <legend>
                                    <i class="zmdi zmdi-account-box">
                                    </i>
                                    Información personal
                                </legend>
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">
                                                    DNI/CEDULA *
                                                </label>
                                                <input class="form-control" maxlength="30" name="id_usuario" pattern="[0-9-]{1,30}" required="" type="text" value="<?php echo $row['id_usuario']; ?>">
                                                </input>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">
                                                    Nombres *
                                                </label>
                                                <input class="form-control" maxlength="30" name="nombre" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" required="" type="text" value="<?php echo $row['nombre']; ?>">
                                                </input>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">
                                                    Apellidos *
                                                </label>
                                                <input class="form-control" maxlength="30" name="apellidos" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" required="" type="text" value="<?php echo $row['apellidos']; ?>">
                                                </input>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">
                                                    Teléfono
                                                </label>
                                                <input class="form-control" maxlength="15" name="telefono" pattern="[0-9+]{1,15}" type="text" value="<?php echo $row['telefono']; ?>">
                                                </input>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">
                                                    Dirección
                                                </label>
                                                <input class="form-control" maxlength="100" name="direccion" type="text" value="<?php echo $row['direccion']; ?>">
                                                </input>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">
                                                    E-mail
                                                </label>
                                                <input class="form-control" maxlength="50" name="correo" type="email" value="<?php echo $row['correo']; ?>">
                                                </input>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">
                                                    Genero *
                                                </label>
                                                <input class="form-control" maxlength="10" name="genero" required="" type="text" value="<?php echo $row['genero']; ?>">
                                                </input>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <br>
                                <p class="text-center" style="margin-top: 20px;">
                                    <button class="btn btn-info btn-raised btn-sm" name="AdministrativaEditarUsuario" type="submit">
                                        <i class="zmdi zmdi-floppy">
                                        </i>
                                        Guardar
                                    </button>
                                </p>
                            </br>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </body>
</html>