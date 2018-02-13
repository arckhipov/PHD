<?php
require_once 'functions.php';
require "db.php";
require_once 'Classes/PHPExcel.php';
$month = array(
	1 => 'D',
	2 => 'E',
	3 => 'F',
	4 => 'G',
	5 => 'H',
	6 => 'I',
	7 => 'J',
	8 => 'K',
	9 => 'L',
	10 => 'M',
	11 => 'N',
	12 => 'O',
	13 => 'P',
	14 => 'Q',
	15 => 'R',
	16 => 'S',
	17 => 'T',
	18 => 'U',
	19 => 'V',
	20 => 'W',
	21 => 'X',
	22 => 'Y',
	23 => 'Z',
	24 => 'AA',
	25 => 'AB',
	26 => 'AC',
	27 => 'AD',
	28 => 'AE',
	29 => 'AF',
	30 => 'AG',
	31 => 'AH'
);


//$price_list = get_price();
$dat = get_data();

$objPHPExcel = new PHPEXcel();
// указываем активный лист exel по индексу (в данном случае 0)
$objPHPExcel->setActiveSheetIndex(0);

//$objPHPExcel->createSheet();

// получаем доступ к этому активному листу с помощью метода
$active_sheet = $objPHPExcel->getActiveSheet();

$active_sheet = $objPHPExcel->getActiveSheet();

$active_sheet->getPageSetup()
			->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
			
$active_sheet->getPageSetup()
			->SetPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
			
$active_sheet->getPageMargins()->setTop(1);
$active_sheet->getPageMargins()->setRight(0.75);
$active_sheet->getPageMargins()->setLeft(0.75);
$active_sheet->getPageMargins()->setBottom(1);

$active_sheet->setTitle("Лист нарядов");

$active_sheet->getHeaderFooter()->setOddHeader("&CШапка нашего прайс листа");	
// делаем нумерацию страниц
$active_sheet->getHeaderFooter()->setOddFooter('&L&B'.$active_sheet->getTitle().'&RСтраница &P из &N');

$objPHPExcel->getDefaultStyle()->getFont()->setName('Times New Roman');
$objPHPExcel->getDefaultStyle()->getFont()->setSize(12);

// задаем ширину столбцов
$active_sheet->getColumnDimension('A')->setWidth(7);
$active_sheet->getColumnDimension('B')->setWidth(10);
$active_sheet->getColumnDimension('C')->setWidth(30);
$active_sheet->getColumnDimension('D')->setWidth(3);

$active_sheet->getColumnDimension('E')->setWidth(3);
$active_sheet->getColumnDimension('F')->setWidth(3);
$active_sheet->getColumnDimension('G')->setWidth(3);
$active_sheet->getColumnDimension('H')->setWidth(3);
$active_sheet->getColumnDimension('I')->setWidth(3);
$active_sheet->getColumnDimension('J')->setWidth(3);
$active_sheet->getColumnDimension('K')->setWidth(3);
$active_sheet->getColumnDimension('L')->setWidth(3);
$active_sheet->getColumnDimension('M')->setWidth(3);
$active_sheet->getColumnDimension('N')->setWidth(3);
$active_sheet->getColumnDimension('O')->setWidth(3);
$active_sheet->getColumnDimension('P')->setWidth(3);
$active_sheet->getColumnDimension('Q')->setWidth(3);
$active_sheet->getColumnDimension('R')->setWidth(3);
$active_sheet->getColumnDimension('S')->setWidth(3);
$active_sheet->getColumnDimension('T')->setWidth(3);
$active_sheet->getColumnDimension('U')->setWidth(3);
$active_sheet->getColumnDimension('V')->setWidth(3);
$active_sheet->getColumnDimension('W')->setWidth(3);
$active_sheet->getColumnDimension('X')->setWidth(3);
$active_sheet->getColumnDimension('Y')->setWidth(3);
$active_sheet->getColumnDimension('Z')->setWidth(3);
$active_sheet->getColumnDimension('AA')->setWidth(3);
$active_sheet->getColumnDimension('AB')->setWidth(3);
$active_sheet->getColumnDimension('AC')->setWidth(3);
$active_sheet->getColumnDimension('AD')->setWidth(3);
$active_sheet->getColumnDimension('AE')->setWidth(3);
$active_sheet->getColumnDimension('AF')->setWidth(3);
$active_sheet->getColumnDimension('AG')->setWidth(3);
$active_sheet->getColumnDimension('AH')->setWidth(3);

// объединяем ячейки
/* $active_sheet->mergeCells('A1:D1');
$active_sheet->getRowDimension('1')->setRowHeight(40);
//пишем в ячейки
$active_sheet->setCellValue('A1','График нарядов');

$active_sheet->mergeCells('A2:D2');
$active_sheet->setCellValue('A2','Программа для справедливого распределения нарядов');

$active_sheet->mergeCells('A4:C4');
$active_sheet->setCellValue('A4','Дата создания графика нарядов');

$date = date('d-m-Y');
$active_sheet->setCellValue('D4',$date);
$active_sheet->getStyle('D4')
			->getNumberFormat()->
			setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_XLSX14); */

