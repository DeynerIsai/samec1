<?php
include_once '../Modelos/PdfServicios.php';

class controladorPdfServicios
{

    //atributos

    private $pdfservicios;

    //metodos

    public function __construct()
    {
        $this->pdfservicios = new PdfServicios();
    }

    public function consultarSW()
    {
        $datos = $this->pdfservicios->consultarSW();
        return $datos;
    }
    public function consultarHW()
    {
        $datos = $this->pdfservicios->consultarHW();
        return $datos;
    }

    public function consultarNW()
    {
        $datos = $this->pdfservicios->consultarNW();
        return $datos;
    }
    public function consultarOT()
    {
        $datos = $this->pdfservicios->consultarOT();
        return $datos;
    }
    public function consultarST()
    {
        $datos = $this->pdfservicios->consultarST();
        return $datos;
    }
}
