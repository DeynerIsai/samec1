<?php
include_once '../Modelos/Servicios.php';

class controladorServicios
{

    //atributos

    private $servicios;

    //metodos

    public function __construct()
    {
        $this->servicios = new Servicios();
    }
    public function index()
    {
        $resultado = $this->servicios->listar();
        return $resultado;
    }
    public function crear($idtipo, $servicio, $precio, $idservicio)
    {
        $this->servicios->set("idtipo", $idtipo);
        $this->servicios->set("servicio", $servicio);
        $this->servicios->set("precio", $precio);
        $this->servicios->set("idservicio", $idservicio);
        $resultado = $this->servicios->crear();
        return $resultado;
    }

    public function eliminar($idtipo)
    {
        $this->servicios->set("idtipo", $idtipo);
        $this->servicios->eliminar();
    }
    public function consultar($idtipo)
    {
        $this->servicios->set("idtipo", $idtipo);
        $datos = $this->servicios->consultar();
        return $datos;
    }
    public function editar($idtipo, $nombre, $precio, $idservicio)
    {
        $this->servicios->set("idtipo", $idtipo);
        $this->servicios->set("nombre", $nombre);
        $this->servicios->set("precio", $precio);
        $this->servicios->set("idservicio", $idservicio);
        //$this->servicios->consultarcategoria();
        $resultado = $this->servicios->editar();
        return $resultado;
    }
}
