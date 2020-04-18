<?php
if (PHP_SAPI=='cli') die ();
if (empty ($_SESSION ['SES_LOGIN'])) die ();
require_once 'library/Classes/PHPExcel.php';

$title = "officer";

//creat new php excel
$objPHPExcel = new PHPExcel();

//set document properties
$objPHPExcel->getProperties()->setCreator("Inventory")
							 ->setLastModifiedBy("Inventory")
							 ->setTitle("$title")
							 ->setSubject("$title")
							 ->setDescription("$title")
							 ->setKeywords("$title")
							 ->setCategory("$title");

//add some data
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue('A1','No')
			->setCellValue('B1','Kode')
			->setCellValue('C1','Nama Barang')
			->setCellValue('D1','Merek')
			->setCellValue('E1','Jumlah');

$mySql = "SELECT * FROM barang ORDER BY kd_barang";
$myQry = mysqli_query($koneksidb, $mySql);
$nomor = 0;
$row   = 1;
while ($myData = mysqli_fetch_array($myQry)){
	$nomor++;
	$objPHPExcel->setActiveSheetIndex(0)
				->setCellValue('A'.$row, $nomor)
				->setCellValue('B'.$row, $myData['kd_barang'])
				->setCellValue('C'.$row, $myData['nm_barang'])
				->setCellValue('D'.$row, $myData['merek'])
				->setCellValue('E'.$row, $myData['jumlah']);
}
//style formating excel
$objPHPExcel->getActiveSheet()->getStyle("A1:E1")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getColumnDimension("A")->getAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension("B")->getAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension("C")->getAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension("D")->getAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension("E")->getAutoSize(true);

// RENAME WORKSHEET
$objPHPExcel->getActiveSheet()->setTitle($title);

//set active sheet index to the first sheet, so excel open this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);

//redirect output to a client web browser (excel 5)
header('Content-Type: application/vdn.ms-excel');
header ('Content-Disposition: attachement; filename="'.$title.'.xls"');
header('Cache-Control: max-age=0');
//if youre serving to 1E 9 then following may be needed
header('Cache-Control : max-age1');
//if youre serving to 1e over ssl, than the following may be needed
header('Experies : Mon, 1 Jan 1999 00:00 GMT');//DATE IN THE
header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');//always modified
header('Cache-Control : cache, must-revalidate');//HTTP1.1
header('Pragma : public'); //HTTP 1.0

$objWriter = PHPExcel_IOFactory ::creatWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;

