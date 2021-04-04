<?php
include_once 'Conexion.php';

class PdfServicios
{

    public function __construct()
    {

        $this->con = new conexion();
    }

    public function set($atributo, $contenido)
    {
        $this->$atributo = $contenido;
    }

    public function get($atributo)
    {
        return $this->$atributo;
    }

    public function listar()
    {
        $sql       = "SELECT * FROM tiposervicio";
        $resultado = $this->con->consultaRetorno($sql);
        return $resultado;
    }

    public function consultar1()
    {
        $sql       = "SELECT count(idtipo) AS Cantidad1 FROM tiposervicio WHERE idservicio=1";
        $resultado = $this->con->consultaRetorno($sql);
        $row       = mysqli_fetch_assoc($resultado);
        return $row;
    }

    public function consultarSW()
    {
        $sql       = "SELECT count(idtipo) AS Cantidad1 FROM tiposervicio WHERE idservicio=1";
        $resultado = $this->con->consultaRetorno($sql);
        $row       = mysqli_fetch_assoc($resultado);
        return $row;
    }
    public function consultarHW()
    {
        $sql       = "SELECT count(idtipo) AS Cantidad2 FROM tiposervicio WHERE idservicio=2";
        $resultado = $this->con->consultaRetorno($sql);
        $row       = mysqli_fetch_assoc($resultado);
        return $row;
    }
    public function consultarNW()
    {
        $sql       = "SELECT count(idtipo) AS Cantidad3 FROM tiposervicio WHERE idservicio=3";
        $resultado = $this->con->consultaRetorno($sql);
        $row       = mysqli_fetch_assoc($resultado);
        return $row;
    }
    public function consultarOT()
    {
        $sql       = "SELECT count(idtipo) AS Cantidad4 FROM tiposervicio WHERE idservicio=4";
        $resultado = $this->con->consultaRetorno($sql);
        $row       = mysqli_fetch_assoc($resultado);
        return $row;
    }
    public function consultarST()
    {
        $sql       = "SELECT count(idtipo) AS Cantidad5 FROM tiposervicio WHERE idservicio=5";
        $resultado = $this->con->consultaRetorno($sql);
        $row       = mysqli_fetch_assoc($resultado);
        return $row;
    }
}
