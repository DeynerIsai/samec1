<?php
class enrutadorServicios
{
    public function cargarVista($vista)
    {
        if (@$_SESSION['validada'] == "SI") {
            switch ($vista) {
                case "AdministrativaRegistrarServicios":
                    include_once '../Vistas/' . $vista . '.php';
                    break;

                case "AdministrativaEditarServicios":
                    include_once '../Vistas/' . $vista . '.php';
                    break;

                case "AdministrativaListarServicios":
                    include_once '../Vistas/' . $vista . '.php';
                    break;

                case "AdministrativaEliminarServicios":
                    include_once '../Vistas/' . $vista . '.php';
                    break;

                case "AdministrativaBuscarServicios":
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
                include_once 'Login.php';
            }

        }
    }
}
