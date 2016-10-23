<?php  

/*
      if (isset($_POST['agreg'])) {
             carritoingreso($_POST['code']);
             SubirImg($_FILES['imgprod']);
             //echo "<script>window.location='./inicio.php?op=6';</script>";
            // echo "<script>alert('jerusalem')</script>";
      }
      if (isset($_POST['agr'])) {
            carritoingreso($_POST['nombre']);
             
             //echo "<script>window.location='./inicio.php?op=6';</script>";
             //echo "<script>alert('jerusalem')</script>";
      }
*/
      /*ESTE CODIGO ES ELABOARO 100% DE LA AUTORÍA DE ERIC JOSE MARTINEZ MUENTES PAGINAS OFFICIALES FB 
                facebook.com/ejmm19
                mobiliariosfamarsa.com*//*ESTE CODIGO ES ELABOARO 100% DE LA AUTORÍA DE ERIC JOSE MARTINEZ MUENTES PAGINAS OFFICIALES FB 
                facebook.com/ejmm19
                mobiliariosfamarsa.com*/
     
session_start();
include('functions.php');
require('../fpdf/fpdf.php');
$reg=UltimoRegVenta()+1;

//var_dump(ses());

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo

    $this->Image('../img/ministerio-de-agricultura-ecuador-directorio-ambiental-ecuador-ecologico.png',10,15,33);
    // Arial bold 15
    $this->SetFont('Arial','I',12);
    // Movernos a la derecha
    $this->Cell(1);
    // Título
    $this->Cell(190,26,utf8_decode('DIRECCIÓN PROVINCIAL AGROPECUARIA DE ORELLANA'),1,1,'C');

    $this->SetFont('Arial','',12);

    $this->Cell(190,-17,utf8_decode('DESPACHO DE BODEGA'),0,1,'C');

    $this->SetFont('Arial','',6);

    $this->Cell(190,25,utf8_decode('AMAZONAS Y BOLIVAR'),0,1,'C');
    // Salto de línea

    $this->Ln(-5);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
}
}
date_default_timezone_set('America/Bogota');
$dia=date('20y-m-d');



// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(15,10,utf8_decode('Desde:  '));
$pdf->SetFont('Arial','',8);
$pdf->Cell(0,10,utf8_decode('DIRECCIÓN PROVINCIAL AGROPECUARIA DE ORELLANA - MAGAP'));
$pdf->SetFont('Arial','B',8);
$pdf->Cell(-35);
$pdf->Cell(0,10,utf8_decode('N° Registro'));
$pdf->Cell(-15);
$pdf->Cell(0,10,utf8_decode("0000".$reg.""));
$pdf->Ln(5);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(0,10,utf8_decode('Unidad:  '));
$pdf->Cell(-175);
$pdf->SetFont('Arial','',8);
$pdf->Cell(0,10,utf8_decode('ADMINISTRATIVA FINANCIERA'));
$pdf->SetFont('Arial','B',8);
$pdf->Cell(-35);
$pdf->Cell(0,10,utf8_decode('FECHA:  '));
$pdf->Cell(-15);
$pdf->Cell(0,10,utf8_decode($dia));
$pdf->Ln(5);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(0,10,utf8_decode('Unidad Solicitante: '));
$pdf->Cell(-160);
$pdf->SetFont('Arial','',8);
$pdf->Cell(0,10,utf8_decode($_POST['unidadsol']));
$pdf->Ln(5);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(0,10,utf8_decode('Solicitado por:  '));
$pdf->SetFont('Arial','',8);
$pdf->Cell(-168);
$pdf->Cell(0,10,utf8_decode($_POST['sol']));
$pdf->Cell(-100);
$pdf->SetFont('Arial','B',8);

$pdf->Ln(5);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(0,10,utf8_decode('Observaciones:  '));
$pdf->SetFont('Arial','',8);
$pdf->Cell(-168);
$pdf->Cell(0,10,utf8_decode($_POST['obser']));
$pdf->Cell(-100);
$pdf->SetFont('Arial','B',8);


