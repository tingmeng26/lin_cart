<?php
$inc_path = "../inc/";
include_once($inc_path . "_config.php");
$db = Database::DB();
$typeId = post('typeId', 1);
$language = post('language', 1);
$result = [];
$return = [
  'result' => false,
  'data' => $result
];

if (!empty($typeId) && $language) {
  $table = coderDBConf::$productSubtype;
  $colname = coderDBConf::$colProductSubtype;
  $sql = "select * from $table where {$colname['ispublic']} = 1 and {$colname['tid']}=:typeId";
  $data = $db->fetch_all_array($sql, [':typeId' => $typeId]);
  foreach ($data as $row) {
    $result[]  = [
      'id' => $row['ps_id'],
      'name' => $row['ps_name_' . $language]
    ];
  }
  $return['result'] = true;
  $return['data'] = array_values($result);
}

echo json_encode($return);
