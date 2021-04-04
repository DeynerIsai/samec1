<?php
include_once 'Conexion.php';

class Equipo
{

    //atributos

    private $idEquipo;
    private $idCliente;
    private $id_usuario;
    private $marca;
    private $tipo;
    private $modelo;
    private $numeroInventario;
    private $numeroSerie;
    private $procesador;
    private $ram;
    private $discoDuro;
    private $cdDrive;
    private $hardwareAdicional;
    private $observaciones;
    private $codigoqr;
    private $macaddress;
    private $ipaddress;
    private $softwares;
    private $con;

    //metodos

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
        $sql       = "SELECT *,(SELECT CONCAT(marca,modelo,numeroserie) FROM monitores WHERE equipos.idMonitor=monitores.idMonitor) AS displayId FROM equipos;";
        $resultado = $this->con->consultaRetorno($sql);
        return $resultado;
    }

    public function crear()
    {

        $sql = "INSERT INTO equipos (idEquipo,idCliente,id_usuario,marca,tipo,modelo,numeroInventario,numeroSerie,procesador,ram,discoDuro,cdDrive,hardwareAdicional,observaciones,codigoqr,macaddress,ipaddress,softwares)
                VALUES($this->idEquipo,$this->idCliente,$this->id_usuario,'{$this->marca}','{$this->tipo}','{$this->modelo}','{$this->numeroInventario}','{$this->numeroSerie}','{$this->procesador}','{$this->ram}','{$this->discoDuro}','{$this->cdDrive}','{$this->hardwareAdicional}','{$this->observaciones}','{$this->codigoqr}','{$this->macaddress}','{$this->ipaddress}','{$this->softwares}');";

        $this->con->consultaSimple($sql);
        return true;
    }

    public function eliminar()
    {
        $sql       = "DELETE FROM equipos WHERE idEquipo='{$this->idEquipo}'";
        $resultado = $this->con->consultaSimple($sql);
    }

    public function filtrar($valor)
    {
        $sql       = "SELECT * FROM equipos WHERE marca LIKE '%$valor%' OR tipo LIKE '%$valor%' OR modelo LIKE '%$valor%'";
        $resultado = $this->con->consultaRetorno($sql);
        return $resultado;
    }
    public function filtrarTipo($valor)
    {
        $sql = "SELECT * FROM equipos WHERE tipo='$valor' AND estado=1 ORDER BY idEquipo DESC";

        //Bro ya voy para servicrece, ya vino el ing, ok aguanta deja poner esto nomas
        $resultado = $this->con->consultaRetorno($sql);
        return $resultado;
    }
    public function filtrarPorEncargado($valor)
    {
        $sql       = "SELECT * FROM equipos WHERE id_usuario='$valor'  ORDER BY idEquipo DESC";
        $resultado = $this->con->consultaRetorno($sql);
        return $resultado;
    }
    public function consultar()
    {
        $sql       = "SELECT * FROM equipos WHERE idEquipo='{$this->idEquipo}'";
        $resultado = $this->con->consultaRetorno($sql);
        $row       = mysqli_fetch_assoc($resultado);
        //set
        $this->idEquipo          = $row['idEquipo'];
        $this->idCliente         = $row['idCliente'];
        $this->id_usuario        = $row['id_usuario'];
        $this->marca             = $row['marca'];
        $this->tipo              = $row['tipo'];
        $this->modelo            = $row['modelo'];
        $this->numeroInventario  = $row['numeroInventario'];
        $this->numeroSerie       = $row['numeroSerie'];
        $this->procesador        = $row['procesador'];
        $this->ram               = $row['ram'];
        $this->discoDuro         = $row['discoDuro'];
        $this->cdDrive           = $row['cdDrive'];
        $this->hardwareAdicional = $row['hardwareAdicional'];
        $this->observaciones     = $row['observaciones'];
        $this->codigoqr          = $row['codigoqr'];
        $this->macaddress        = $row['macaddress'];
        $this->ipaddress         = $row['ipaddress'];
        $this->softwares         = $row['softwares'];

        return $row;
    }

    public function editar()
    {
        $sql = "UPDATE equipos SET idCliente={$this->idCliente},id_usuario={$this->id_usuario},marca='{$this->marca}',
        tipo='{$this->tipo}',modelo='{$this->modelo}',numeroInventario='{$this->numeroInventario}',
        numeroSerie='{$this->numeroSerie}',procesador='{$this->procesador}',
        ram='{$this->ram}',discoDuro='{$this->discoDuro}',
        cdDrive='{$this->cdDrive}',hardwareAdicional='{$this->hardwareAdicional}',observaciones='{$this->observaciones}',codigoqr='{$this->codigoqr}',macaddress='{$this->macaddress}',ipaddress='{$this->ipaddress}',softwares='{$this->softwares}' WHERE idEquipo={$this->idEquipo}";
        $this->con->consultaSimple($sql);
        return true;
    }
}
