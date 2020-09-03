<?php

$inc_path = "../inc/";
include_once($inc_path . "_config.php");
$db = Database::DB();
if (get('lang', 1) != '') {
  coderLang::set(get('lang', 1));
}
// 當前語系
$language = coderLang::get();
// $lpath = "../template/$language/";
$language = $language == 'zh-cht' ? 'tw' : $language;
$footer = '../footer_'.$language.'.html';
$header = '../header_'.$language.'.html';
$table = coderDBConf::$productType;
$subtype = coderDBConf::$productSubtype;

$colSubtype = coderDBConf::$colProductSubtype;
$colname = coderDBConf::$colProductType;
$sql = "select * from $table where {$colname['ispublic']} = 1 order by {$colname['ind']} desc";
$data = $db->fetch_all_array($sql);
$result = [];
foreach ($data as $key => $row) {
  $sql = "SELECT $subtype.ps_id as subtypeId, $subtype.ps_name_{$language} as subtypeName,$subtype.ps_link as link  from $subtype 
  where $subtype.{$colSubtype['ispublic']} =1 and $subtype.{$colname['id']} = :id
  order by  $subtype.{$colSubtype['ind']} desc";
  $subtypeData = $db->fetch_all_array($sql,[':id'=>$row[$colname['id']]]);

  $result[$key] = [
    'id'=>$row[$colname['id']],
    'name'=>$row['pt_name_'.$language],
    'pic'=>empty($row[$colname['pic']]) ? '' : $weburl . $FRONT_PATH_PRODUCT_TYPE . 'b' . $row[$colname['pic']],
    'subtype'=>$subtypeData
  ];
}

// var_dump($result[0]['subtype']);exit;



