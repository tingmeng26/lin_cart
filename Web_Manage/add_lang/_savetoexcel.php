<?php
include("_config.php");
//include_once('filterconfig.php');

$db = Database::DB();
$sHelp=new coderSelectHelp($db);
$sHelp->select="*";
$sHelp->table = $table;
$sHelp->page_size=-1;
$sHelp->page=get("page");
$sHelp->orderby=$orderColumn;
$sHelp->orderdesc=$orderDesc;

/*$sqlstr=$filterhelp->getSQLStr();
$wheresql = $sqlstr->SQL;*/



$wheresql = "";
$sHelp->where=$wheresql;

$rows=$sHelp->getList();

for($i=0;$i<count($rows);$i++){

}

if (PHP_SAPI == 'cli')
	die('Web瀏覽器上運行');

/** Include PHPExcel */
require_once '../../Classes/PHPExcel.php';


// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
							 ->setLastModifiedBy("Maarten Balliauw")
							 ->setTitle("Office 2007 XLSX Test Document")
							 ->setSubject("Office 2007 XLSX Test Document")
							 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("Test result file");
							 
// 新增 data

$i = 1;
foreach ($rows as $key => $row) {

	$objPHPExcel->setActiveSheetIndex(0)
				->setCellValue('A'.$i, $row[$colname["lang"]])
				->setCellValue('B'.$i, $row[$colname["name"]])
				->setCellValue('C'.$i, $row[$colname["remark"]])
				->setCellValue('D'.$i, $row[$colname["ispublic"]]);



	$i++;
}


						 
$db->close();					 
							 

// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('event');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);

ob_end_clean();

// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="vicinity_addr_'.date("Ymdhis").'.xlsx"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
?>
