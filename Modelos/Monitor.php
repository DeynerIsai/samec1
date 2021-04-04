<?php
include_once('Conexion.php');

class Monitor{

	
	//atributos

	private $idMonitor;
	private	$marca;
	private $modelo;
	private	$numeroInventario;
	private $numeroSerie;
    private $idEquipo;
    private $codigoqr;
	private $con;


	//metodos

	public function __construct(){

		$this->con = new conexion();
	}

	public function set($atributo,$contenido){
		$this->$atributo=$contenido;
	}

	public function get($atributo){
		return $this->$atributo;
	}

	public function listar(){
		$sql = "SELECT * FROM monitores;";
		$resultado = $this->con->consultaRetorno($sql);
		return $resultado;
	}
	
	public function crear(){

		$sql = "INSERT INTO monitores(idMonitor,marca,modelo,numeroInventario,numeroSerie,idEquipo,codigoqr)
				VALUES($this->idMonitor,'{$this->marca}','{$this->modelo}','{$this->numeroInventario}','{$this->numeroSerie}',{$this->idEquipo},'{$this->codigoqr}');";
		$this->con->consultaSimple($sql);
		return true;		
	}

	public function eliminar(){
		$sql = "DELETE FROM monitores WHERE idMonitor={$this->idMonitor}";
		$resultado = $this->con->consultaSimple($sql);
	}

	public function filtrar($valor){
		$sql = "SELECT * FROM monitores WHERE marca LIKE '%$valor%' OR numeroSerie LIKE '%$valor%' OR modelo LIKE '%$valor%'";
		$resultado = $this->con->consultaRetorno($sql);
		return $resultado;
	}
	public function filtrarTipo($valor){
		$sql = "SELECT * FROM monitores WHERE tipo='$valor' AND estado=1";
		$resultado = $this->con->consultaRetorno($sql);
		return $resultado;
	}
	public function filtrarPorEncargado($valor){
		$sql = "SELECT * FROM monitores WHERE hardwareAdicional='$valor' AND estado=1";
		$resultado = $this->con->consultaRetorno($sql);
		return $resultado;
	}
	public function consultar(){
		$sql = "SELECT * FROM monitores WHERE idMonitor='{$this->idMonitor}'";
		$resultado = $this->con->consultaRetorno($sql);
		$row = mysqli_fetch_assoc($resultado);
		//set
		$this->idMonitor=$row['idMonitor'];
		$this->marca=$row['marca'];
		$this->modelo=$row['modelo'];
		$this->numeroInventario=$row['numeroInventario'];
		$this->numeroSerie=$row['numeroSerie'];
		$this->idEquipo=$row['idEquipo'];
        $this->codigoqr=$row['codigoqr'];
		return $row;
	}

	public function editar(){
		$sql="UPDATE monitores SET marca='{$this->marca}',modelo='{$this->modelo}',numeroInventario='{$this->numeroInventario}',
        numeroSerie='{$this->numeroSerie}',idEquipo={$this->idEquipo},codigoqr='{$this->codigoqr}' WHERE idMonitor={$this->idMonitor}";
				$this->con->consultaSimple($sql);
				return true;
	}
}
?>
