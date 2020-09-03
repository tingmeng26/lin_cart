<?php
include("_config.php");

$value = post('value', 1);
$condition = '';
$array = [];
if(!empty($value)){
  $condition = " and pt_id = :id";
  $array[':id'] = $value;
}
$db = Database::DB();
$table = coderDBConf::$productSubtype;
$colname = coderDBConf::$colProductSubtype;
$language = coderLang::getAbbreviation();
$name = $colname['name' . coderLang::getAbbreviation()];
$sql = "select {$name} as name,{$colname['id']} as value 
                from $table where 1 {$condition}
                ORDER BY `{$colname['ind']}` DESC";

$data =  $db->fetch_all_array($sql, $array);
$html = "<option value='0'>請選擇</option>";
foreach ($data as $row) {
  $html .= "<option value='{$row['value']}'>" . $row['name'] . '</option>';
}

$result = [
  'data' => $html,
  'result' => true
];
echo json_encode($result);
