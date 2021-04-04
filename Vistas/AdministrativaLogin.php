<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
            <meta content="IE=edge" http-equiv="X-UA-Compatible">
                <title>
                    Sistema de Administración de Mantenimiento de Equipos de Computo | SAMEC.
                </title>
                <!-- Tell the browser to be responsive to screen width -->
                <meta charset="utf-8">
                    <meta content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" name="viewport">
                        <link href="../Estilos/css/bootstrap.min.css" id="bootstrap-css" rel="stylesheet">
                            <link href="../Estilos/Imagenes/icons/Icono2.ico" rel="icon" type="text/css">
                                <link href="../Estilos/css/Login.css" rel="stylesheet" type="text/css">
                                </link>
                            </link>
                        </link>
                    </meta>
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
                    <img alt="User Icon" id="icon" src="../Estilos/Imagenes/login/IconoLogin.ico">
                    </img>
                </div>
                <!-- Login Form -->
                <form action="../Controladores/controladorLogin.php" class="logInForm" method="POST">
                    <input id="txtUsuario" name="usuario" placeholder="Ingrese su Usuario" type="text">
                        <input id="password" name="password" placeholder="Contraseña" required="Ingrese Su Contraseña" type="password">
                            <div class="loginButton">
                                <input name="entrar" type="submit" value="Iniciar sesión">
                                </input>
                            </div>
                        </input>
                    </input>
                </form>
                <!-- Remind Passowrd -->
                <div id="formFooter">
                    <!--<a class="underlineHover" href="<?php echo URL; ?>login/register">
                        No tienes cuenta, registrate.
                    </a>-->
                    <br>
                        <a class="underlineHover" href="../Vistas/AdministrativaRecuperarCuenta.php">
                            ¿Olvidaste la contraseña?
                        </a>
                    </br>
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
    </body>
</html>