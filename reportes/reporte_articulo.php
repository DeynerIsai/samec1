<?php
require "fpdf.php";
class PDF extends FPDF{
  function Header()
{
    // Logo     el 83 define el tamaño el 10 es un tab, el 8 es lineas
    $this->Image('../img/logo-completo.png',10,8,30);
    $this->Image('../img/logo.png',170,8,30);
}
}
//CREACION DE LA HOJA
$pdf = new PDF('P', 'mm','Letter');
$pdf->setMargins(20,18);
$pdf->AliasNbPages();
$pdf->AddPage();

//TITULO
$pdf->SetTextColor(0x00,0x00,0x00);
$pdf->SetFont('Arial','b',7);
$pdf->Cell(0,5,'Boutique Carol Fashion',0,1,'C');
$pdf->Cell(0,5,'Lista de artículos registrados',0,1,'C');


//CADENA DE CONEXION
$con = mysqli_connect("localhost","root","","integradora");
//salto de linea por cada registro encontrado en la tabla Ln();
  $pdf->Ln();

  $pdf->Ln();
  
  //1 indica borde, 0 no hace salto de linea, c es centrado

 
$consulta = "select id_Art,marca,precio,cantidad,color,num_Talla from articulos";
  
$result = mysqli_query($con,$consulta);
$pdf->Ln();
    //aqui agregue las cabeceras de las tablas
    $pdf->Cell(30,5, "Id Artículo",1,0,'C');
    $pdf->Cell(30,5, "Marca",1,0,'C');
    $pdf->Cell(30,5, "Precio",1,0,'C');
    $pdf->Cell(30,5, "Cantidad",1,0,'C');
    $pdf->Cell(30,5, "color",1,0,'C');
    $pdf->Cell(30,5, "Número de talla",1,0,'C');
while($row = mysqli_fetch_array($result)){ 
    $pdf->Ln();
    $pdf->Cell(30,5, $row['id_Art'],1,0,'C');
    $pdf->Cell(30,5, $row['marca'],1,0,'C');
    $pdf->Cell(30,5, $row['precio'],1,0,'C');
    $pdf->Cell(30,5, $row['cantidad'],1,0,'C');
    $pdf->Cell(30,5, $row['color'],1,0,'C');
    $pdf->Cell(30,5, $row['num_Talla'],1,0,'C');
  
 
  
 
 
    $exec=mysqli_query($con,$consulta); 


  
  }  

  mysqli_close($con);
  session_start();
  if(@$_SESSION['validada']=="SI")
    $pdf->Output();
?>