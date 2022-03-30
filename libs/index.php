<?php

header("Content-type:application/pdf");
header("Content-Disposition:attachment;filename=Schedule Florida Wound Care");
$pdfdate = $_SESSION['pdfdate'];
require "connection.php";//connection to database
session_start();
$where = $_SESSION['where'];
$namesoffac = $_SESSION['facility'];
$facc = $_SESSION['facc'];
$prac = _SESSION['prac'];

//SQL to get 10 records
$count="SELECT * FROM patient $where ORDER BY facility ASC";
require('fpdf.php');
$pdf = new FPDF(); 
$pdf->AddPage("L");


$pdf->SetFont('Arial','',14);
$pdf->Image('https://floridawoundcare.com/wp-content/uploads/2019/10/Picture1.png',10,16,100,16,'PNG');
$pdf->Cell(275,30,$_SESSION['pdfdate'],0,0,R);

$width_cell=array(40,40,100,40,40,15);
$pdf->SetTextColor(255,255,255);
$pdf->SetFont('Arial','B',13);
$pdf->Ln();
//Background color of header//
$pdf->SetFillColor(31, 71, 136);
// Header starts /// 
//First header column //
$pdf->Cell($width_cell[0],15,'First',0,0,C,true);
//Second header column//
$pdf->Cell($width_cell[1],15,'Last',0,0,C,true);
//Third header column//
$pdf->Cell($width_cell[2],15,'Facility',0,0,C,true); 
//Fourth header column//
$pdf->Cell($width_cell[5],15,'#',0,0,C,true); 
$pdf->Cell($width_cell[3],15,'Provider',0,0,C,true);
//Third header column//
$pdf->Cell($width_cell[4],15,'Date',0,1,C,true); 
//// header ends ///////
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','',12);
//Background color of header//
$pdf->SetFillColor(223, 230, 233); 
//to give alternate background fill color to rows// 
$fill=false;

/// each record is one row  ///
foreach ($dbo->query($count) as $row) {
$pdf->Cell($width_cell[0],10,$row['firstname'],0,0,C,$fill);
$pdf->Cell($width_cell[1],10,$row['lastname'],0,0,C,$fill);
$pdf->Cell($width_cell[2],10,$row['facility'],0,0,L,$fill);
$pdf->Cell($width_cell[5],10,$row['rmnum'],0,0,C,$fill);
$pdf->Cell($width_cell[3],10,$row['prac'],0,0,C,$fill);
$pdf->Cell($width_cell[4],10,$row['data'],0,1,C,$fill);
//to give alternate background fill  color to rows//
$fill = !$fill;
}
/// end of records /// 

$pdf->Ln();
//Background color of header//
$pdf->SetFillColor(31, 71, 136);
// Header starts /// 
//First header column //
$pdf->SetFont('Arial','B',12);
$pdf->SetTextColor(255,255,255);
$pdf->Cell(210,15,'Address Book',0,1,C,true);
$pdf->SetTextColor(0,0,0);
$facc = str_replace ("'","\'",$namesoffac);
$userStr = implode("', '", $facc);
$addys="SELECT * FROM facility WHERE name IN ('$userStr') ORDER BY name ASC";

$pdf->SetFont('Times','',12);
//Background color of header//
$pdf->SetFillColor(223, 230, 233); 
//to give alternate background fill color to rows// 
$fill=false;
foreach ($dbo->query($addys) as $row) {
$pdf->SetFont('Arial','',13);

$pdf->Cell(160,10,$row['name'],0,0,L,$fill);
$phone = $row['phone'];
$number = preg_replace('/^(\d{3})(\d{3})(\d{4})$/i', '($1) $2-$3', $phone);
$pdf->Cell(50,10,$number,0,1,R,$fill);
$pdf->SetFont('Arial','',12);
$pdf->Cell(105,10,$row['add1'].', ',0,0,L,$fill);
$pdf->Cell(105,10,$row['add2'],0,1,L,$fill);
$pdf->Cell(210,10,$row['city'].', '.$row['state'].', '.$row['zip'],0,1,L,$fill);
//to give alternate background fill  color to rows//
$fill = !$fill;
}

$fileName = $_SESSION['pdfdate']  . ' ' . $_SESSION['prac'] .' '. $_SESSION['facc']  . '.pdf';
$pdf->Output($fileName, 'I');
?>

