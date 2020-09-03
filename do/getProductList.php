<?php
$inc_path = "../inc/";
include_once($inc_path . "_config.php");
$db = Database::DB();
$subtypeId = post('subtypeId', 1);
$language = post('language', 1);
$result = [];
$return = [
  'result' => false,
  'data' => $result
];

if (!empty($subtypeId) && $language) {
  $table = coderDBConf::$product;
  $colname = coderDBConf::$colPorduct;
  $sql = "select * from $table where {$colname['ispublic']} = 1 and {$colname['sid']}=:subtypeId";
  $data = $db->fetch_all_array($sql, [':subtypeId' => $subtypeId]);
  foreach ($data as $row) {
    $result[]  = [
      'id' => $row['product_id'],
      'name' => $row['product_name_' . $language]
    ];
  }
  $return['result'] = true;
  $return['data'] = array_values($result);
}

echo json_encode($return);
