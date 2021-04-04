<?php
if (@$_SESSION['validada'] == "SI");
include_once 'Menu.php';
$controlador = new controladorUsuario();
if (isset($_GET['id_usuario'])) {
    $row = $controlador->consultar($_GET['id_usuario']);
} else {
    echo "window.location.href='?cargar=AdministrativaListarUsuario&tipo;=Administrador'";

}
if (isset($_POST['AdministrativaEditarUsuario'])) {
    if ($_POST['contraseña'] == $_POST['password']) {
        if ($_POST['password'] == null) {
            $r = $controlador->editar($_POST['id_usuario'], $_POST['nombre'], $_POST['apellidos'],
                $_POST['pass'], $_POST['usuario'], $_POST['tipo'], $_POST['correo'],
                $_POST['telefono'], $_POST['direccion'], $_POST['genero']);
        } else {
            $r = $controlador->editar($_POST['id_usuario'], $_POST['nombre'], $_POST['apellidos'],
                $_POST['password'], $_POST['usuario'], $_POST['tipo'], $_POST['correo'],
                $_POST['telefono'], $_POST['direccion'], $_POST['genero']);
        }
        if ($r) {
            echo "
<script language='JavaScript'>
    alert('Registro modificado');
            window.location.href='?cargar=AdministrativaListarUsuario&tipo=Administrador';
</script>
";
        }
    } else {
        echo "
<script language='JavaScript'>
    alert('No coinciden las contraseñas');
</script>
";
    }
}

?>
<!DOCTYPE html>
<html lang="es">
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
            <form action="" method="POST">
                <!-- Content page -->
                <div class="container-fluid">
                    <div class="page-header">
                        <h1 class="text-titles">
                            <i class="zmdi zmdi-account zmdi-hc-fw">
                            </i>
                            Usuarios
                            <small>
                                Modificar
                            </small>
                        </h1>
                    </div>
                </div>
                <div class="container-fluid">
                    <ul class="breadcrumb breadcrumb-tabs">
                        <li>
                            <a class="btn btn-success" href="?cargar=AdministrativaListarUsuario&tipo=Administrador">
                                <i class="zmdi zmdi-format-list-bulleted">
                                </i>
                                LISTA DE ADMINISTRADORES
                            </a>
                        </li>
                        <li>
                            <a class="btn btn-primary" href="admin-search.html">
                                <i class="zmdi zmdi-search">
                                </i>
                                BUSCAR ADMINISTRADOR
                            </a>
                        </li>
                    </ul>
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
                                        <div class="col-xs-12">
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
                                        <div class="col-xs-12">
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
                                            <?php if ($row['genero'] == 'Masculino') {
    echo
        "<div class='radio radio-primary'>
                                            <label>
                                                <input checked='true' id='optionsRadios1' name='genero' type='radio' value='Masculino'>
                                                    <i class='zmdizmdi - star'>
                                                    </i>
                                                    Masculino
                                                </input>
                                            </label>
                                        </div>
                                        <div class='radioradio - primary'>
                                            <label>
                                                <input id='optionsRadios2' name='genero' type='radio' value='Femenino'>
                                                    <i class='zmdizmdi - star'>
                                                    </i>
                                                    Femenino
                                                </input>
                                            </label>
                                        </div>
                                        ";
} else {
    echo "
                                        <div class='radioradio - primary'>
                                            <label>
                                                <input id='optionsRadios1' name='genero' type='radio' value='Masculino'>
                                                    <i class='zmdizmdi - star'>
                                                    </i>
                                                    Masculino
                                                </input>
                                            </label>
                                        </div>
                                        <div class='radioradio - primary'>
                                            <label>
                                                <input checked='true' id='optionsRadios2' name='genero' type='radio' value='Femenino'>
                                                    <i class='zmdizmdi - star'>
                                                    </i>
                                                    Femenino
                                                </input>
                                            </label>
                                        </div>
                                        ";
}
?>
                                    </div>
                                </div>
                            </fieldset>
                            <br>
                                <fieldset>
                                    <legend>
                                        <i class="zmdi zmdi-key">
                                        </i>
                                        Datos de la cuenta
                                    </legend>
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">
                                                        Nombre de usuario *
                                                    </label>
                                                    <input class="form-control" maxlength="15" name="usuario" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ]{1,15}" required="" type="text" value="<?php echo $row['usuario']; ?>">
                                                    </input>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">
                                                        Contraseña *
                                                    </label>
                                                    <input class="form-control" maxlength="70" name="pass" required="" type="password" value="<?php echo $row['pass']; ?>">
                                                    </input>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">
                                                        Nueva contraseña *
                                                    </label>
                                                    <input class="form-control" maxlength="10" name="contraseña" type="password">
                                                    </input>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">
                                                        Repita la contraseña *
                                                    </label>
                                                    <input class="form-control" maxlength="10" name="password" type="password">
                                                    </input>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <br>
                                    <fieldset>
                                        <legend>
                                            <i class="zmdi zmdi-star">
                                            </i>
                                            Nivel de privilegios
                                        </legend>
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-6">
                                                    <p class="text-left">
                                                        <div class="label label-success">
                                                            Nivel 1
                                                        </div>
                                                        Control total del sistema.
                                                    </p>
                                                    <p class="text-left">
                                                        <div class="label label-primary">
                                                            Nivel 2
                                                        </div>
                                                        Permiso para registro y actualización de su cuenta.
                                                    </p>
                                                </div>
                                                <div class="col-xs-12 col-sm-6">
                                                    <?php if ($row['tipo'] == 'Administrador') {
    echo
        "<div class='radio radio-primary'>
                                                    <label>
                                                        <input checked='true' id='optionsRadios1' name='tipo' type='radio' value='Administrador'>
                                                            <i class='zmdi zmdi-star'>
                                                            </i>
                                                            Administrador
                                                        </input>
                                                    </label>
                                                </div>
                                                <div class='radio radio-primary'>
                                                    <label>
                                                        <input id='optionsRadios2' name='tipo' type='radio' value='Cliente'>
                                                            <i class='zmdi zmdi-star'>
                                                            </i>
                                                            Cliente
                                                        </input>
                                                    </label>
                                                </div>
                                                ";
} else {
    echo "
                                                <div class='radio radio-primary'>
                                                    <label>
                                                        <input id='optionsRadios1' name='tipo' type='radio' value='Administrador'>
                                                            <i class='zmdi zmdi-star'>
                                                            </i>
                                                            Administrador
                                                        </input>
                                                    </label>
                                                </div>
                                                <div class='radio radio-primary'>
                                                    <label>
                                                        <input checked='true' id='optionsRadios2' name='tipo' type='radio' value='Cliente'>
                                                            <i class='zmdi zmdi-star'>
                                                            </i>
                                                            Cliente
                                                        </input>
                                                    </label>
                                                </div>
                                                <div class='radio radio-primary'>
                                                    <label>
                                                        <input checked='true' id='optionsRadios3' name='tipo' type='radio' value='Soporte'>
                                                            <i class='zmdi zmdi-star'>
                                                            </i>
                                                            Soporte
                                                        </input>
                                                    </label>
                                                </div>
                                                ";
}
?>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <p class="text-center" style="margin-top: 20px;">
                                        <button class="btn btn-info btn-raised btn-sm" name="AdministrativaEditarUsuario" type="submit">
                                            <i class="zmdi zmdi-floppy">
                                            </i>
                                            Guardar
                                        </button>
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
