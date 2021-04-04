 <?php
include_once '../Modelos/Usuario.php';
class enrutadorMenu
{
    public function cargarVista($vista)
    {
        if (@$_SESSION['validada'] == "SI") {
            switch ($vista) {
                case "Home":
                    include_once '../Vistas/' . $vista . '.php';
                    break;
                case "Menu":
                    include_once '../Vistas/' . $vista . '.php';
                    break;
                case "AdministrativaMiCuenta":
                    include_once '../Vistas/' . $vista . '.php';
                    break;
                case "AdministrativaMisDatos":
                    include_once '../Vistas/' . $vista . '.php';
                    break;
                case "AdministrativaRegistrarAdministrador":
                    include_once '../Vistas/' . $vista . '.php';
                    break;
                case "AdministrativaListarUsuario":
                    include_once '../Vistas/' . $vista . '.php';
                    break;
                case "AdministrativaListarServicios":
                    include_once '../Vistas/' . $vista . '.php';
                    break;
                case "AdministrativaRegistrarUsuario":
                    include_once '../Vistas/' . $vista . '.php';
                    break;
                case "AdministrativaEditarUsuario":
                    include_once '../Vistas/' . $vista . '.php';
                    break;
                case "AdministrativaEliminarUsuario":
                    include_once '../Vistas/' . $vista . '.php';
                    break;
                case "AdministrativaBuscarUsuario":
                    include_once '../Vistas/' . $vista . '.php';
                    break;
                case "AdministrativaReporteServicios":
                    include_once '../Vistas/' . $vista . '.php';
                    break;
                case "AdministrativaListarEquipo":
                    include_once '../Vistas/' . $vista . '.php';
                    break;
                case "Ventas":
                    include_once '../Vistas/' . $vista . '.php';
                    break;
                case "MenuSoporte":
                    include_once '../Vistas/' . $vista . '.php';
                    break;
                case "Cerrar":
                    $usuario = new Usuario();
                    $usuario->salidaUsuario($_SESSION['id_bitacora']);
                    session_destroy();
                    echo "<script>window.location='AdministrativaLogin.php'</script>";
                    break;
            }
        } else {
            session_destroy();
            echo "
                <script language='JavaScript'>alert('No existe una sesión iniciada');window.location.href='../Vistas/AdministrativaLogin.php'
                </script>";

        }
    }

    public function validarGet($variable)
    {
        if (isset($variable)) {
            return true;
        } else {
            if (@$_SESSION['validada'] == "SI") {
                include_once '../Vistas/AdministrativaLogin.php';
            }

        }
    }
}
?>