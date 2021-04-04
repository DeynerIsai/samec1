<?php
include_once 'Conexion.php';

class Servicios
{

    //atributos

    private $idtipo;
    private $nombre;
    private $precio;
    private $idservicio;
    private $con;

    //metodos

    public function __construct()
    {

        $this->con = new Conexion();
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
        $sql       = "SELECT idtipo,tiposervicio.nombre as servicio,precio,categoriaservicio.nombre as categoria FROM tiposervicio, categoriaservicio WHERE tiposervicio.idservicio=categoriaservicio.idservicio;";
        $resultado = $this->con->consultaRetorno($sql);
        return $resultado;
    }

    public function crear()
    {
        $sql = "INSERT INTO tiposervicio (idtipo,nombre,precio,idservicio)
                VALUES($this->idtipo,'{$this->servicio}',$this->precio,$this->idservicio);";
        $this->con->consultaSimple($sql);
        return true;
    }

    public function eliminar()
    {
        $sql       = "DELETE FROM tiposervicio WHERE idtipo='{$this->idtipo}'";
        $resultado = $this->con->consultaSimple($sql);
    }

    public function filtrar($idtipo)
    {

        $sql       = "SELECT * FROM tiposervicio WHERE nombre LIKE '%$idtipo' OR idtipo LIKE '%$idtipo' OR precio LIKE '%$idtipo'";
        $resultado = $this->con->consultaRetorno($sql);
        return $resultado;
    }
    public function filtrarTipo($idtipo)
    {
        $sql       = "SELECT * FROM tiposervicio WHERE idtipo='$idtipo' AND categoria='$categoria'";
        $resultado = $this->con->consultaRetorno($sql);
        return $resultado;
    }
    public function filtrarPorEncargado($valor)
    {
        $sql       = "SELECT * FROM tiposervicio WHERE idservicio='$valor' AND estado=1";
        $resultado = $this->con->consultaRetorno($sql);
        return $resultado;
    }
    public function consultar()
    {
        $sql       = "SELECT * FROM tiposervicio WHERE idtipo=$this->idtipo";
        $resultado = $this->con->consultaRetorno($sql);
        $row       = mysqli_fetch_assoc($resultado);
        //set
        $this->id_lugar  = $row['idtipo'];
        $this->nombre    = $row['nombre'];
        $this->tipo      = $row['precio'];
        $this->distancia = $row['idservicio'];
        return $row;
    }

    public function editar()
    {
        $sql = "UPDATE tiposervicio SET nombre='{$this->nombre}',
        precio=$this->precio,idservicio=$this->idservicio
         WHERE idtipo=$this->idtipo";
        $this->con->consultaSimple($sql);
        return true;
    }
}
