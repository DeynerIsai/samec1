 <?php
include_once '../Modelos/Equipo.php';
require "codigo_qr/phpqrcode/qrlib.php";
class controladorEquipo
{

    //atributos

    private $equipo;

    //metodos

    public function __construct()
    {
        $this->equipo = new Equipo();
    }
    public function index()
    {
        $resultado = $this->equipo->listar();
        return $resultado;
    }
    public function crear($idEquipo, $idCliente, $idEncargado, $marca, $tipo, $modelo, $numeroSerie, $numeroInventario, $procesador, $ram, $discoDuro, $cdDrive, $hardwareAdicional, $observaciones, $macaddress, $ipaddress, $softwares)
    {
        //Agregamos la libreria para genera códigos QR

        //Declaramos una carpeta temporal para guardar la imagenes generadas
        $dir = 'QRs/';

        //Si no existe la carpeta la creamos
        if (!file_exists($dir)) {
            mkdir($dir);
        }

        //Declaramos la ruta y nombre del archivo a generar
        $filename = $dir . 'QR' . $idEquipo . '.png';
        $codigoqr = 'QR' . $idEquipo . '.png';
        //Parametros de Condiguración

        $tamaño  = 10; //Tamaño de Pixel
        $level    = 'H'; //Precisión Baja
        $framSize = 3; //Tamaño en blanco
        //$contenido = "192.168.43.172/SAMEC1/Vistas/Menu.php?cargar=AdministrativaEditarEquipo&idEquipo=".$idEquipo; //Texto
        $contenido = "ID: " . $idEquipo . "\n" . "CLIENTE: " . $idCliente . "\n" . "ENCARGADO: " . $idEncargado . "\n" . "MARCA: " . $marca . "\nTIPO: " . $tipo . "\nMODELO: " . $modelo . "\nNUMERO DE SERIE: " . $numeroSerie . "\nNUMERO DE INVENTARIO: " . $numeroInventario . "\nPROCESADOR: " . $procesador . "\nRAM: " . $ram . "\nDISCO DURO: " . $discoDuro . "\nCD DRIVE: " . $cdDrive . "\nHARDWARE ADICIONAL: " . $hardwareAdicional . "\nOBSERVACIONES: " . $observaciones . "\nMAC: " . $macaddress . "\nIP: " . $ipaddress . "\nSoftwares: " . $softwares; //Texto
        //Enviamos los parametros a la Función para generar código QR
        QRcode::png($contenido, $filename, $level, $tamaño, $framSize);
        $this->equipo->set("idEquipo", $idEquipo);
        $this->equipo->set("idCliente", $idCliente);
        $this->equipo->set("id_usuario", $idEncargado);
        $this->equipo->set("marca", $marca);
        $this->equipo->set("tipo", $tipo);
        $this->equipo->set("modelo", $modelo);
        $this->equipo->set("numeroSerie", $numeroSerie);
        $this->equipo->set("numeroInventario", $numeroInventario);
        $this->equipo->set("procesador", $procesador);
        $this->equipo->set("ram", $ram);
        $this->equipo->set("discoDuro", $discoDuro);
        $this->equipo->set("cdDrive", $cdDrive);
        $this->equipo->set("hardwareAdicional", $hardwareAdicional);
        $this->equipo->set("observaciones", $observaciones);
        $this->equipo->set("codigoqr", $codigoqr);
        $this->equipo->set("macaddress", $macaddress);
        $this->equipo->set("ipaddress", $ipaddress);
        $this->equipo->set("softwares", $softwares);
        $resultado = $this->equipo->crear();
        return $resultado;

    }

    public function eliminar($idEquipo)
    {
        $this->equipo->set("idEquipo", $idEquipo);
        $this->equipo->eliminar();
    }
    public function consultar($idEquipo)
    {
        $this->equipo->set("idEquipo", $idEquipo);
        $datos = $this->equipo->consultar();
        return $datos;
    }
    public function editar($idEquipo, $idCliente, $idEncargado, $marca, $tipo, $modelo, $numeroSerie, $numeroInventario, $procesador, $ram, $discoDuro, $cdDrive, $hardwareAdicional, $observaciones, $macaddress, $ipaddress, $softwares)
    {
        //Agregamos la libreria para genera códigos QR

        //Declaramos una carpeta temporal para guardar la imagenes generadas
        $dir = 'QRs/';

        //Si no existe la carpeta la creamos
        if (!file_exists($dir)) {
            mkdir($dir);
        }

        //Declaramos la ruta y nombre del archivo a generar
        $filename = $dir . 'QR' . $idEquipo . '.png';
        $codigoqr = 'QR' . $idEquipo . '.png';
        //Parametros de Condiguración

        $tamaño  = 10; //Tamaño de Pixel
        $level    = 'H'; //Precisión Baja
        $framSize = 3; //Tamaño en blanco
        //$contenido = "192.168.43.172/SAMEC1/Vistas/Menu.php?cargar=AdministrativaEditarEquipo&idEquipo=".$idEquipo; //Texto
        $contenido = "ID: " . $idEquipo . "\n" . "CLIENTE: " . $idCliente . "\n" . "ENCARGADO: " . $idEncargado . "\n" . "MARCA: " . $marca . "\nTIPO: " . $tipo . "\nMODELO: " . $modelo . "\nNUMERO DE SERIE: " . $numeroSerie . "\nNUMERO DE INVENTARIO: " . $numeroInventario . "\nPROCESADOR: " . $procesador . "\nRAM: " . $ram . "\nDISCO DURO: " . $discoDuro . "\nCD DRIVE: " . $cdDrive . "\nHARDWARE ADICIONAL: " . $hardwareAdicional . "\nOBSERVACIONES: " . $observaciones . "\nMAC: " . $macaddress . "\nIP: " . $ipaddress . "\nSoftwares: " . $softwares; //Texto
        //Enviamos los parametros a la Función para generar código QR
        QRcode::png($contenido, $filename, $level, $tamaño, $framSize);
        $this->equipo->set("idEquipo", $idEquipo);
        $this->equipo->set("idCliente", $idCliente);
        $this->equipo->set("id_usuario", $idEncargado);
        $this->equipo->set("marca", $marca);
        $this->equipo->set("tipo", $tipo);
        $this->equipo->set("modelo", $modelo);
        $this->equipo->set("numeroSerie", $numeroSerie);
        $this->equipo->set("numeroInventario", $numeroInventario);
        $this->equipo->set("procesador", $procesador);
        $this->equipo->set("ram", $ram);
        $this->equipo->set("discoDuro", $discoDuro);
        $this->equipo->set("cdDrive", $cdDrive);
        $this->equipo->set("hardwareAdicional", $hardwareAdicional);
        $this->equipo->set("observaciones", $observaciones);
        $this->equipo->set("codigoqr", $codigoqr);
        $this->equipo->set("macaddress", $macaddress);
        $this->equipo->set("ipaddress", $ipaddress);
        $this->equipo->set("softwares", $softwares);
        $resultado = $this->equipo->editar();
        return $resultado;
    }

}
?>
