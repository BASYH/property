<?php

require('pdf/tfpdf.php');

  $connect = mysqli_connect("localhost", "root", "root", "property")or die("Невозможно подключиться к серверу");
  mysqli_query($connect, "SET NAMES utf8");

$result = mysqli_query($connect, "SELECT d.fio_man, d.id_man, d.debt, r.id_house, r.adress_t, h.cost FROM debtor d INNER JOIN  tenants r ON d.id_man = r.id JOIN tproperty h ON r.id_house=h.id");
//"SELECT d.FIO_debtor, d.id_resident, d.sum, r.id_home, r.adress_resident, h.home_cost 
//FROM debtors d INNER JOIN residents r ON d.id_resident = r.id_resident JOIN home h ON r.id_home=h.id_home"
  $i = 0;
  while ($row = mysqli_fetch_array($result)){

    $number[$i] = $i+1;
    $FIO[$i] = $row['fio_man'];
    $sum[$i] = $row['debt'] . "р.";
    $adress[$i] = $row['adress_t'];
    $part[$i] = round(($row['debt']/$row['cost'])*100, 2);
    $i++;
  }

$pdf = new tFPDF();
$pdf->AddPage();

// Add a Unicode font (uses UTF-8)
$pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
$pdf->SetFont('DejaVu','',14);


$txt = "Должники";

$pdf->SetFont('DejaVu','','28');
$pdf->Cell(199, 10, $txt, 15,0,'C');
$pdf->Ln();
$pdf->Ln();
 
 $pdf->SetFont('DejaVu','','12');
 $pdf->SetFillColor(174,129,232);
 $pdf->SetTextColor(0);
 $pdf->SetDrawColor(80,8,116);
 $pdf->SetLineWidth(.1);
 
 $pdf->Cell(10,12,"№",1,0,'C',true);
 $pdf->Cell(60,12,"ФИО",1,0,'C',true);
 $pdf->Cell(30,12,"Долг",1,0,'C',true);
 $pdf->Cell(55,12,"Адрес",1,0,'C',true);
 $pdf->Cell(30,12,"Доля от цены",1,0,'C',true);
 $pdf->Ln();
 
$pdf->SetFillColor(188,192,227,1);
$pdf->SetTextColor(0);
$pdf->SetFont('');
 
$fill = true;
 
foreach($number as $i)
  {
    $pdf->SetFont('DejaVu','','10');
        $pdf->Cell(10,6, $i, 1, 0,'C',$fill);
        $pdf->Cell(60,6, $FIO[$i-1], 1, 0,'L',$fill);
        $pdf->Cell(30,6, $sum[$i-1], 1, 0,'C',$fill);
        $pdf->Cell(55,6, $adress[$i-1], 1, 0,'L',$fill);
        $pdf->Cell(30,6, $part[$i-1], 1, 0,'R',$fill);
        $pdf->Ln();
        $fill =! $fill;
    }
    $pdf->Cell(180,0,'','T');

$pdf->Output();
?>