<?php
include_once ('../Modelos/Monitor.php');
// require "codigo_qr/phpqrcode/qrlib.php";
class controladorMonitor{

	//atributos

	private $monitor;

	//metodos

	public function __construct(){
		$this->monitor = new Monitor();
	}
	public function index(){
		$resultado = $this->monitor->listar();
		return $resultado;
	}
	public function crear($idMonitor,$marca,$modelo,$numeroSerie,$numeroInventario,$idEquipo){
	//Agregamos la libreria para genera códigos QR
	//Declaramos una carpeta temporal para guardar la imagenes generadas
	$dir = 'MonitorQRs/';
	
	//Si no existe la carpeta la creamos
	if (!file_exists($dir))
        mkdir($dir);
	
        //Declaramos la ruta y nombre del archivo a generar
	$filename = $dir.'QR'.$idMonitor.'.png';
 	$codigoqr='QR'.$idMonitor.'.png';
        //Parametros de Condiguración
	
	$tamaño = 10; //Tamaño de Pixel
	$level = 'L'; //Precisión Baja
	$framSize = 3; //Tamaño en blanco
	//$contenido = "192.168.43.172/SAMEC1/Vistas/Menu.php?cargar=AdministrativaEditarEquipo&idEquipo=".$idEquipo; //Texto
	$contenido = $idMonitor." ".$marca." ".$modelo." ".$numeroSerie." ".$numeroInventario." ".$idEquipo;
	 //Texto
        //Enviamos los parametros a la Función para generar código QR 
	QRcode::png($contenido, $filename, $level, $tamaño, $framSize); 
	$this->monitor->set("idMonitor", $idMonitor);
		$this->monitor->set("marca", $marca); 
		$this->monitor->set("modelo", $modelo); 
		$this->monitor->set("numeroSerie", $numeroSerie);
		$this->monitor->set("numeroInventario", $numeroInventario);
		$this->monitor->set("idEquipo", $idEquipo);
		$this->monitor->set("codigoqr", $codigoqr); 
		$resultado = $this->monitor->crear();	
		return $resultado; 
  
	}   
	
	public function eliminar($idMonitor){
		$this->monitor->set("idMonitor", $idMonitor);
		$this->monitor->eliminar();
	}
	public function consultar($idMonitor){
		$this->monitor->set("idMonitor", $idMonitor);
		$datos = $this->monitor->consultar();
		return $datos;
	}
	public function editar($idMonitor,$marca,$modelo,$numeroSerie,$numeroInventario,$idEquipo){
		//Agregamos la libreria para genera códigos QR
	//Declaramos una carpeta temporal para guardar la imagenes generadas
	$dir = 'MonitorQRs/';
	
	//Si no existe la carpeta la creamos
	if (!file_exists($dir))
        mkdir($dir);
	
        //Declaramos la ruta y nombre del archivo a generar
	$filename = $dir.'QR'.$idMonitor.'.png';
 	$codigoqr='QR'.$idMonitor.'.png';
        //Parametros de Condiguración
	
	$tamaño = 10; //Tamaño de Pixel
	$level = 'L'; //Precisión Baja
	$framSize = 3; //Tamaño en blanco
	//$contenido = "192.168.43.172/SAMEC1/Vistas/Menu.php?cargar=AdministrativaEditarEquipo&idEquipo=".$idEquipo; //Texto
	$contenido = $idMonitor." ".$marca." ".$modelo." ".$numeroSerie." ".$numeroInventario." ".$idEquipo;
	 //Texto
        //Enviamos los parametros a la Función para generar código QR 
	QRcode::png($contenido, $filename, $level, $tamaño, $framSize); 
		$this->monitor->set("idMonitor", $idMonitor);
		$this->monitor->set("marca", $marca); 
		$this->monitor->set("modelo", $modelo); 
		$this->monitor->set("numeroSerie", $numeroSerie);
		$this->monitor->set("numeroInventario", $numeroInventario);
		$this->monitor->set("idEquipo", $idEquipo);
		$this->monitor->set("codigoqr", $codigoqr);
		$resultado = $this->monitor->editar();
		return $resultado;
	}
	
 }
?>	
