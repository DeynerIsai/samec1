<?php
include_once '../Modelos/Dashboard.php';

class controladorDashboard
{

    //atributos

    private $dashboard;

    //metodos

    public function __construct()
    {
        $this->dashboard = new Dashboard();
    }

    public function consultar()
    {

        $datos = $this->dashboard->consultar();
        return $datos;
    }
}
