<?php
include_once '../Controladores/enrutadorMenu.php';

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
            <meta content="IE=edge" http-equiv="X-UA-Compatible">
                <title>
                    Sistema de Administración de Mantenimiento de Equipos de Computo | SAMEC.
                </title>
                <!-- Tell the browser to be responsive to screen width -->
                <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
                    <link href="../Estilos/css/bootstrap.min.css" id="bootstrap-css" rel="stylesheet">
                        <link href="../Estilos/css/login.css" rel="stylesheet">
                        </link>
                    </link>
                </meta>
            </meta>
        </meta>
    </head>
    <body>
        <div class="wrapper">
            <div id="formContent">
                <!-- Tabs Titles -->
                <div>
                    <h4>
                        <b>
                            SAMEC
                        </b>
                    </h4>
                </div>
                <!-- Icon -->
                <div>
                    <img src="../Estilos/Imagenes/login/IconoLogin.ico" alt="User Icon" id="icon">
                </div>
                <!-- Login Form -->
                <form action="../Controladores/controladorEmail.php" method="POST">
                    <!--<input id="txtCorreoElectronico" name="txtCorreoElectronico" placeholder="Correo Electrónico" type="email">
                    </input>-->
                    <div class="loginButton">
                            <input type="submit" value="Enviar Contraseña">
                            </input>
                    </div>
                </form>
                <!-- Remind Passowrd -->
                <div id="formFooter">
                    <a class="underlineHover" href="../Vistas/AdministrativaLogin.php">
                        Volver a iniciar sesión
                    </a>
                </div>
            </div>
        </div>
        <script>
            var url = "<?php echo URL; ?>";
        </script>
        <script src="../Estilos/js/jquery.min.js">
        </script>
        <script src="../Estilos/js/bootstrap.min.js">
        </script>
        <?php if (isset($mensaje)) {?>
        <script>
            window.onload = function(){
                alert('<?php echo $mensaje; ?>');
            }
        </script>
        <?php }?>
        <?php

$enrutadorLoginRecuperar = new enrutadorLoginRecuperar();
if ($enrutadorLoginRecuperar->sendRecoveryCode(@$_GET['cargar'])) {
}
?>
    </body>
</html>