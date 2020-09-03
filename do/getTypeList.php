<?php

$inc_path = "../inc/";
include_once($inc_path . "_config.php");
$db = Database::DB();
// if (get('lang', 1) != '') {
//   coderLang::set(get('lang', 1));
// }
// 當前語系
$language = coderLang::get();
// $lpath = "../template/$language/";
// var_dump($language);exit;
$language = $language == 'zh-cht' ? 'tw' : $language;
$footer = '../footer_' . $language . '.html';
$header = '../header_' . $language . '.html';
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
  $subtypeData = $db->fetch_all_array($sql, [':id' => $row[$colname['id']]]);
  if (empty($subtypeData)) {
    continue;
  }
  // foreach ($subtypeData as $subtypeKey => $value) {
  //   if (mb_strlen($value['subtypeName'], "utf-8") > 11) {
  //     $subtypeData[$subtypeKey]['subtypeName'] = mb_substr($value['subtypeName'], 0, 11, 'utf-8') . '...';
  //   }
  // }
  // if (mb_strlen($row['pt_name_' . $language], "utf-8") > 11) {
  //   $row['pt_name_' . $language] = mb_substr($row['pt_name_' . $language], 0, 11, 'utf-8') . '...';
  // }
  // var_dump(mb_strlen( $row['pt_name_'.$language], "utf-8"));exit;
  $result[$key] = [
    'id' => $row[$colname['id']],
    'name' => $row['pt_name_' . $language],
    'pic' => empty($row[$colname['pic']]) ? '' : $weburl . $FRONT_PATH_PRODUCT_TYPE . 'b' . $row[$colname['pic']],
    'subtype' => $subtypeData
  ];
}

// var_dump($result[0]['subtype']);exit;