$pdf->Ln(10);
$pdf->Cell(190,5,'',1,1,'');
$pdf->Cell(1);
$pdf->Cell(0,-5,utf8_decode('CODIGO'));
$pdf->Cell(-165);
$pdf->Cell(0,-5,utf8_decode('NOMBRE'));
$pdf->Cell(-105);
$pdf->Cell(0,-5,utf8_decode('UNIDAD'));
$pdf->Cell(-85);
$pdf->Cell(0,-5,utf8_decode('CANTIDAD'));
$pdf->Cell(-65);
$pdf->Cell(0,-5,utf8_decode('PRECIO UNITARIO'));
$pdf->Cell(-25);
$pdf->Cell(0,-5,utf8_decode('TOTAL'));
$pdf->SetFont('Arial','',8);



$sum = 0;
$sm=0;
$cant=0;

foreach ($_SESSION['carritodespacho'] as $key) {
 $subto=$key['precio']*$key['cantidad'];
$sum+=$subto;
$cant+=$key['cantidad'];

$pdf->Ln(6);
$pdf->Cell(1);
$pdf->Cell(0,-5,utf8_decode($key['id']));
$pdf->Cell(-165);
$pdf->Cell(0,-5,utf8_decode($key['nombre']));
$pdf->Cell(-100);
$pdf->Cell(0,-5,utf8_decode($key['unidad']));
$pdf->Cell(-78);
$pdf->Cell(0,-5,utf8_decode($key['cantidad']).",00");
$pdf->Cell(-58);
$pdf->Cell(0,-5,utf8_decode($key['precio']));
$pdf->Cell(-25);
$pdf->Cell(0,-5,utf8_decode($subto.",00"));
}

$pdf->Ln(6);
$pdf->Cell(1);
$pdf->Cell(0,-5,utf8_decode(''));
$pdf->Cell(-165);
$pdf->Cell(0,-5,utf8_decode(''));
$pdf->Cell(-100);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(0,-5,utf8_decode('TOTALES:'));
$pdf->SetFont('Arial','',8);
$pdf->Cell(-78);
$pdf->Cell(0,-5,utf8_decode($cant.",00"));
$pdf->Cell(-25);
$pdf->Cell(0,-5,utf8_decode($sum.",00"));


$pdf->Ln(16);
$pdf->Cell(1);
$pdf->SetFont('Arial','',8);
$pdf->Cell(50,26,utf8_decode('Recibí Conforme'),0,0,'C');
$pdf->Cell(70,26,utf8_decode('Visto Bueno'),0,0,'C');
$pdf->Cell(70,26,utf8_decode('Entregué Conforme'),0,0,'C');
$pdf->Cell(150,26,utf8_decode(''),0,0,'C');
$pdf->Ln(7);
$pdf->Cell(1);
$pdf->Cell(50,26,utf8_decode('______________________________'),0,0,'C');
$pdf->Cell(70,26,utf8_decode('______________________________'),0,0,'C');
$pdf->Cell(70,26,utf8_decode('______________________________'),0,0,'C');
$pdf->Ln(5);
$pdf->SetFont('Arial','',8);
$pdf->Cell(50,26,utf8_decode($_POST['sol']),0,0,'C');
$pdf->Cell(70,26,utf8_decode('Ing. Liber Macias Pin'),0,0,'C');
$pdf->Cell(70,26,utf8_decode('Edgar Tobon Títe'),0,0,'C');
$pdf->Ln(5);
$pdf->SetFont('Arial','',8);
$pdf->Cell(50,26,utf8_decode('Solicitante'),0,0,'C');
$pdf->Cell(70,26,utf8_decode('Director'),0,0,'C');
$pdf->Cell(70,26,utf8_decode('Responsable de Movilización'),0,0,'C');





/*
var_dump($arr);*/
//$dir = "C:\Users\Eric Js Martínez\Documents"; // full path like C:/xampp/htdocs/file/file/
$pdf->Output();
$neimarchivo="0000".$reg."_".$dia;
$pdf->Output("../registros/".$neimarchivo.".pdf","F");  



Agregarventa($dia,$sum,'Despacho','glyphicon glyphicon-share-alt',$cant,$_SESSION['username'],$neimarchivo);
//Agregararticulos();
?>
