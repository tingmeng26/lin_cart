<?php
include("_config.php");
include('filterconfig.php');
$list_id = (get('list_id')!="")?get('list_id'):0; //[0]匯出 [1]範例
$title = ($list_id==1)?'example':'lang_dictionaryList';

coderAdmin::vaild($auth, 'export');
$sHelp=new coderSelectHelp($db);
$sHelp->select="$table.*,$table_ld.{$colname_ld['lang']},$table_ld.{$colname_ld['name']}";
$sHelp->table = $table."
                LEFT JOIN $table_ld on $table_ld.`{$colname_ld['lang']}`=$table.`{$colname['ld_lang']}`";
//$sHelp->page_size = get("pagenum");
$sHelp->page_size = ($list_id==1)?1:-1;
$sHelp->page = 1;
$sHelp->orderby = get("orderkey", 1);
$sHelp->orderdesc = get("orderdesc", 1);

$sqlstr=$filterhelp->getSQLStr();
$wheresql = $sqlstr->SQL;
$sHelp->where=$wheresql;

$rows=$sHelp->getList();

for($i=0;$i<count($rows);$i++){
    //$rows[$i][$colname['ispublic']]=$incary_yn_layout[$rows[$i][$colname['ispublic']]];


}

if (PHP_SAPI == 'cli') {
    //die('Web瀏覽器上運行');
    die('ERROR');
}

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

//寬度
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(35);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(40);


// 新增 data
$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A1', coderLang::t("langdata1",1)) //語系代碼 [langdata1]
    ->setCellValue('B1', coderLang::t("langdictionary1",1)) //英文描述[langdictionary1]
    ->setCellValue('C1', coderLang::t("langdictionary2",1)) //key [langdictionary2]
    ->setCellValue('D1', coderLang::t("langdictionary3",1)) //翻譯 [langdictionary3]

;

$rows_ld = class_lang_data::getList_ary1(); //語系
$rows_dic = class_lang_dictionary::getList_ary1(); //字典檔 KEY

$i = 2;
foreach ($rows as $key => $row) {
    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A' . $i, $row[$colname['ld_lang']])
        ->setCellValue('B' . $i, $row[$colname['english']])
        ->setCellValue('C' . $i, $row[$colname['key']])
        ->setCellValue('D' . $i, $row[$colname['val']]);

    //語系代碼
    $objValidation = $objPHPExcel->getActiveSheet()->getCell('A' . $i)->getDataValidation();
    $objValidation->setType(PHPExcel_Cell_DataValidation::TYPE_LIST);
    $objValidation->setErrorStyle(PHPExcel_Cell_DataValidation::STYLE_INFORMATION);
    $objValidation->setAllowBlank(false);
    $objValidation->setShowInputMessage(true);
    $objValidation->setShowDropDown(true);
    $objValidation->setFormula1('"' . implode(",", $rows_ld) . '"');

    //字典檔 KEY
    /*$objValidation = $objPHPExcel->getActiveSheet()->getCell('C' . $i)->getDataValidation();
    $objValidation->setType(PHPExcel_Cell_DataValidation::TYPE_LIST);
    $objValidation->setErrorStyle(PHPExcel_Cell_DataValidation::STYLE_INFORMATION);
    $objValidation->setAllowBlank(false);
    $objValidation->setShowInputMessage(true);
    $objValidation->setShowDropDown(true);
    $objValidation->setFormula1('"' . implode(",", $rows_dic) . '"');*/


    $i++;
}
$db->close();

// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle($title);


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="'. $title . ($list_id==1?'':'_' .date("Ymdhis")) . '.xlsx"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
