<?php
include("_config.php");

$value = post('value', 1);
$db = Database::DB();
$table = coderDBConf::$productSubtype;
$colname = coderDBConf::$colProductSubtype;
$language = coderLang::getAbbreviation();
$name = $colname['name' . coderLang::getAbbreviation()];
$sql = "select {$name} as name,{$colname['id']} as value 
                from $table where {$colname['tid']} = :value 
                 ORDER BY `{$colname['ind']}` DESC";

$data =  $db->fetch_all_array($sql, [':value' => $value]);
$html ="";
foreach($data as $row){
  $html.="<option value='{$row['value']}'>".$row['name'].'</option>';
}
$html = empty($html)?'<option value="0">目前尚無產品分類細項></option>':$html;

$result = [
  'data'=>$html,
  'result'=>true
];
echo json_encode($result);
