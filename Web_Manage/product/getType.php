<?php
include("_config.php");

$db = Database::DB();
$language = coderLang::getAbbreviation();
$name = $colType['name' . coderLang::getAbbreviation()];
$sql = "select {$name} as name,{$colType['id']} as value 
                from $type ORDER BY `{$colType['ind']}` DESC";

$data =  $db->fetch_all_array($sql);
$html = "<option value='0'>請選擇</option>";
foreach ($data as $row) {
  $html .= "<option value='{$row['value']}'>" . $row['name'] . '</option>';
}

$result = [
  'data' => $html,
  'result' => true
];
echo json_encode($result);