$active_sheet->setCellValue('A6','№ п.п');
	$active_sheet->setCellValue('A7','1');
	$active_sheet->setCellValue('A8','2');
	$active_sheet->setCellValue('A9','3');
	$active_sheet->setCellValue('A10','4');
	$active_sheet->setCellValue('A11','5');
	$active_sheet->setCellValue('A12','6');
	$active_sheet->setCellValue('A13','7');
	$active_sheet->setCellValue('A14','8');
	$active_sheet->setCellValue('A15','9');
	$active_sheet->setCellValue('A16','10');

$active_sheet->setCellValue('B6','в/звание');
	$active_sheet->setCellValue('B7','ст. пр-к');
	$active_sheet->setCellValue('B8','ст. с-т');
	$active_sheet->setCellValue('B9','с-т');
	$active_sheet->setCellValue('B10','с-т');
	$active_sheet->setCellValue('B11','с-т');
	$active_sheet->setCellValue('B12','с-т');
	$active_sheet->setCellValue('B13','с-т');
	$active_sheet->setCellValue('B14','с-т');
	$active_sheet->setCellValue('B15','мл. с-т');
	$active_sheet->setCellValue('B16','ст. 2ст');


$active_sheet->setCellValue('C6','ФИО');
	$active_sheet->setCellValue('C7','Шишкин Алексей Викторович');
	$active_sheet->setCellValue('C8','Козлов Николай Николаевич');
	$active_sheet->setCellValue('C9','Аникин Михаил Михайлович');
	$active_sheet->setCellValue('C10','Гладышев Руслан Анатольевич');
	$active_sheet->setCellValue('C11','Золотов Денис Юрьевич');
	$active_sheet->setCellValue('C12','Исенко Игорь Владимирович');
//	$active_sheet->setCellValue('C13','Чехова Оксана Владимировна');
	$active_sheet->setCellValue('C13','Шамаков Андрей Леонидович');
	$active_sheet->setCellValue('C14','Архипов Виталий Викторович');
	$active_sheet->setCellValue('C15','Щеголихин Валерий Олегович');

// формируем колличество дней в месяце
$cnt = 1;
$cntDate = 6;
$a = 7;
$b = 8;
$c = 9;
$d = 10;
$e = 11;
$f = 12;
$g = 13;
$h = 14;
$i = 15;
//$j = 16;
/* foreach($month as $item) {
	foreach()
	$active_sheet->setCellValue($item.$w, $b);
	$b++;
} */


$arrayObject1 = new ArrayObject($month);
$arrayObject2 = new ArrayObject($dat);
$iterator1 = $arrayObject1->getIterator();
$iterator2 = $arrayObject2->getIterator();
for ($iterator1->rewind(), $iterator2->rewind();
     $item = $iterator1->current(), $value2=$iterator2->current();
     $iterator1->next(), $iterator2->next())
{
	if( $value2['fio'] == 'Шишкин Алексей Викторович' ){
		$active_sheet->setCellValue($item.$cntDate, $cnt);
		$active_sheet->setCellValue($item.$a, 'Д');
	}elseif( $value2['fio'] == 'Козлов Николай Николаевич' ){
		$active_sheet->setCellValue($item.$cntDate, $cnt);
		$active_sheet->setCellValue($item.$b, 'Д');
	}elseif( $value2['fio'] == 'Аникин Михаил Михайлович' ){
		$active_sheet->setCellValue($item.$cntDate, $cnt);
		$active_sheet->setCellValue($item.$c, 'Д');
	}elseif( $value2['fio'] == 'Гладышев Руслан Анатольевич' ){
		$active_sheet->setCellValue($item.$cntDate, $cnt);
		$active_sheet->setCellValue($item.$d, 'Д');
	}elseif( $value2['fio'] == 'Золотов Денис Юрьевич' ){
		$active_sheet->setCellValue($item.$cntDate, $cnt);
		$active_sheet->setCellValue($item.$e, 'Д');
	}elseif( $value2['fio'] == 'Исенко Игорь Владимирович' ){
		$active_sheet->setCellValue($item.$cntDate, $cnt);
		$active_sheet->setCellValue($item.$f, 'Д');
	}
//	elseif( $value2['fio'] == 'Чехова Оксана Владимировна' ){
//		$active_sheet->setCellValue($item.$cntDate, $cnt);
//		$active_sheet->setCellValue($item.$g, 'Д');
//	}
	elseif( $value2['fio'] == 'Шамаков Андрей Леонидович' ){
		$active_sheet->setCellValue($item.$cntDate, $cnt);
		$active_sheet->setCellValue($item.$g, 'Д');
	}elseif( $value2['fio'] == 'Архипов Виталий Викторович' ){
		$active_sheet->setCellValue($item.$cntDate, $cnt);
		$active_sheet->setCellValue($item.$h, 'Д');
	}elseif( $value2['fio'] == 'Щеголихин Валерий Олегович' ){
		$active_sheet->setCellValue($item.$cntDate, $cnt);
		$active_sheet->setCellValue($item.$i, 'Д');
	}else{
		exit("fgfgfg");
	}
	$cnt++;
}


header("Content-Type:application/vnd.ms-excel");
// здесь пишим что нужно файл отдать на скачивание
header("Content-Disposition:attachment;filename='Grafik_naradov.xls'");

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');

exit();
?>