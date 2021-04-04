<?php
require "fpdf.php";
class PDF extends FPDF
{
    public function Header()
    {
        // Logo     el 83 define el tamaño el 10 es un tab, el 8 es lineas
        $this->Image('../Estilos/Imagenes/icons/IconoPDF.png', 10, 8, 30);
        $this->Image('../Estilos/Imagenes/icons/IconoPDF.png', 170, 8, 30);
    }
}
//CREACION DE LA HOJA
$pdf = new PDF('P', 'mm', 'Letter');
$pdf->setMargins(20, 18);
$pdf->AliasNbPages();
$pdf->AddPage();

//TITULO
$pdf->SetTextColor(0x00, 0x00, 0x00);
$pdf->SetFont('Arial', 'b', 10);
$pdf->Cell(0, 5, 'SAMEC', 0, 1, 'C');
$pdf->Cell(0, 5, 'Lista de Categorias registrados', 0, 1, 'C');

//CADENA DE CONEXION
$con = mysqli_connect("localhost", "root", "", "samec");
//salto de linea por cada registro encontrado en la tabla Ln();
$pdf->Ln();

$pdf->Ln();

//1 indica borde, 0 no hace salto de linea, c es centrado

$consulta = 'SELECT nombre, idservicio AS Cantidad FROM tiposervicio WHERE idservicio=5';

$result = mysqli_query($con, $consulta);
$pdf->Ln();
//aqui agregue las cabeceras de las tablas
$pdf->Cell(150, 5, "Nombre", 1, 0, 'C');
$pdf->Cell(25, 5, "ID Servicio", 1, 0, 'C');

while ($row = mysqli_fetch_array($result)) {
    $pdf->Ln();
    $pdf->Cell(150, 5, $row['nombre'], 1, 0, 'C');
    $pdf->Cell(25, 5, $row['Cantidad'], 1, 0, 'C');

    $exec = mysqli_query($con, $consulta);

}
mysqli_close($con);
session_start();
if (@$_SESSION['validada'] == "SI") {
    $pdf->Output();
}
