<?require_once 'excel_php/Classes/PHPExcel.php';?>
<?require_once 'excel_php/Classes/PHPExcel/Writer/Excel5.php';?>
<?require_once 'excel_php/Classes/PHPExcel/IOFactory.php';?>
<?
ob_end_clean();
$title = 'Таблица';

$xls = new PHPExcel();
$xls->getProperties()->setTitle("debtor");
$xls->getProperties()->setSubject("binenda");
$xls->getProperties()->setCreator("Binenda");
$xls->getProperties()->setCompany("USATU");
$xls->getProperties()->setCategory("ПИ-320");
$xls->getProperties()->setKeywords("debtor");
$xls->getProperties()->setCreated("25.11.2020");

$xls->setActiveSheetIndex(0);
$sheet = $xls->getActiveSheet();
$sheet->setTitle('Недвижимость');
$sheet->getPageSetup()->SetPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
$sheet->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);
$sheet->getPageMargins()->setTop(1);
$sheet->getPageMargins()->setRight(0.75);
$sheet->getPageMargins()->setLeft(0.75);
$sheet->getPageMargins()->setBottom(1);

$sheet->getDefaultStyle()->getFont()->setName('Arial');
$sheet->getDefaultStyle()->getFont()->setSize(14);

$sheet->getColumnDimension("A")->setWidth(8);
$sheet->getColumnDimension("B")->setWidth(33);
$sheet->getColumnDimension("C")->setWidth(11);
$sheet->getColumnDimension("D")->setWidth(33);
$sheet->getColumnDimension("E")->setWidth(16);
$sheet->getRowDimension("1")->setRowHeight(40);
$sheet->getRowDimension("2")->setRowHeight(30);
$sheet->getStyle("2")->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$sheet->getStyle("2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$sheet->getStyle("1")->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$sheet->getStyle("1")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$border = array(
	'borders'=>array(
		'allborders' => array(
			'style' => PHPExcel_Style_Border::BORDER_THIN,
			'color' => array('rgb' => '570451')
		)
	)
);


$sheet->setCellValueExplicit('A1', 'Должники', PHPExcel_Cell_DataType::TYPE_STRING);
$sheet->getStyle('A1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$sheet->getStyle('A1')->getFill()->getStartColor()->setRGB('e3c5e1');
$sheet->mergeCells('A1:E1');
$sheet->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$sheet->getStyle('A2')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$sheet->setCellValueExplicit('A2', 'Номер', PHPExcel_Cell_DataType::TYPE_STRING);
$sheet->getStyle('A2')->getFill()->getStartColor()->setRGB('bf7aba');
$sheet->getStyle("A2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$sheet->getStyle('B2')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$sheet->setCellValueExplicit('B2', 'ФИО', PHPExcel_Cell_DataType::TYPE_STRING);
$sheet->getStyle('B2')->getFill()->getStartColor()->setRGB('bf7aba');
$sheet->getStyle("B2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$sheet->getStyle('C2')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$sheet->setCellValueExplicit('C2', 'Сумма', PHPExcel_Cell_DataType::TYPE_STRING);
$sheet->getStyle('C2')->getFill()->getStartColor()->setRGB('bf7aba');
$sheet->getStyle("C2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$sheet->getStyle('D2')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$sheet->setCellValueExplicit('D2', 'Адрес', PHPExcel_Cell_DataType::TYPE_STRING);
$sheet->getStyle('D2')->getFill()->getStartColor()->setRGB('bf7aba');
$sheet->getStyle("D2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$sheet->getStyle('E2')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$sheet->setCellValueExplicit('E2', 'Доля от цены, %', PHPExcel_Cell_DataType::TYPE_STRING);
$sheet->getStyle('E2')->getFill()->getStartColor()->setRGB('bf7aba');
$sheet->getStyle("E2")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$connect = mysqli_connect("localhost", "root", "root", "property")or die("Невозможно подключиться к серверу");
  mysqli_query($connect, "SET NAMES utf8");

$result = mysqli_query($connect, "SELECT d.fio_man, d.id_man, d.debt, r.id_house, r.adress_t, h.cost FROM debtor d INNER JOIN  tenants r ON d.id_man = r.id JOIN tproperty h ON r.id_house=h.id");

$i = 0;
while ($row = mysqli_fetch_array($result)){
    $number[$i] = $i+1;
    $FIO[$i] = $row['fio_man'];
    $sum[$i] = $row['debt'] . "р.";
    $adress[$i] = $row['adress_t'];
    $part[$i] = round(($row['debt']/$row['cost'])*100, 2);
    $i++;
}

$c = 3;
$check = true;

foreach($number as $i)
  {

if ($check) {
	$color = 'b4bfe7';
}else {
	$color = 'b4bfe7';
}

$sheet->getStyle('A'.$c)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$sheet->setCellValue("A".$c, $number[$i-1]);
$sheet->getStyle('A'.$c)->getFill()->getStartColor()->setRGB($color);
$sheet->getStyle("A".$c)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


$sheet->getStyle('B'.$c)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$sheet->setCellValueExplicit('B'.$c, $FIO[$i-1], PHPExcel_Cell_DataType::TYPE_STRING);
$sheet->getStyle('B'.$c)->getFill()->getStartColor()->setRGB($color);
$sheet->getStyle("B".$c)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);


$sheet->getStyle('C'.$c)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$sheet->setCellValueExplicit('C'.$c, $sum[$i-1], PHPExcel_Cell_DataType::TYPE_STRING);
$sheet->getStyle('C'.$c)->getFill()->getStartColor()->setRGB($color);
$sheet->getStyle("C".$c)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


$sheet->getStyle('D'.$c)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$sheet->setCellValueExplicit('D'.$c, $adress[$i-1], PHPExcel_Cell_DataType::TYPE_STRING);
$sheet->getStyle('D'.$c)->getFill()->getStartColor()->setRGB($color);
$sheet->getStyle("D".$c)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


$sheet->getStyle('E'.$c)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$sheet->setCellValueExplicit('E'.$c, $part[$i-1], PHPExcel_Cell_DataType::TYPE_STRING);
$sheet->getStyle('E'.$c)->getFill()->getStartColor()->setRGB($color);
$sheet->getStyle("E".$c)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

	$check =! $check;
	$c++;
}


$sheet->getStyle("A1:E".($c-1))->applyFromArray($border);


ob_end_clean();
header("Expires: Mon, 1 Apr 1974 05:00:00 GMT");
header("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
ob_end_clean();
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=debtors.xls");

$objWriter = PHPExcel_IOFactory::createWriter($xls, 'Excel2007');

$objWriter->save('php://output');
ob_end_clean();
?>