<?php
include_once 'Conexion.php';

class Dashboard
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

    public function consultar()
    {
        $sql       = "SELECT COUNT(id_usuario) AS usuario FROM usuarios WHERE estado=1";
        $resultado = $this->con->consultaRetorno($sql);
        $row       = mysqli_fetch_assoc($resultado);
        return $row;
    }
    public function consultarCT()
    {
        $sql       = "SELECT COUNT(id_usuario) AS Nombre FROM usuarios WHERE tipo='Cliente'";
        $resultado = $this->con->consultaRetorno($sql);
        $row       = mysqli_fetch_assoc($resultado);
        return $row;
    }
    public function consultarSV()
    {
        $sql       = "SELECT COUNT(idtipo) AS Servicio FROM tiposervicio WHERE idtipo=idtipo";
        $resultado = $this->con->consultaRetorno($sql);
        $row       = mysqli_fetch_assoc($resultado);
        return $row;
    }
}
