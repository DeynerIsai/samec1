<!DOCTYPE html>
<html lang="es">
    <head>
        <title>
            Sistema de Administración de Mantenimiento de Equipos de Computo- SAMEC
        </title>
        <meta charset="utf-8">
            <meta content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" name="viewport">
                <link href="../Estilos/css/main.css" rel="stylesheet">
                    <link href="../Estilos/css/bootstrap.min.css" rel="stylesheet" type="text/css">
                        <link href="../Estilos/Imagenes/icons/Icono2.png" rel="icon" type="text/css">
                        </link>
                    </link>
                </link>
            </meta>
        </meta>
    </head>
    <body>
        <div class="full-box login-container cover">
        <form action="../Controladores/controladorLogin.php" method="POST" class="logInForm">
            <p class="text-center text-muted"><i class="zmdi zmdi-account-circle zmdi-hc-5x"></i></p>
            <p class="text-center text-muted text-uppercase">Iniciar sesión</p>
            <div class="form-group label-floating">
                <!--Estilo diferente zmdi zmdi-account y zmdi zmdi-key para los labels-->
                <label class="control-label" for="UserName">Usuario</label>
                <input class="form-control" type="text" required="Ingrese su Usuario" name="usuario">
                <p class="help-block">Escribe tú nombre de usuario</p>
            </div>
            <div class="form-group label-floating">
                <label class="control-label" for="UserPass">Contraseña</label>
                <input class="form-control" type="password" required="Ingrese Su Contraseña" name="password">
                <p class="help-block">Escribe tú contraseña</p>
            </div>
            <div class="form-group text-center">
                <input type="submit" value="Iniciar sesión" name="entrar" class="btn btn-default" style="color: #000000;">
            </div>
        </form>
        </div>
        <!--====== Scripts -->
        <script src="../Estilos/js/main.js">
        </script>
        <script src="../Estilos/js/jquery-3.1.1.min.js">
        </script>
        <script src="../Estilos/js/bootstrap.min.js">
        </script>
        <script src="../Estilos/js/material.min.js">
        </script>
        <script src="../Estilos/js/ripples.min.js">
        </script>
        <script src="../Estilos/js/sweetalert2.min.js">
        </script>
        <script src="../Estilos/js/jquery.mCustomScrollbar.concat.min.js">
        </script>
        <script src="../Estilos/js/main.js">
        </script>
        <script>
            $.material.init();
        </script>
    </body>
</html>
