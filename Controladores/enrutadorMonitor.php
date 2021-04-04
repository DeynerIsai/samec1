<?php
class enrutadorMonitor
{
    public function cargarVista($vista)
    {
        if (@$_SESSION['validada'] == "SI") {
            switch ($vista) {
                case "AdministrativaRegistrarMonitor":
                    include_once '../Vistas/' . $vista . '.php';
                    break;

                case "AdministrativaEditarMonitor":
                    include_once '../Vistas/' . $vista . '.php';
                    break;

                case "AdministrativaListarMonitor":
                    include_once '../Vistas/' . $vista . '.php';
                    break;

                case "AdministrativaEliminarMonitor":
                    include_once '../Vistas/' . $vista . '.php';
                    break;

                case "AdministrativaBuscarMonitor":
                    include_once '../Vistas/' . $vista . '.php';
                    break;
            }
        } else {
            include_once 'Login.php';
        }
    }

    public function validarGet($variable)
    {
        if (isset($variable)) {
            return true;
        } else {
            if (@$_SESSION['validada'] !== "SI") {
                include_once '../Vistas/AdministrativaLogin.php';
            }

        }
    }
}
