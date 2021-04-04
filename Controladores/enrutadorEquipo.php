<?php
class enrutadorEquipo
{
    public function cargarVista($vista)
    {
        if (@$_SESSION['validada'] == "SI") {
            switch ($vista) {
                case "AdministrativaRegistrarEquipo":
                    include_once '../Vistas/' . $vista . '.php';
                    break;

                case "AdministrativaEditarEquipo":
                    include_once '../Vistas/' . $vista . '.php';
                    break;

                case "AdministrativaListarEquipo":
                    include_once '../Vistas/' . $vista . '.php';
                    break;

                case "AdministrativaEliminarEquipo":
                    include_once '../Vistas/' . $vista . '.php';
                    break;

                case "AdministrativaBuscarEquipo":
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
