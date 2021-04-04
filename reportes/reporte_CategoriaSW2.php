<?php
session_start();
if ($_SESSION["id_usuario"] == null) {
    header("Location: ../Menu.php");
    exit;
}
?>
<?php
require "../reportes/fpdf.php";
require "../Modelos/Servicios.php";

$nombre = $_GET["nombre"];

ob_end_clean(); //limpia el buffer de salida para poder generar el pdf

class PDF extends FPDF
{
    public function PDF($orientation = 'P', $unit = 'mm', $format = 'letter') //P || L -> Medidas mm pp -> formato

    {
        //Llama al constructor de la clase padre
        $this->FPDF($orientation, $unit, $format);
        //Iniciación de variables
        $this->B    = 0;
        $this->I    = 0;
        $this->U    = 0;
        $this->HREF = '';
    }
    /*             Encabezado de la Página realiza la misma función que Word
     * Para la Imagen: -15 es la Columna se coloca en negativo porque la hoja ya tiene
     * un margen establecido entonces con - evitamos el margen, 2 es la Fila donde iniciara
     * la imagen y 100 se refiere al Tamaño de la imagen, recuerde que la hoja tiene una
     * dimensión dependiendo el tipo de hoja que usted seleccione
     * @param SetFont(). coloca el tipo (Arial), estilo (B=Negrita) y tamaño (16) de la fuente
     * function $this->cell()
     *   @($w =0 Ancho, $h=0 Alto, $txt='' Texto, $border=0 1=todo, $ln=0 Siguiente linea(1),
     * $align='' Alineacion (C,R), $fill=0 relleno(1 si), $link='false' transparencia (true)
     */
    public function Header()
    {

        $this->Image('../Estilos/Imagenes/icons/IconoPDF.png', -15, 2, 100);
        $this->Image('../Estilos/Imagenes/icons/IconoPDF.png', 130, 2, 100);
        $this->SetFont('Arial', 'B', 16);
        //Movernos 10 unidades (Filas)
        $this->Ln(10);
        //Título
        $this->Cell(195, 8, utf8_decode('Lista de Tamaños de la Floreria '), 0, 1, 'C', 0, 'false');
        $this->Cell(195, 8, utf8_decode('"NICTÉ"'), 0, 1, 'C');
        $this->Ln(20);
    }

//Pie de página
    public function Footer()
    {
        //Posición: a 1,5 cm del final
        $this->SetY(-15);
        //Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        //Número de página
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');

        $fecha = date("d/M/o");
        $hora  = date("H:i:s");
        $this->SetFont('Arial', 'B', 9);
        //colocamos el titulo
        $this->SetY(-35);
        $this->Cell(-6, 40, 'Fecha del Reporte: ' . $fecha);

        $this->SetY(-35);
        $this->SetX(160);
        $this->Cell(6, 40, 'Hora del Reporte: ' . $hora);

    }
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$posicionFila = 40;

$pdf->SetFillColor(100, 200, 40);
$pdf->SetFont('Arial', 'B', 12);

$pdf->SetY($posicionFila); //fila
$pdf->SetX(20); //columna
//18 Ancho 5 alto 1 borde, 0 pendiente, C Centrado, 1 Aplica Color
$pdf->Cell(15, 5, 'Nombre', 1, 0, 'C', 1); //$w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link=''

$pdf->SetY($posicionFila);
$pdf->SetX(35);
$pdf->Cell(53, 5, 'ID Servicio', 1, 0, 'C', 1);

$contadorFilas = 0;
$posicionFila  = 45;

$listaTamanio = Servicios::filtra($nombre);
if (count($listaTamanio) > 0) {
    $estado = 0;
    foreach ($listaTamanio as $lista) {
        if ($estado == 0) {
            $pdf->SetFillColor(190, 255, 190);
            $pdf->SetFont('Courier', '', 8);
            $estado = 1;
        } else {
            $pdf->SetFillColor(25, 255, 90);
            $pdf->SetFont('Courier', '', 8);
            $estado = 0;
        }
        $pdf->SetY($posicionFila);
        $pdf->SetX(20);
        $pdf->Cell(15, 4, $lista['nombre'], 1, 0, 'C');

        $pdf->SetY($posicionFila);
        $pdf->SetX(35);
        $pdf->Cell(15, 4, $lista['Cantidad'], 1, 0, 'C');

        $posicionFila += 4;
        $contadorFilas++;

        if ($contadorFilas == 30) {
            $pdf->AddPage();
            $contadorFilas = 0;
            $posicionFila  = 45;
        }
    }
} else {
    $pdf->SetY($posicionFila);
    $pdf->SetFont('Courier', 'B', 12);
    $pdf->Cell(195, 8, utf8_decode('No existen Tamaños con los Criterios de Búsqueda'), 1, 0, 'C', 1);
}

$pdf->Output();
